<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
class ProductController extends Controller
{
public function index(){
$categories= Category::all();
    return view('backend.product.create',compact('categories'));
  }
  public function create(Request $request){
      $request->validate([
          'name'=>'min:3',
      ]);
      $product=new Product;
      $product->name=$request->name;
      $product->category_id=$request->category;
      $product->price=$request->price;
      $product->slug=Str::slug($request->name);
      $product->description=$request->description;
      $product->save();
      if($request->hasFile('image')){
          foreach ($request->file('image') as $imagefile){
              $image=new Image;
              $imageName=Str::slug($request->title).'-'.rand(0,999).'.'.$imagefile->getClientOriginalExtension();
              $imagefile->move(public_path('uploads'),$imageName);
              $image->product_id = $product->id;
              $image->path='/uploads/'.$imageName;
              $image->save();
          }
      }
      return redirect()->route('admin.ürün.liste');

  }
  public function list(){
    $products = Product::all();
    return view('backend.product.list',compact('products'));
  }
    public function switch(Request $request){
        $product=Product::findOrFail($request->id);
        $product->status=$request->statu=="true" ? 1 : 0 ;
        $product->save();
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $image = Image::where('product_id',$id)->get();
        foreach ($image as $item){
            $item->delete();
        }
        $product->delete();
        return redirect()->route('admin.ürün.liste');

    }
    public function update($id){
        $product=Product::findOrFail($id);
        $categories=Category::all();
        return view('backend.product.update',compact('product','categories'));
    }
    public function updatePost(Request $request, $id){

        $request->validate([
            'name'=>'min:3',
        ]);
        $image = Image::where('product_id',$id)->get();

        $product=Product::findOrFail($request->id);
        $product->name=$request->name;
        $product->category_id=$request->category;
        $product->price=$request->price;
        $product->slug=Str::slug($request->name);
        $product->save();
        if($request->hasFile('image')){
            foreach ($image as $item){
                $item->delete();
            }
            foreach ($request->file('image') as $imagefile){
                $image=new Image;
                $imageName=Str::slug($request->title).'-'.rand(0,999).'.'.$imagefile->getClientOriginalExtension();
                $imagefile->move(public_path('uploads'),$imageName);
                $image->product_id = $product->id;
                $image->path='/uploads/'.$imageName;
                $image->save();
            }
        }
        return redirect()->route('admin.ürün.liste');
    }
}
