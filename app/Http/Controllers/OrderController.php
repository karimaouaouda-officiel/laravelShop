<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderSource;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function newOrdre(Request $request){

        $request->validate([
            'user_id' => "required"
        ]);

        $user_id = $request->input('user_id');

        $date = now(null);

        $order = new OrderSource;

        $order->user_id = $user_id;
        $order->date_of_order = $date;

        $order->save();

        return json_encode(['message'=>'order created successfully' , 'order_id' => $order->id , 'statut'=>200]);
    }


    public function addToOrder(Request $request){
        $request->validate([
            'order_id' => 'bail|required',
            'product_id' => 'required'
        ]);
        $order_id = $request->input('order_id');
        $product_id = $request->input('product_id');
        $statut = "pending";
        $order = new Order;

        $order->order_id = $order_id;
        $order->statut = $statut;
        $order->product_id = $product_id;

        $order->save();


        return json_encode([
            'message' => 'succefully add this product to the order'
        ]);
    }

    public function makeOrder(){
        return view('makeorder');
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
