<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/malefashion/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Sep 2021 08:17:15 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>
    <link rel="stylesheet" href="{{url('assets')}}/fe/css/style.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe/css/checkout.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe/css/bootstrap.min.css%2bfont-awesome.min.css%2belegant-icons.css%2bmagnific-popup.css%2bnice-select.css%2bowl.carousel.min.css%2bslicknav.min.css%2bstyle.css.pagespeed.cc.f6PPq5zNCp.css" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets')}}/fe/css/comment.css">

</head>
<body>
<header class="header" style="padding: 0px">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            @if(\Illuminate\Support\Facades\Auth::guard('customer')->user())
                                <a href="{{route('frontend.logout')}}">Log out</a>
                            @else
                                <a href="{{route('frontend.login')}}">Sign in</a>
                                <a href="{{route('frontend.register')}}">Register</a>
                            @endif
                        </div>
                        <div class="header__top__links">
                            @isset (\Illuminate\Support\Facades\Auth::guard('customer')->user()->name)
                                <a href="">{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}}</a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{route('frontend.home')}}"><img src="{{url('assets')}}/fe/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('frontend.home')}}">Home</a></li>
                        <li><a href="{{route('frontend.shop')}}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{route('frontend.list.cart')}}">Shopping Cart</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('frontend.blog')}}">Blog</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    @if (\Illuminate\Support\Facades\Auth::guard('customer')->user())
                        <a href="{{route('frontend.list.cart')}}"><img  src="{{url('assets')}}/fe/img/icon/cart.png" alt=""> <span class="count-cart">{{$cartCount}}</span></a>
                    @else
                        <a href="{{route('frontend.list.cart')}}?login=cart"><img src="{{url('assets')}}/fe/img/icon/cart.png" alt=""> <span>0</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>

@yield('main')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{url('assets')}}/fe/img/footer-logo.png" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which includes design.</p>
                    <a href="#"><img src="{{url('assets')}}/fe/img/payment.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Clothing Store</a></li>
                        <li><a href="#">Trending Shoes</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Sale</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Delivary</a></li>
                        <li><a href="#">Return & Exchanges</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>NewLetter</h6>
                    <div class="footer__newslatter">
                        <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">

                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>2020
                        All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</footer>


<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{url('assets')}}/fe/js/jquery-3.3.1.min.js"></script>
<script src="{{url('assets')}}/fe/js/bootstrap.min.js%2bjquery.nice-select.min.js.pagespeed.jc.ekxuW4by58.js"></script><script>eval(mod_pagespeed_JZzsHwPKPa);</script>
<script src="{{url('assets')}}/fe/js/jquery.nicescroll.min.js%2bjquery.magnific-popup.min.js%2bjquery.countdown.min.js.pagespeed.jc.nQBr1vqAX8.js"></script><script>eval(mod_pagespeed_ICtRagVbiv);</script>

<script src="{{url('assets')}}/fe/js/jquery.slicknav.js"></script>
<script src="{{url('assets')}}/fe/js/mixitup.min.js"></script>
<script src="{{url('assets')}}/fe/js/owl.carousel.min.js"></script>
<script src="{{url('assets')}}/fe/js/main.js"></script>
@yield('script')
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    function alertMes(res){
        return  Swal.fire({
            position: 'center-center',
            icon: 'success',
            title: res.messenger,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/malefashion/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Sep 2021 08:17:33 GMT -->
</html>
