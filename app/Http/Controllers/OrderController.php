<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(){
        view()->share('categories',Category::all());
    }
    public function index(){
        return view('frontend.order');
    }
    public function create(Request $request){
        $tempArray = array();
        $array = array();
        $total = 0;
        foreach (session('cart') as $item){
            $tempArray['product_id'] = $item['id'];
            $total += $item['price'] * $item['quantity'];
            array_push($array,$tempArray);
        }
        $tempArray = [];
        $id = json_encode($array);
        $order = new Order();
        $order->name = $request->name;
        $order->total = $total;
        $order->street = $request->street;
        $order->city = $request->city;
        $order->neighbourhood = $request->neighbourhood;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->user_id = Auth::user()->id;
        $order->product_id = $id;
        $order->save();
        return view('frontend.creditCart');
    }

    public function payment(Request $request){
        $cardnumber = str_replace(' ', '', $request->cardnumber);
        $date = explode('/',$request->endofdate);
        $month = $date[0];
        $year = '20'.$date[1];
        $cvc = $request->cvc;
        $name = $request->name;
        $order = Order::where('user_id',Auth::user()->id)->where('status',0)->first();
        $address = $order->street.' '.$order->neighbourhood.'/'.$order->city.' '.$order->country;
        $product_id = json_decode($order->product_id);

        //Option Tanımlama
        $options = new \Iyzipay\Options();
        $options->setApiKey(env("TEST_IYZI_API_KEY"));
        $options->setSecretKey(env("TEST_IYZI_SCRET_KEY"));
        $options->setBaseUrl(env("TEST_IYZI_BASE_URL"));

        //payment Reques Oluşturma
        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($cardnumber);
        $request->setPrice($order->total);
        $request->setPaidPrice($order->total);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId($cardnumber.'-'.$order->id.'-'.$name);
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

        //Card Oluşturma
        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName($name);
        $paymentCard->setCardNumber($cardnumber);
        $paymentCard->setExpireMonth($month);
        $paymentCard->setExpireYear($year);
        $paymentCard->setCvc($cvc);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        //Buyer Oluşturma
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($order->user_id);
        $buyer->setName($order->name);
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber($order->phone);
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress($address);
        $buyer->setIp(\request()->ip());
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($address);
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($order->name);
        $billingAddress->setCity($order->city);
        $billingAddress->setCountry($order->country);
        $billingAddress->setAddress($address);
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);
        $basketItems = array();
        foreach ($product_id as $id=>$item){
            $product = Product::where('id',$item->product_id)->first();
            $firstBasketItem = new \Iyzipay\Model\BasketItem();
            $firstBasketItem->setId($product->id);
            $firstBasketItem->setName($product->name);
            $firstBasketItem->setCategory1($product->getCategory->name);
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $firstBasketItem->setPrice($product->price);
            $basketItems[$id] = $firstBasketItem;
        }
        $request->setBasketItems($basketItems);
        $payment = \Iyzipay\Model\Payment::create($request, $options);
        if ($payment->getStatus() == 'success'){
            session()->forget('cart');
            $order->status = 1;
            $order->save();
            session()->flash('success','Ödeme Başarılı');
            return redirect('cart');
        } else{
            $order->status = 4;
            $order->save();
            session()->flash('success','Ödeme Başarısız');
            return redirect('cart');
        }
    }
}
