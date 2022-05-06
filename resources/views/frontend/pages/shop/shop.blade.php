@extends('frontend.master')
@section('main')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="index-2.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" id="myInput" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($category as $value)
                                                        <li><a href="{{route('frontend.all.product',$value->id)}}?category={{$value->name}}">{{$value->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    @foreach($brand as $value)
                                                        <li><a href="{{route('frontend.all.product',$value->id)}}?brand={{$value->name}}">{{$value->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="card">--}}
{{--                                    <div class="card-heading">--}}
{{--                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>--}}
{{--                                    </div>--}}
{{--                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <div class="shop__sidebar__price">--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="#">$0.00 - $50.00</a></li>--}}
{{--                                                    <li><a href="#">$50.00 - $100.00</a></li>--}}
{{--                                                    <li><a href="#">$100.00 - $150.00</a></li>--}}
{{--                                                    <li><a href="#">$150.00 - $200.00</a></li>--}}
{{--                                                    <li><a href="#">$200.00 - $250.00</a></li>--}}
{{--                                                    <li><a href="#">250.00+</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                @foreach($size as $value)
                                                    <a href="{{route('frontend.all.product',$value->id)}}?size={{$value->name}}">
                                                        <label for="xs">{{$value->name}}</label>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__color">
                                                @foreach($color as $value)
                                                    <a href="{{route('frontend.all.product',$value->id)}}?color={{$value->name}}">
                                                        <label class=""  style="background: {{$value->value}}" for="sp-1"></label>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
{{--                                <div class="shop__product__option__right">--}}
{{--                                    <form>--}}
{{--                                        @csrf--}}
{{--                                        <select class="form-control" name="sort" id="sort"--}}
{{--                                                onchange="window.location = this.options[this.selectedIndex].value;">>--}}
{{--                                            <option>-Sắp Xếp-</option>--}}
{{--                                            <option value="{{ Request::url() }}?sort_by=price_asc">Sắp xếp giá tăng dần</option>--}}
{{--                                            <option value="{{ Request::url() }}?sort_by=price_desc">Sắp xếp giá giảm dần</option>--}}
{{--                                            <option value="{{ Request::url() }}">Không</option>--}}
{{--                                        </select>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($product as $value)
                            <div class="col-lg-4 col-md-6 col-sm-6" id="myTable">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{url('uploads/product')}}/{{$value->image}}">
                                        <span class="label">New</span>
                                        <ul class="product__hover">
                                            <li><a href="{{route('frontend.detail.product',$value->id)}}"><img src="{{url('assets')}}/fe/img/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{$value->name}}</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>{{($value->sale_price>0)?number_format($value->sale_price):number_format($value->price)}}Đ</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
