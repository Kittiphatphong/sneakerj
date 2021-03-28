<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sneaker;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $sneaker_id = $request->sneaker_id;
        $sneaker = Sneaker::find($sneaker_id);
        $order = new Order();
        $order->sneaker_id = $sneaker_id;
        $order->size_id = $request->size;
        $order->price = $sneaker->price;
        $order->save();
        return redirect()->route('order.edit',$order->id);
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
        return view('productCheckout')
            ->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $order = Order::find($id);
    if($order->phone != null){
        return redirect()->route('home')->with('success','No!! do not hack my website pls');
    }

       $order->phone =$request->phone;
       $order->address = $request->address;
       $order->comment = $request->comment;
       $order->save();
       return redirect()->route('home')
           ->with('success','ທ່າ​ນ​ໄດ້​ສັ່ງ​ຊື້​ເກີບ​ສຳ​ເລັດ​ແລ້ວ​ເຮົາ​ຈະ​ຕິດ​ຕໍ່​ທ່ານ​ໄປ​ໄວ​ໄວ​ນີ້');

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
