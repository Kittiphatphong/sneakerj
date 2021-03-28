<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.discount.discountList')
            ->with('discounts',Discount::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.discountCreate')
            ->with('discounts','discounts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'number' => 'required',
            'style' => 'required'
        ]);
        $discount = new Discount();
        $discount->number = $request->number;
        $discount->percent = $request->number/100;
        $discount->style =$request->style;
        $discount->save();
        return redirect()->route('discount.index')->with('success','Created a new discount successful');
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
        return view('admin.discount.discountCreate')
            ->with('discounts','discounts')
            ->with('edit',Discount::find($id));
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
        $request->validate([
            'number' => 'required',
            'style' => 'required'
        ]);
        $discount = Discount::find($id);
        $discount->number = $request->number;
        $discount->percent = $request->number/100;
        $discount->style =$request->style;
        $discount->save();
        return redirect()->route('discount.index')->with('success','Updated discount successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return back()->with('success','Deleted a discount successful');
    }
}
