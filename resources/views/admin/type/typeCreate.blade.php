@extends('layouts.adminLayout')
@section('title','New Type')
@section('content')
    <div class="container">

        <div class="card card-custom ">
            <div class="card-toolbar m-4">
                <h3  class="font-weight-bolder  float-lg-left">{{isset($t)?'Edit a type':'Create a new type'}}</h3>
                <!--begin::Button-->
                <a href="{{route('type.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Type list</a>
                <!--end::Button-->
            </div>
            <form class="p-4" action="{{isset($t)? route('type.update',$t->id) : route('type.store')}}" method="post">
                @csrf
                @isset($t)
                    @method('put')
                @endisset
                <div class="form-group">
                    <label>Type name</label>
                    <input type="text" class="form-control" name="type" value="{{isset($t)?$t->type:''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{isset($t)?'EDIT':'NEW'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
