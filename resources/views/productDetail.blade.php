@extends('frame.emptyLayout')
@section('title','product detail')
@section('content')
    <!--begin::Page Layout-->
    <div class="d-flex flex-row">
        <!--begin::Aside-->
        <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">

            <!--begin::List Widget 21-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column mb-5">
                        <span class="card-label font-weight-bolder text-dark mb-1">ສິນ​ຄ້າ​ແນະ​ນຳ</span>
                        <span class="text-muted mt-2 font-weight-bold font-size-sm">ສິນ​ຄ້າ​ໃໝ່</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    @foreach($newSneakers as $sneaker)
                    <div class="d-flex mb-8">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                            <div class="d-flex flex-column">
                                <div class="symbol-label mb-3" style="background-image: url('{{$sneaker->sneakerImages->first()->name}}')"></div>
                                <a href="#" class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">ເບີ່ງ</a>
                            </div>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                            <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">{{$sneaker->brands->brand}}</span>
                            <span class="text-muted font-weight-bold font-size-sm mb-3">{{$sneaker->name_eng}}</span>
                            @if($sneaker->discounts->number>0)
                                <span class="text-muted font-weight-bold font-size-lg"><del>{{number_format($sneaker->price_sell)}}</del>
														<span class="text-dark-75 font-weight-bolder">{{number_format($sneaker->price)}} ກີບ</span></span>
                            @else
                                <span class="text-muted font-weight-bold font-size-lg"><span class="text-dark-75 font-weight-bolder">{{number_format($sneaker->price)}} ກີບ</span></span>
                                @endif

                        </div>
                        <!--end::Title-->
                    </div>
                @endforeach
                    <!--end::Item-->

                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 21-->
        </div>
        <!--end::Aside-->
        <!--begin::Layout-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Section-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder font-size-h3 text-dark">{{$sneakerJJ->brands->brand}} {{$sneakerJJ->name_eng}}</span>
                    </h3>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <!--begin::Shopping Cart-->


                    <div >
                        <div class="tab-content m-0 p-0 d-flex justify-content-center" id="myTabContent" style="background-color: #ECEEF0">
                            @foreach($sneakerJJ->sneakerImages as $key => $image)
                            <div class="tab-pane fade text-center rounded @if($loop->first)show active @endif p-0 m-0 col-8" id="kt_tab_pane_{{$key+1}}" role="tabpanel" aria-labelledby="kt_tab_pane_2" style="background-color: #ECEEF0">
                                <img src="{{$image->name}}" alt="sneaker" class="text-center " width="100%" > </a>
                            </div>

                            @endforeach
                        </div>

                        <ul class="nav nav-tabs nav-tabs-line">
                            @foreach($sneakerJJ->sneakerImages as $key => $image)
                                <li class="nav-item">
                                    <span class="nav-link @if($loop->first)active @endif py-1 pr-1 p-0 m-0" data-toggle="tab" href="#kt_tab_pane_{{$key+1}}">
                                        <img src="{{$image->name}}" alt="" width="40px" height="30px"> </span>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                        <div>

<h1 class="mt-4 btn btn-dark btn-sm"><span class="h4">{{$sneakerJJ->brands->brand}}</span></h1>
                            <h4>{{$sneakerJJ->name_eng}}</h4>
                            <h5>ປະເພດ: {{$sneakerJJ->types->type}}</h5>
                            @if($sneakerJJ->discounts->number>0)
                            <h5>ລາຄາ: <del class="h6 text-muted">{{number_format($sneakerJJ->price_sell)}} ກີບ</del> <span class="text-primary">{{number_format($sneakerJJ->price)}} ກີບ</span></h5>
                            @else
                            <h5>ລາຄາ: <span class="text-primary">{{number_format($sneakerJJ->price)}} ກີບ</span></h5>
                            @endif
                            @foreach($sneakerJJ->sneakerColors as $color)
                                <span class="btn btn-{{$color->colors->name}}  rounded-circle p-4 mr-3"></span>

                            @endforeach
                            <div class="table-responsive mt-1">
