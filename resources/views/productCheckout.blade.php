
@extends('frame.emptyLayout')
@section('title','product detail')
@section('content')
    <!--begin::Page Layout-->
    <div class="d-flex flex-row">
        <!--begin::Layout-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Section-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder font-size-h3 text-dark">ລາຍ​ລະ​ອຽດການ​ສັ່ງ​ຊື້</span>
                    </h3>
                </div>
                <!--end::Header-->
                <div class="card-body">

    <div class="text-dark-50 line-height-lg">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="pl-0 font-weight-bold text-muted text-uppercase">ສິນ​ຄ້າ</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">ຈນ</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">ເບີ</th>
                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">ລາຄາ</th>
                </tr>
                </thead>
                <tbody>
                <tr class="font-weight-boldest">
                    <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                            <div class="symbol-label" style="background-image: url('{{$order->sneakers->sneakerImages->first()->name}}')"></div>
                        </div>
                        <!--end::Symbol-->
                        Street Sneakers</td>
                    <td class="text-right pt-7 align-middle">1</td>
                    <td class="text-right pt-7 align-middle">{{$order->sizes->er}}</td>
                    <td class="text-primary pr-0 pt-7 text-right align-middle">{{number_format($order->sneakers->price_sell)}} ກີບ</td>
                </tr>

                <tr>

                    <td colspan="2" class="font-weight-bolder text-right">ສ່ວນ​ລົດ</td>
                    <td colspan="2" class="font-weight-bolder text-right pr-0">{{$order->sneakers->discounts->number}}%
                </tr>

                <tr>

                    <td colspan="2" class="border-0 pt-0 font-weight-bolder font-size-h5 text-right">ຈຳ​ນວນ​ເງີນ</td>
                    <td colspan="2" class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0">{{number_format($order->price)}} ກີບ</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

                </div>
            <div class="card card-custom ">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder font-size-h3 text-dark">ຂໍ້​ມູນ​ສຳລັບ​ຈັດ​ສົ່ງ</span>
                    </h3>
                </div>
                <div class="px-4">
                <form method="post" action="{{route('order.update',$order->id)}}" class="mt-4">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>ເບີ​ໂທ</label>
                        <input type="number" placeholder="20XXXXXXXX" class="form-control" name="phone" required>
                        <span class="float-right text-danger">*ຈຳ​ເປັນ</span>
                    </div>
                    <div class="form-group">
                        <label>ທີ່ຢູ່​ຈັດ​ສົ່ງ</label>
                        <input type="text" placeholder="ບ່ອນ​ຮັບ​ເຄື່ອງ" class="form-control" name="address" required>
                        <span class="float-right text-danger">*ຈຳ​ເປັນ</span>
                    </div>
                    <div class="form-group">
                        <label>ເຟກ​ບຸກ​ (FACEBOOK)</label>
                        <input type="text" placeholder="facebook" name="facebook" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>ຄອມ​ເມັ້ນ</label>
                        <textarea placeholder="ຄອມ​ເມັ້ນຂອງ​ທ່າ​ນ" name="comment" class="form-control"></textarea>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">ສົ່ງ</button>
                    </div>
                </form>
                </div>
            <!--end::Section-->

        </div>
        <!--end::Layout-->
    </div>
    </div>
@endsection
