<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(){
        view()->share('categories',Category::all());
    }
    public function cart(){
        return view('frontend.cart');
    }
    public function addToCart(Request $request){
        $product = Product::where('id',$request->id)->where('status',1)->first();
        $cart = session()->get('cart', []);
        if (isset($product)){
            if(isset($cart[$request->id])) {
                $cart[$request->id]['quantity']++;
            } else {
                $image = $product->getImages->first()->path;
                $cart[$request->id] = [
                    "id"=>$product->id,
                    "slug"=>$product->slug,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image"=>$image,
                ];
            }
        }
        session()->put('cart', $cart);
    }

    public function update(Request $request){
        if (session()->get('cart')){
            if($request->id && $request->quantity){
                $cart = session()->get('cart');
                if (isset($request->quantity)){
                    $cart[$request->id]["quantity"] += $request->quantity;
                }else {
                    $cart[$request->id]["quantity"] ++;
                }
                session()->put('cart', $cart);
            }
        }else{
            $product = Product::where('id',$request->id)->where('status',1)->first();

            $cart = session()->get('cart', []);

            if (isset($product)){
                if (isset($request->quantity)){
                    if(isset($cart[$request->id])) {
                        $cart[$request->id]['quantity']++;
                    } else {
                        $image = $product->getImages->first()->path;
                        $cart[$request->id] = [
                            "id"=>$product->id,
                            "slug"=>$product->slug,
                            "name" => $product->name,
                            "quantity" => $request->quantity,
                            "price" => $product->price,
                            "image"=>$image,
                        ];
                    }
                } else {
                    if(isset($cart[$request->id])) {
                        $cart[$request->id]['quantity']++;
                    } else {
                        $image = $product->getImages->first()->path;
                        $cart[$request->id] = [
                            "id"=>$product->id,
                            "slug"=>$product->slug,
                            "name" => $product->name,
                            "quantity" => 1,
                            "price" => $product->price,
                            "image"=>$image,
                        ];
                    }
                }
            }
            session()->put('cart', $cart);
        }
        return ['success','name'=>$cart[$request->id]['name']];
    }

    public function remove(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

}
