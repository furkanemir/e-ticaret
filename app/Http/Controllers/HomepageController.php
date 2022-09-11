<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __construct(){
        view()->share('categories',Category::all());
    }
    public function index(){
        $products = Product::where('status',1)->get();
        return view('frontend.homepage',compact('products'));
    }
    public function single($id,$slug){
        $product = Product::where('id',$id)->where('status',1)->first();
        $otherProducts = Product::where('category_id',$product->getCategory->id)->where('status',1)->get();
        return view('frontend.single',compact('product','otherProducts'));
    }
    public function category(){
        $categories=Category::all();
        $categories=Category::orderBy('name','ASC')->get();
        return view('frontend.homepage',compact('categories'));
    }
    public function categorySingle($id,$slug){
        $products = Product::where('category_id',$id)->Where('status',1)->get();
        return view('frontend.singleCategory',compact('products'));
    }
    public function userSetting(){
        return view('frontend.usersetting');
    }
}