<hr>
<h3>ເລືອກ​ຂະ​ໜາດ</h3>  <h1 class=""><i class="far fa-arrow-alt-circle-down text-danger icon-2x ml-2"></i></h1>
                                <form method="post" action="{{route('order.store')}}" class="mt-4">

                                <table class="table ">

                                        <tbody>
                                        @foreach($sneakerJJ->sneakerSizes as $ss)
                                        <tr>
                                            <th>
                                                <label class="radio radio-lg">
                                                    <input type="radio"  name="size" value={{$ss->sizes->id}} @if($loop->first) checked @endif/>
                                                    <span></span>

                                                    <div class="ml-auto text-muted font-weight-bold"></div>
                                                </label>

                                            </th>
                                            <td>UK{{$ss->sizes->uk}}</td>
                                            <td>US{{$ss->sizes->us}}</td>
                                            <td>EUR{{$ss->sizes->er}}</td>
                                            <td>CM{{$ss->sizes->cm}}</td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                            </div>
                        </div>



                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-bolder">ລະຫັດ​ສ່ວນ​ລົດ</label>

                                             <input type="text" class="form-control " placeholder="ລະຫັດ​ສ່ວນ​ລົດ" />

                                            <button type="submit" class="btn btn-success btn-block mt-3">ສັງເຄື່ອງ</button>

                                        </div>

                                        <input type="hidden" value={{$sneakerJJ->id}} name="sneaker_id">
                                    </form>

                </div>
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin::Heading-->
                    <div class="d-flex justify-content-between align-items-center mb-7">
                        <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">ແນະ​ນຳ​ສິນ​ຄ້າ</h2>

                    </div>
                    <!--end::Heading-->
                    <!--begin::Products-->
                    <div class="row">
                        @foreach($sneakers as $sneaker)
                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="#" class="image rounded">
                                        @foreach($sneaker->sneakerImages->take(2) as $key => $image)
                                            <img class="pic-{{$key+1}} rounded" src="{{$image->name}}">
                                        @endforeach
                                    </a>
                                    <span class="product-sale-label {{$sneaker->statuses->style}}">{{$sneaker->statuses->name}}</span>
                                    @if($sneaker->discounts->number>0)
                                        <span class="product-discount-label {{$sneaker->discounts->style}}">-{{$sneaker->discounts->number}}%</span>
                                    @endif
                                </div>
                                <div class="product-content">
                                    {{--                                                                        <ul class="rating">--}}
                                    {{--                                                                            <li class="fas fa-star"></li>--}}
                                    {{--                                                                            <li class="fas fa-star"></li>--}}
                                    {{--                                                                            <li class="fas fa-star"></li>--}}
                                    {{--                                                                            <li class="fas fa-star"></li>--}}
                                    {{--                                                                            <li class="fas fa-star disable"></li>--}}
                                    {{--                                                                        </ul>--}}
                                    <span class="h6">{{$sneaker->brands->brand}} {{$sneaker->name_eng}}</span>
                                    @if($sneaker->discounts->number>0)
                                        <div class="price text-primary"><span>{{number_format($sneaker->price_sell)}}ກີບ</span> {{number_format($sneaker->price)}}ກີບ</div>
                                    @else
                                        <div class="price text-primary "> {{number_format($sneaker->price_sell)}}ກີບ</div>
                                    @endif
                                    <div class="product-button-group">
                                        <span class="product-like-icon" href="#"><i class="fas fa-arrow-circle-right"></i></span>
                                        <a class="add-to-cart" href="{{route('product.detail',$sneaker->id)}}">ເບີ່ງສິນ​ຄ້າ</a>
                                        <span class="product-compare-icon" href="#"><i class="fas fa-arrow-circle-left"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--end::Products-->
                </div>
            </div>
            <!--end::Section-->
        </div>
        <!--end::Layout-->
    </div>

@endsection
