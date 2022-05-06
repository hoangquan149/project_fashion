@extends('frontend.master')
@section('main')
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($data['banner'] as $value)
            <div class="hero__items set-bg" data-setbg="{{url('uploads/banner')}}/{{$value->image}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>{{$value->title}}</h2>
                                <p>{{$value->content}}</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="{{url('assets')}}/fe/img/banner/banner-1.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Clothing Collections 2030</h2>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{url('assets')}}/fe/img/banner/banner-2.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Accessories</h2>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="{{url('assets')}}/fe/img/banner/banner-3.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Shoes Spring 2030</h2>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All item</li>
{{--                    <li data-filter=".new-arrivals" class="active">Best Sellers</li>--}}
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @isset($data['product'])
                @foreach($data['product'] as $value)
                @if($value->isHot == 1)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{url('uploads/product')}}/{{$value->image}}">
                                <span class="label">Hot</span>
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
                @else
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{url('uploads/product')}}/{{$value->image}}">
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
                @endif
                @endforeach
            @endisset
        </div>
    </div>
</section>


<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <div class="instagram__pic__item set-bg" data-setbg="{{url('assets')}}/fe/img/instagram/instagram-1.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{url('assets')}}/fe/img/instagram/instagram-2.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{url('assets')}}/fe/img/instagram/instagram-3.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{url('assets')}}/fe/img/instagram/instagram-4.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{url('assets')}}/fe/img/instagram/instagram-5.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{url('assets')}}/fe/img/instagram/instagram-6.jpg"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>Instagram</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <h3>#Male_Fashion</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Latest News</span>
                    <h2>Fashion New Trends</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($data['blog'] as $value)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{url('uploads/blog')}}/{{$value->image}}"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt="">{{$value->created_at}}</span>
                            <h5>{{$value->title}}</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@section('script')
<script>

</script>
@endsection
@stop
