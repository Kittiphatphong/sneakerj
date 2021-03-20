@extends('layouts.adminLayout')
@section('title','Color list')
@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Color
                        <span class="d-block text-muted pt-2 font-size-sm">Color list</span></h3>
                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->
                    <a href="{{route('color.create')}}" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>New Record</a>
                    <!--end::Button-->
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
                        <th title="Field #1">Color name</th>
                        <th title="Field #2">Color code</th>
                        <th title="Field #4">Created at</th>
                        <th title="Field #3">Action</th>
                        <th title="Field #4">Updated at</th>


                    </tr>
                    </thead>
                    <tbody>
                @foreach($color as $c)
                  <tr>
                      <td>{{$c->name}}</td>
                      <td><p><span class="col-2 rounded border mr-2" style="background-color: {{$c->color_code}}"></span> <span>{{$c->color_code}}</span></p></td>
                      <td>{{$c->created_at}}</td>
                      <td>
                          <div class="d-flex justify-content-start">
                              <a href="{{route('color.edit',$c->id)}}" class="btn btn-link"><i class="far fa-edit"></i></a>

                              <form action="{{route('color.destroy',$c->id)}}" method="post" class="delete_form" >
                                  @csrf

                                  <input type="hidden" name="_method"value="DELETE">
                                  <button type="submit" class=" btn btn-link delete_submit" ><i class="fas fa-trash"></i></button>
                              </form>

                          </div>
                      </td>
                      <td>{{$c->updated_at}}</td>
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
