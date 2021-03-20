<?php

namespace App\Http\Controllers;

use App\Models\SneakerBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.brandList')
            ->with('brands',SneakerBrand::orderBy('id','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.brandCreate')
            ->with('brands','brands');
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
           'brand' => 'required'
        ]);
        $brand = New SneakerBrand();
        $brand->brand = $request->brand;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Create new brand successful');
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
        return view('admin.brand.brandCreate')
            ->with('brands','brands')
            ->with('brand',SneakerBrand::find($id));
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
            'brand' => 'required'
        ]);
        $brand = SneakerBrand::find($id);
        $brand->brand = $request->brand;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Updated a brand successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = SneakerBrand::find($id);
        $brand->delete();
        return back()->with('success','deleted brand successful');
    }
}
