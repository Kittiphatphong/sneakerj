<?php

namespace App\Http\Controllers;


use App\Models\ColorSneaker;
use App\Models\SizeSneaker;
use App\Models\Sneaker;
use App\Models\SneakerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SneakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.productList')
            ->with('products',Sneaker::orderBy('id','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.productCreate')
            ->with('products','products');
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
            'name_eng' => 'required',
            'name_lao' => 'required',
            'price_sell' => 'required',
            'price_buy' => 'required',
            'year' => 'required',
            'brand_id' => 'required',
            'type_id' => 'required',
            'for' => 'required',
            'colors' => 'required',
            'sizes' => 'required',
            'images' => 'required'
        ]);

        $sneaker = new Sneaker();
        $sneaker->name_eng = $request->name_eng;
        $sneaker->name_lao = $request->name_lao;
        $sneaker->price_sell = $request->price_sell;
        $sneaker->price_buy = $request->price_buy;
        $sneaker->year = $request->year;
        $sneaker->brand_id = $request->brand_id;
        $sneaker->type_id = $request->type_id;
        $sneaker->for = $request->for;
        $sneaker->save();
        foreach ($request->colors as $color){
            $colorSneaker = new ColorSneaker();
            $colorSneaker->color_id = $color;
            $colorSneaker->sneaker_id = $sneaker->id;
            $colorSneaker->save();
        }
        foreach ($request->sizes as $size){
            $sizeSneaker = new SizeSneaker();
            $sizeSneaker->size_id = $size;
            $sizeSneaker->sneaker_id = $sneaker->id;
            $sizeSneaker->save();
        }
        if($files=$request->file('images')){
            $this->upImages($files,$sneaker->id);
        }
        return redirect()->route('product.index')->with('success','Created a new product successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function show(Sneaker $sneaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Sneaker $sneaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sneaker $sneaker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sneaker = Sneaker::find($id);
        foreach ($sneaker->sneakerImages as $images){
            Storage::delete("public/sneaker_image/".str_replace('/storage/sneaker_image/','',$images->name));
        }
        $sneaker->delete();
        return redirect()->route('product.index')->with('success','Delete success');
    }


    public function upImages($files,$sneakerId){
        foreach($files as $file){
            $sneakerImage = new SneakerImage();
            $stringImageReformat = base64_encode('_'.time());
            $ext = $file->getClientOriginalName();
            $imageName = $stringImageReformat.".".$ext;
            $imageEncode = File::get($file);
            $sneakerImage->sneaker_id = $sneakerId;
            $sneakerImage->name = "/storage/sneaker_image/".$imageName;
            $sneakerImage->save();
            Storage::disk('local')->put('public/sneaker_image/'.$imageName, $imageEncode);
        }
    }
}
