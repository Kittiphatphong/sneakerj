@extends('layouts.adminLayout')
@section('title','Order list')
@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Order list
                        <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                    <thead>
                    <tr>
                        <th title="Field #9">Image</th>
                        <th title="Field #2">Name</th>
                        <th title="Field #4">Price Sell</th>
                        <th title="Field #6">Price</th>
                        <th title="Field #6">For</th>
                        <th title="Field #9">Size</th>

                        <th>Action</th>

                        <th title="Field #3">Phone</th>
                        <th title="Field #5">Address</th>
                        <th>Facebook</th>
                        <th>Comment</th>
                        <th>Ship Date</th>
                        <th>Remark</th>
                        <th>Created_at</th>


                    </tr>
                    </thead>
                    <tbody>
@foreach($orderList as $order)
                    <tr>
                        <td>{{$order->id}} <a href="{{$order->sneakers->image()}}" target="_blank"><img src="{{$order->sneakers->image()}}" width="30%" class="ml-1"></a></td>
                        <td>{{$order->sneakers->brands->brand}} {{$order->sneakers->name_eng}}</td>
                        <td>{{number_format($order->sneakers->price_sell)}} <span class="text-danger">({{$order->sneakers->discounts->number}} %)</span></td>
                        <td>{{number_format($order->price)}}</td>
                        <td>{{$order->sneakers->for}}</td>
                        <td>{{$order->sizes->cm}}</td>

                        <td>
                            <div class="d-flex justify-content-start">
                                <a href="" class="btn btn-link"><i class="far fa-edit"></i></a>

                                <form action="" method="post" class="delete_form" >
                                    @csrf

                                    <input type="hidden" name="_method"value="DELETE">
                                    <button type="submit" class=" btn btn-link delete_submit" ><i class="fas fa-trash"></i></button>
                                </form>

                            </div>
                        </td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->facebook}}</td>
                        <td>{{$order->comment}}</td>
                        <td>{{$order->shipDate}}</td>
                        <td>{{$order->remark}}</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
@endforeach

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>

@endsection
