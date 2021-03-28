<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.sliderList')
            ->with('sliders',Slider::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.sliderCreate')
            ->with('sliders',new Slider());
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

            'image' => 'required|file|image|max:50000|mimes:jpeg,png,jpg'
        ]);
        $stringImageReformat = base64_encode('_'.time());
        $ext = $request->file('image')->getClientOriginalExtension();
        $imageName = $stringImageReformat.".".$ext;
        $imageEncode = File::get($request->image);
        $slider = new Slider();
        $slider->image= "/storage/slider_image/".$imageName;
        $slider->save();
        Storage::disk('local')->put('public/slider_image/'.$imageName, $imageEncode);

        return redirect()->route('slider.index')->with('success','Uploaded slider successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        Storage::delete("public/slider_image/".str_replace('/storage/slider_image/','',$slider->image));
        $slider->delete();
        return redirect()->route('slider.index')->with('success','Delete slider successful');
    }
}
