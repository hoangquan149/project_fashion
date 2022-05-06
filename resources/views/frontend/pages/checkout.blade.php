@extends('frontend.master')
@section('main')

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="index-2.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper container">
        <form  method="post" role="form">
            @csrf
            @if (\Illuminate\Support\Facades\Auth::guard('customer')->user())
                <div class="row">
                    <div class="" style="width: 60%">
                        <div class="mobile h5">Billing Address</div>
                        <div id="details" class="bg-white rounded pb-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="h6">Thông tin nhận hàng</div>
                            </div>
                            <input type="hidden" name="total" class="total" value="{{$total}}">
                            <div class="form-group"><label class="text-muted">Họ và tên</label>
                                <input type="text" name="name" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}}" placeholder="VD Nguyễn Hoàng Quân" class="form-control">
                            </div>
                            <div class="form-group"><label class="text-muted">Email</label>
                                <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                    <input type="email" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->email}}" name="email" placeholder="VD abc@gmail.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group"><label>Số điện thoại</label>
                                        <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                            <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->phone}}" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><label>Địa chỉ</label>
                                        <div class="d-flex jusify-content-start align-items-center rounded p-2">
                                        <input type="text" class="address" name="address" placeholder="Địa chỉ" value=""></div>
                                    </div>
                                </div>
                            </div>
                            <label>Ghi chú</label>
                            <div>
                                <div class="form-group">
                                    <textarea class="form-control note"  name="note" placeholder="Ghi chú" id="" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="width: 40%">
                        <div id="cart" class="bg-white rounded">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="h6">Đơn hàng</div>
                            </div>
                            @foreach($cart as $val)
                                <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom mb-3">
                                    <div class="item pr-2">
                                        <img src="{{url('uploads/product')}}/{{$val->getProduct->image}}" alt="" width="80" height="80">
                                        <div class="number">{{$val->quantity}}</div>
                                    </div>
                                    <div class="d-flex flex-column px-3"><b class="h5">{{$val->getProduct->name}}</b></div>
                                    <div class="ml-auto"><b class="h5">{{$val->getProduct->sale_price > 0 ? number_format($val->getProduct->sale_price) : number_format($val->getProduct->price) }}Đ</b></div>
                                </div>
                            @endforeach
                            <div class="d-flex align-items-center py-2">
                                <div class="display-5">Tổng tiền</div>
                                <div class="ml-auto d-flex">
                                    <div class="font-weight-bold">{{number_format($total)}}Đ</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row" style="display: flex;justify-content: space-between;align-items: center;">
                                    <div class="" style="padding-left:17px">
                                <span>
                                    <a href="{{route('frontend.list.cart')}}" style="padding: 0px">< Quay về giỏ hàng</a>
                                </span>
                                    </div>
                                    <div class="" style="padding-right: 17px">
                                        <button style="margin-top: 12px" class="form-group btn btn-primary btn-checkout">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Bạn chưa đăng nhập
                    <strong><a style="color: red" href="{{route('frontend.login')}}?page=checkout">Click vào đây để login</a></strong>
                </div>
            @endif
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.btn-checkout').click(function (e) {
                e.preventDefault()
                let address = $('.address').val()
                let total = $('.total').val()
                let note = $('.note').val()
                $.ajax({
                    type: "POST",
                    url: '{{route('frontend.post.checkout')}}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'address':address,
                        'note':note,
                        'total':total
                    },
                    success: function (data) {
                        alertMes(data)
                        setTimeout(function () {
                            window.location = "{{route('frontend.home')}}"
                        },1500)
                    },
                });
            })
        });
    </script>
@stop
