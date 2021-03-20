@extends('layouts.adminLayout')
@section('title','New Size')
@section('content')
    <div class="container">

        <div class="card card-custom ">
            <div class="card-toolbar m-4">
                <h3  class="font-weight-bolder  float-lg-left">{{isset($s)?'Edit a size':'Create a new size'}}</h3>
                <!--begin::Button-->
                <a href="{{route('size.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Size list</a>
                <!--end::Button-->
            </div>
            <form class="p-4" action="{{isset($s)? route('size.update',$s->id) : route('size.store')}}" method="post">
                @csrf
                @isset($s)
                    @method('put')
                @endisset
                <div class="form-group">
                    <label>UK</label>
                    <input type="number" class="form-control" name="uk" value="{{isset($s)?$s->uk:''}}" step="0.5">
                </div>
                <div class="form-group">
                    <label>US</label>
                    <input type="number" class="form-control" name="us" value="{{isset($s)?$s->us:''}}" step="0.5">
                </div>
                <div class="form-group">
                    <label>ER</label>
                    <input type="number" class="form-control" name="er" value="{{isset($s)?$s->er:''}}" step="0.5">
                </div>
                <div class="form-group">
                    <label>CM</label>
                    <input type="number" class="form-control" name="cm" value="{{isset($s)?$s->cm:''}}" step="0.5">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                    <option value="" disabled selected>please choose</option>
                    <option value="men" @isset($s) @if($s->type == 'men') selected @endif @endisset>Men</option>
                    <option value="women" @isset($s) @if($s->type == 'women') selected @endif @endisset>Women</option>
                    <option value="kid" @isset($s) @if($s->type == 'kid') selected @endif @endisset>Kid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                   <select class="form-control" id="kt_select2_1" name="brand_id">
                       <option value="" disabled selected>please choose</option>
                   @foreach($brandList as $brand)
                       <option value="{{$brand->id}}" @isset($s)  @if($s->brand_id==$brand->id) selected @endif @endisset>{{$brand->brand}}</option>
                       @endforeach
                   </select>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{isset($s)?'EDIT':'NEW'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
