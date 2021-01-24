<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class FrontProductListController extends Controller
{
    public function index(){
        $products = Product::latest()->limit(6)->get();
        $randomActiveProducts= Product::inRandomOrder()->limit(3)->get();
        
        $randomActiveProductIds=[];
        foreach($randomActiveProducts as $product){
         array_push($randomActiveProductIds,$product->id);
        }
        $randomItemProducts = Product::whereNotIn('id',$randomActiveProductIds)->limit(3)->get();
 
       
        return view('product',compact('products','randomItemProducts','randomActiveProducts'));

    }

    public function show($id){
        $product =Product::find($id);
        $productFromSameCategories= Product::inRandomOrder()
        ->where('category_id',$product->category_id)
        ->where('id','!=',$product->id)
        ->limit(3)
        ->get();
        return view('show',compact('product', 'productFromSameCategories'));
    }

    public function allProduct($name, Request $request){
        $category = Category::where('slug',$name)->first();
        $categoryId = $category->id;
        if($request->subcategory){
             $products = $this->filterProducts($request);
            $firoz = $this->getSubcategoriesId($request);
         
        }
        else{
        $products = Product::where('category_id',$category->id)->get();
        
        }
        $subcategories = Subcategory::where('category_id',$category->id)->get();
        
        $slug = $name;
        return view('category',compact('products','subcategories','slug','firoz','price','categoryId' ));
        
    }

    public function filterProducts( Request $request){
        $subId =[];
        $subcategory = Subcategory::whereIn('id',$request->subcategory)->get();

        foreach($subcategory as $sub){
            array_push($subId,$sub->id);
        }
        $products = Product::whereIn('subcategory_id',$subId)->get();
        return $products;
    }
    public function getSubcategoriesId(Request $request)
    {
        $subId = [];
        $subcategory = Subcategory::whereIn('id', $request->subcategory)->get();

        foreach ($subcategory as $sub) {
            array_push($subId, $sub->id);
        }
       return $subId;
       
    }

    public function filterByPrice(Request $request){
        $categoryId =
        $product = Product::whereBetween('price',[$request->min,$request->max])->where('category_id',)->get();
        return $product;
    }
}
