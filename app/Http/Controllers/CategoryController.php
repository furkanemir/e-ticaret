<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
   public function create(Request $request){

       $category=new Category;
       $category->name=$request->name;
       $category->slug=Str::slug($request->name);
       $category->save();

       return redirect()->route('admin.kategori.liste');
   }
   public function index(){

       return view('backend.category.create');

   }
   public function list(){
       $categories=Category::all();
       return view('backend.category.list',compact('categories'));
   }
   public function delete($id){
       $category=Category::findOrFail($id);
       $category->delete();

       return redirect()->route('admin.kategori.liste');
   }
   public function update($id){
       $category=Category::findOrFail($id);
       return view('backend.category.update',compact('category'));

   }
    public function updatePost($id,Request $request){
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.kategori.liste');
    }
}
