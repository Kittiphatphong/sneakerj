<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Slider;
use App\Models\Sneaker;
use App\Models\SneakerBrand;
use App\Models\SneakerType;
use Livewire\Component;


class Wellcom extends Component
{
    public $type = [];
    public $color = [];
    public $price = 0 ;
    public $selectBrand = null;
    public $searchAll;

    public function refresh(){
        $this->type = [];
        $this->color = [];
        $this->price = 0 ;
    }
    public function select($brand){
        $this->selectBrand=$brand;
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        $brands = SneakerBrand::all();
        $types = SneakerType::orderBy('id','desc')->get();
        $sneakers = Sneaker::orderBy('id','desc')
        ->where('fullName','like','%'.$this->searchAll.'%');
        $colors = Color::orderBy('id','desc')->get();

        if($this->price != 0 ){
             switch ($this->price){
                 case 1:
                     $price1=0;
                     $price2=1000000;
                     break;
                 case 2:
                     $price1=1000000;
                     $price2=1500000;
                     break;
                 case 3:
                     $price1=1500000;
                     $price2=2000000;
                     break;
                 case 4:
                     $price1=2000000;
                     $price2=2500000;
                     break;
                 case 5:
                     $price1=2500000;
                     $price2=1000000;
                     break;
                 default:
             }
            $sneakers->whereBetween('price',[$price1,$price2]);
        }


        if($this->type != null){
            $sneakers->whereHas('types',function ($q){
                $q->whereIn('type',$this->type);
            }) ;
        }
        if($this->color != null){
            $sneakers->whereHas('sneakerColors',function ($q){
                $q->whereIn('color_id',$this->color);
            }) ;
        }
        if($this->selectBrand !=null){
            $sneakers->where('brand_id',$this->selectBrand);
        }


        return view('livewire.wellcom')
            ->with('sneakers',$sneakers)
            ->with('sneakerDataList',$sneakers->get())
            ->with('sneakers1',Sneaker::all())
            ->with('types',$types)
            ->with('brands',$brands)
            ->with('colors',$colors)
            ->with('menuBrands',SneakerBrand::all())
            ->with('sliderList',Slider::latest()->get());
    }

}
