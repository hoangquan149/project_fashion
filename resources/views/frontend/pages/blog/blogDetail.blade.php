@extends('frontend.master')
@section('main')

    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{$blog->title}}</h2>
                        <ul>
                            <li>By Deercreative</li>
                            <li>{{$blog->created_at}}</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="blog__details__pic">
                        <img src="{{url('uploads/blog')}}/{{$blog->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
{{--                        <div class="blog__details__share">--}}
{{--                            <span>share</span>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>--}}
{{--                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="blog__details__text">
                            <p>{{$blog->content}}</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
