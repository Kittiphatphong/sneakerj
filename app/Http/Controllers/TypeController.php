<?php

namespace App\Http\Controllers;

use App\Models\SneakerType;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        return view('admin.type.typeList')
            ->with('type',SneakerType::orderBy('id','desc')->get());

    }

    public function create()
    {
        return view('admin.type.typeCreate')
            ->with('type','type');
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
           'type' => 'required'
        ]);
        $type = new SneakerType();
        $type->type = $request->type;
        $type->save();
        return redirect()->route('type.index')->with('success','Created a new type successful');
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
        return view('admin.type.typeCreate')
            ->with('type','type')
            ->with('t',SneakerType::find($id));
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
            'type' => 'required'
        ]);
        $type = SneakerType::find($id);
        $type->type = $request->type;
        $type->save();
        return redirect()->route('type.index')->with('success','Updated a new type successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SneakerType::find($id)->delete();
        return back()->with('success','Deleted type successful');
    }
}
