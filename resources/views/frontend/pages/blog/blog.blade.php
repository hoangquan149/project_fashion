@extends('frontend.master')
@section('main')
    <section class="breadcrumb-blog set-bg" data-setbg="{{url('assets/fe')}}/img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach($blog as $value)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{url('uploads/blog')}}/{{$value->image}}"></div>
                            <div class="blog__item__text">
                                <span><img src="img/icon/calendar.png" alt="">{{$value->created_at}}</span>
                                <h5>{{$value->title}}</h5>
                                <a href="{{route('frontend.detail.blog',$value->id)}}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
