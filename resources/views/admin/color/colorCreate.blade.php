@extends('layouts.adminLayout')
@section('title','New Color')
@section('content')
    <div class="container">

        <div class="card card-custom ">
            <div class="card-toolbar m-4">
                <h3  class="font-weight-bolder  float-lg-left">{{isset($c)?'Edit a color':'Create a new color'}}</h3>
                <!--begin::Button-->
                <a href="{{route('color.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Color list</a>
                <!--end::Button-->
            </div>
            <form class="p-4" action="{{isset($c)? route('color.update',$c->id) : route('color.store')}}" method="post">
                @csrf
                @isset($c)
                    @method('put')
                @endisset
                <div class="form-group">
                    <label>Color name</label>
                    <input type="text" class="form-control" name="name" value="{{isset($c)?$c->name:''}}">
                </div>
                <div class="form-group">
                    <label>Color Code</label>
                    <input type="color" value="{{isset($c)?$c->color_code:'#ffffff'}}" class="form-control" name="color_code">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{isset($c)?'EDIT':'NEW'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
