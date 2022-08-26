<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $product= Product::all();
        return view('products.index',compact('product'));
        // $product = Product::query()->get();
        // return view('products.index',[
        //      "product"=>$product
        //  ]);
    }

    public function uploadproduct(Request $request)
    {
        //return view('products.index');

        // $products = new product;

        // $products->name=$request->name;
        // $products->description=$request->description;
        // $products->sellingprice=$request->sellingprice;
        // $products->quantity=$request->quantity;
        // $products->save();

        Product::create($request->all());
        $message='product uploaded successfully';

        alert()->success('success', $message)->persistent();
        return redirect()->back()->with($message);
    }

    public function update(Request $request)
    {

        $products = Product::find($request->id);
        if(!$products){
            $message = 'product upload failure';
            return back()->with('Error', $message);
        }
        $products ->update($request->all());

        $message = 'product updated successfully';
        alert()->success('Success',$message)->persistent();
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    public function destroy(Request $request)
    {
        $products = Product::find($request->id);
        if(!$products){
            return back()->with('Error', 'User not found');
        }
        $products ->delete();
        $message='products deleted successfully';
        alert()->success('success', $message)->persistent();
        return back()->with('success', $message);
    }
}
