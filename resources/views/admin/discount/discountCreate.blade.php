@extends('layouts.adminLayout')
@section('title','New Discount')
@section('content')
    <div class="container">

        <div class="card card-custom ">
            <div class="card-toolbar m-4">
                <h3  class="font-weight-bolder  float-lg-left">{{isset($edit)?'Edit a discount':'Create a new discount'}}</h3>
                <!--begin::Button-->
                <a href="{{route('status.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Status list</a>
                <!--end::Button-->
            </div>
            <form class="p-4" action="{{isset($edit)? route('discount.update',$edit->id) : route('discount.store')}}" method="post">
                @csrf
                @isset($edit)
                    @method('put')
                @endisset
                <div class="form-group">
                    <label>PERCENT</label>
                    <input type="number" class="form-control" name="number" value="{{isset($edit)?$edit->number:''}}" >
                </div>
                <div class="form-group">
                    <label>STYLE</label>
                    <input type="text" class="form-control" name="style" value="{{isset($edit)?$edit->style:''}}" >
                </div>



                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{isset($edit)?'EDIT':'NEW'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
