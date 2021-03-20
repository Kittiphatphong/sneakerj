@extends('layouts.adminLayout')
@section('title','New Brand')
@section('content')
    <div class="container">

            <div class="card card-custom ">
                <div class="card-toolbar m-4">
                    <h3  class="font-weight-bolder  float-lg-left">{{isset($brand)?'Edit a brand':'Create a new brand'}}</h3>
                    <!--begin::Button-->
                    <a href="{{route('brand.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Brand list</a>
                    <!--end::Button-->
                </div>
        <form class="p-4" action="{{isset($brand)? route('brand.update',$brand->id) : route('brand.store')}}" method="post">
            @csrf
            @isset($brand)
                @method('put')
            @endisset
            <div class="form-group">
                <label>Brand name</label>
                <input type="text" class="form-control" name="brand" value="{{isset($brand)?$brand->brand:''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">{{isset($brand)?'EDIT':'NEW'}}</button>
            </div>
        </form>
              </div>
    </div>

@endsection
