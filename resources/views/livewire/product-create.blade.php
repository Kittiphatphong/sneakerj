
    <div class="container">
        <div class="card card-custom ">
            <div class="card-toolbar m-4">
                <h3  class="font-weight-bolder  float-lg-left">{{isset($p)?'Edit a product':'Create a new product'}}</h3>
                <!--begin::Button-->
                <a href="{{route('product.index')}}" class="btn btn-primary font-weight-bolder  float-lg-right">
											<span>

                                                <!--end::Svg Icon-->
											</span>Product list</a>
                <!--end::Button-->
            </div>
            <form class="p-4" action="{{isset($p)? route('product.update',$p->id) : route('product.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                @isset($p)
                    @method('put')
                @endisset
                <div class="form-group">
                    <label>Name Eng</label>
                    <input type="text" class="form-control" name="name_eng" value="{{isset($p)?$p->name_eng:''}}" >
                </div>
                <div class="form-group">
                    <label>Name Laos</label>
                    <input type="text" class="form-control" name="name_lao" value="{{isset($p)?$p->name_lao:''}}" >
                </div>
                <div class="form-group">
                    <label>Price Buy</label>
                    <input type="number" class="form-control" name="price_buy" value="{{isset($p)?$p->price_buy:''}}" >
                </div>
                <div class="form-group">
                    <label>Price Sell</label>
                    <input type="number" class="form-control" name="price_sell" value="{{isset($p)?$p->price_sell:''}}" >
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input type="number" class="form-control" name="year" value="{{isset($p)?$p->year:''}}" >
                </div>

                <div class="form-group">
                    <label>Brand</label>
                    <select class="form-control"  name="brand_id" wire:model="brand">
                        <option value=null disabled>please choose brand</option>
                        @foreach($brandList as $brand)
                            <option value="{{$brand->id}}" @isset($p)  @if($p->brand_id==$brand->id) selected @endif @endisset>{{$brand->brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Product for</label>
                    <select class="form-control" name="for" wire:model="for">
                        <option value=null disabled>please choose</option>
                        <option value="men" @isset($p) @if($s->type == 'men') selected @endif @endisset>Men</option>
                        <option value="women" @isset($p) @if($s->type == 'women') selected @endif @endisset>Women</option>
                        <option value="kid" @isset($p) @if($s->type == 'kid') selected @endif @endisset>Kid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type_id">
                        <option value="" disabled selected>please choose type</option>
                        @foreach($typeList as $t)
                            <option value="{{$t->id}}" @isset($p)  @if($p->type_id==$t->id) selected @endif @endisset>{{$t->type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Colors</label>
                    <div class="checkbox-inline">
                        @foreach($colorList as $c)
                            <label class="checkbox checkbox-lg p-2 rounded border" style="background-color: {{$c->color_code}}">
                                <input type="checkbox"  name="colors[]" value="{{$c->id}}"/>
                                <span></span>{{$c->name}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <div class="checkbox-inline">
                    @if($for == null || $brand == null)
                            <span class="text-danger">Please choose brand and product for</span>

                        @else
                    @forelse($sizeList as $ss)
                        <label class="checkbox checkbox-lg p-2 rounded border" >
                            <input type="checkbox"  name="sizes[]" value="{{$ss->id}}"/>
                            <span></span>UK: {{$ss->uk}}</span> | US: {{$ss->us}} | ER: {{$ss->er}} | CM: {{$ss->cm}}</label>
                    @empty
                        <span class="text-danger">No result</span>
                    @endforelse
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Discount</label>
                    <select class="form-control"  name="discount_id">

                        @foreach($discounts as $discount)
                            <option value="{{$discount->id}}" @isset($p)  @if($p->discount_id==$discount->id) selected @endif @endisset>{{$discount->number}} %</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control"  name="status_id">

                        @foreach($statuses as $status)
                            <option value="{{$status->id}}" @isset($p)  @if($p->status_id==$status->id) selected @endif @endisset>{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <lable>IMAGES</lable>
                    <input type="file" class="form-control" name="images[]" multiple>
                </div>




                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{isset($p)?'EDIT':'NEW'}}</button>
                </div>
            </form>
        </div>
    </div>

