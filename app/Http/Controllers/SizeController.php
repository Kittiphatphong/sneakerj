<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\SneakerBrand;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.size.sizeList')
            ->with('size',Size::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.sizeCreate')
            ->with('size','size')
            ->with('brandList',SneakerBrand::orderBy('id','desc')->get());
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
            'uk' => 'required',
            'us' => 'required',
            'er' => 'required',
            'cm' => 'required',
            'type' => 'required',
            'brand_id' => 'required'
        ]);
        $size = new Size();
        $size->uk = $request->uk;
        $size->us = $request->us;
        $size->er = $request->er;
        $size->cm = $request->cm;
        $size->type =$request->type;
        $size->brand_id = $request->brand_id;
        $size->save();
        return redirect()->route('size.index')->with('success','Create a new size successful');

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
        return view('admin.size.sizeCreate')
            ->with('size','size')
            ->with('brandList',SneakerBrand::orderBy('id','desc')->get())
            ->with('s',Size::find($id));
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
            'uk' => 'required',
            'us' => 'required',
            'er' => 'required',
            'cm' => 'required',
            'type' => 'required',
            'brand_id' => 'required'
        ]);
        $size = Size::find($id);
        $size->uk = $request->uk;
        $size->us = $request->us;
        $size->er = $request->er;
        $size->cm = $request->cm;
        $size->type =$request->type;
        $size->brand_id = $request->brand_id;
        $size->save();
        return redirect()->route('size.index')->with('success','Updated a new size successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Size::find($id)->delete();
        return back()->with('success','Deleted size successful');
    }
}
