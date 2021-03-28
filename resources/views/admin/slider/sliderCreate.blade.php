@extends('layouts.adminLayout')
@section('title','New Slider')
@section('content')
    <div class="container">

        <div class="card card-custom ">
            <div class="card-toolbar m-4">
                <h3  class="font-weight-bolder  float-lg-left">{{isset($edit)?'Edit a slider':'Create a new slider'}}</h3>
                <!--begin::Button-->
                <a href="{{route('slider.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Slider list</a>
                <!--end::Button-->
            </div>
            <form class="p-4" action="{{isset($edit)? route('slider.update',$edit->id) : route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @isset($edit)
                    @method('put')
                @endisset
                <div class="form-group">
                    <label>IMAGE</label>

                    <input type="file" class="form-control" name="image" value="{{old('image',$sliders->image)}}">
                    @if(isset($edit))
                        <div class="d-flex justify-content-center mt-4 border rounded">
                            <br><br><br><br><br><br><br><br><br>
                            <img src="{{$sliders->image}}" width="50%">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{isset($edit)?'EDIT':'NEW'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
