<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Discount;
use App\Models\Size;
use App\Models\SneakerBrand;
use App\Models\SneakerType;
use App\Models\Status;
use Livewire\Component;

class ProductCreate extends Component
{
    public $brand=null;
    public $for= null;
    public function render()
    {
        $size = Size::where('type',$this->for)
            ->where('brand_id','=',$this->brand)->orderBy('cm')->get();
        return view('livewire.product-create')
            ->with('brandList',SneakerBrand::orderBy('id','desc')->get())
            ->with('typeList',SneakerType::all())
            ->with('colorList',Color::all())
            ->with('sizeList',$size)
            ->with('discounts',Discount::orderBy('number')->get())
            ->with('statuses',Status::latest()->get());
    }
}
