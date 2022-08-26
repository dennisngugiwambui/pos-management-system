<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Store;
// use App\Models\Product;
use App\Models\Order_Detail;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $orders=Order::all();
        return view('orders.index', ['products'=>$products, 'orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        DB::transaction(function() use($request){
            //i will use the order model here
            $orders = new Order;
            $orders->name = $request->customer_name;
            $orders->phone = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;


            //i will use order details model here
            for($product_id = 0; $product_id<count($request->product_id); $product_id++){
               dd($request);
            }
            //i will use the transaction model here
            $transaction = new Transaction();

            $transaction->order_id =$order_id;
            $transaction->user_id = auth()->user()->id;

            $transaction->balance =$request->balance;
            $transaction->paid_amount =$request->paid_amount;
            $transaction->payment_method =$request->payment_method;
            $transaction->transact_amount =$order_details->amount;
            $transaction->transact_date=date('Y-m-d');
            $transaction->save();


            //i have to place the order History here.
            $products= Product::all();
            $order_details= Order_Detail::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index', [
                'products'=> $products,
                'order_details'=>$order_details,
                'customer_orders'=>$orderedBy
            ]);
        });

        return "product Order Fails to be Inserted, Check your Inputs";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
