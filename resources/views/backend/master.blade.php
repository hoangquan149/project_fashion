<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Finance</title>
    <link rel="stylesheet" href="{{url('assets')}}/be/css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/themefy_icon/themify-icons.css" />
    <!-- swiper slider CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/swiper_slider/css/swiper.min.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/select2/css/select2.min.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/niceselect/css/nice-select.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/owl_carousel/css/owl.carousel.css" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/gijgo/gijgo.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/tagsinput/tagsinput.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/datatable/css/buttons.dataTables.min.css" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/text_editor/summernote-bs4.css" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/morris/morris.css">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{url('assets')}}/be/vendors/material_icon/material-icons.css" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{url('assets')}}/be/css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('assets')}}/be/css/style.css" />
    <link rel="stylesheet" href="{{url('assets')}}/be/css/colors/default.css" id="colorSkinCSS">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <style>
        .odd{
            /*display: none;*/
        }
    </style>
</head>
<body class="crm_body_bg">

<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{url('assets')}}/fe/img/logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow"  href="#"  aria-expanded="false">
                <!-- <i class="fas fa-th"></i> -->
                <img src="{{url('assets')}}/be/img/menu-icon/1.svg" alt="">
                <span>Trang ch???</span>
            </a>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? danh m???c</span>
            </a>
            <ul>
                <li><a href="{{route('category.index')}}">Danh s??ch danh m???c</a></li>
                <li><a href="{{route('category.create')}}">Th??m danh m???c</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? nh??n hi???u</span>
            </a>
            <ul>
                <li><a href="{{route('brand.index')}}">Danh s??ch nh??n hi???u</a></li>
                <li><a href="{{route('brand.create')}}">Th??m nh??n hi???u</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? s???n ph???m</span>
            </a>
            <ul>
                <li><a href="{{route('product.index')}}">Danh s??ch s???n ph???m</a></li>
                <li><a href="{{route('product.create')}}">Th??m s???n ph???m</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? m??u</span>
            </a>
            <ul>
                <li><a href="{{route('color.index')}}">Danh s??ch s???n ph???m</a></li>
                <li><a href="{{route('color.create')}}">Th??m s???n ph???m</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? size</span>
            </a>
            <ul>
                <li><a href="{{route('size.index')}}">Danh s??ch size</a></li>
                <li><a href="{{route('size.create')}}">Th??m size</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? banner</span>
            </a>
            <ul>
                <li><a href="{{route('banner.create')}}">Th??m m???i banner</a></li>
                <li><a href="{{route('banner.index')}}">Danh s??ch banner</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? blog</span>
            </a>
            <ul>
                <li><a href="{{route('blog.create')}}">Th??m m???i blog</a></li>
                <li><a href="{{route('blog.index')}}">Danh s??ch blog</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? danh m???c blog</span>
            </a>
            <ul>
                <li><a href="{{route('blog-category.create')}}">Th??m m???i danh m???c </a></li>
                <li><a href="{{route('blog-category.index')}}">Danh s??ch danh m???c</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? ng?????i d??ng</span>
            </a>
            <ul>
                <li><a href="{{route('user.index')}}">Danh s??ch ng?????i d??ng</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('assets')}}/be/img/menu-icon/2.svg" alt="">
                <span>Qu???n l?? ????n h??ng</span>
            </a>
            <ul>
                <li><a href="{{route('order.index')}}">Danh s??ch ????n h??ng</a></li>
            </ul>
        </li>
    </ul>
</nav>


<section class="main_content dashboard_part">
    <!-- menu  -->
    <div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area">
                        <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search here..." >
                                </div>
                                <button type="submit"> <img src="{{url('assets')}}/be/img/icon/icon_search.svg" alt=""> </button>
                            </form>
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
{{--                        <div class="header_notification_warp d-flex align-items-center">--}}
{{--                            <li>--}}
{{--                                <a href="#"> <img src="{{url('assets')}}/be/img/icon/bell.svg" alt=""> </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#"> <img src="{{url('assets')}}/be/img/icon/msg.svg" alt=""> </a>--}}
{{--                            </li>--}}
{{--                        </div>--}}
                        <div class="profile_info">
                            <img src="{{url('assets')}}/be/img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <p>Welcome Admin!</p>
                                <h5>{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</h5>
                                <div class="profile_info_details">
                                    <a href="{{route('admin.logout')}}">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
@yield('main')
    <!-- footer part -->
    <div class="footer_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script defer src="/your-path-to-fontawesome/js/all.js"></script> <!--load all styles -->
<script src="https://unpkg.com/jquery"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
<!-- popper js -->
<script src="{{url('assets')}}/be/js/popper.min.js"></script>
<!-- bootstarp js -->
<script src="{{url('assets')}}/be/js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="{{url('assets')}}/be/js/metisMenu.js"></script>
<!-- waypoints js -->
<script src="{{url('assets')}}/be/vendors/count_up/jquery.waypoints.min.js"></script>
<!-- waypoints js -->
<script src="{{url('assets')}}/be/vendors/chartlist/Chart.min.js"></script>
<!-- counterup js -->
<script src="{{url('assets')}}/be/vendors/count_up/jquery.counterup.min.js"></script>
<!-- swiper slider js -->
<script src="{{url('assets')}}/be/vendors/swiper_slider/js/swiper.min.js"></script>
<!-- nice select -->
<script src="{{url('assets')}}/be/vendors/niceselect/js/jquery.nice-select.min.js"></script>
<!-- owl carousel -->
<script src="{{url('assets')}}/be/vendors/owl_carousel/js/owl.carousel.min.js"></script>
<!-- gijgo css -->
<script src="{{url('assets')}}/be/vendors/gijgo/gijgo.min.js"></script>
<!-- responsive table -->
<script src="{{url('assets')}}/be/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/jszip.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/pdfmake.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/vfs_fonts.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="{{url('assets')}}/be/vendors/datatable/js/buttons.print.min.js"></script>

<script src="{{url('assets')}}/be/js/chart.min.js"></script>
<!-- progressbar js -->
<script src="{{url('assets')}}/be/vendors/progressbar/jquery.barfiller.js"></script>
<!-- tag input -->
<script src="{{url('assets')}}/be/vendors/tagsinput/tagsinput.js"></script>
<!-- text editor js -->
<script src="{{url('assets')}}/be/vendors/text_editor/summernote-bs4.js"></script>

<script src="{{url('assets')}}/be/vendors/apex_chart/apexcharts.js"></script>

<!-- custom js -->
<script src="{{url('assets')}}/be/js/custom.js"></script>

<!-- active_chart js -->
<script src="{{url('assets')}}/be/js/active_chart.js"></script>
<script src="{{url('assets')}}/be/vendors/apex_chart/radial_active.js"></script>
<script src="{{url('assets')}}/be/vendors/apex_chart/stackbar.js"></script>
<script src="{{url('assets')}}/be/vendors/apex_chart/area_chart.js"></script>
<script src="{{url('assets')}}/be/vendors/apex_chart/bar_active_1.js"></script>
<script src="{{url('assets')}}/be/vendors/chartjs/chartjs_active.js"></script>
@yield('script')
@yield('css')
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
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

</html>
