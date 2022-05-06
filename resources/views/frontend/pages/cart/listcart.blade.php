@extends('frontend.master')
@section('main')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="index-2.html">Home</a>
                            <a href="shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping-cart1 ">

    </section>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-cart" method="">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody id="">
                                @isset($cart)
                                    @foreach($cart as $key => $value)
                                        <input type="hidden" id="id" class="id" name="id[]" value="{{$value->id}}">
                                        <input type="hidden" id="key" class="key" name="key[]" value="{{$key}}">
                                        <tr id="item-cart">
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{url('uploads/product')}}/{{$value->getProduct->image}}" width="150" alt="">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{$value->getProduct->name}}</h6>
                                                    <h5></h5>
                                                </div>
                                            </td>
                                            <td>
                                                <select name="color_id[]" class="update-color" style="padding: 3px 5px;border-radius: 3px">
                                                    @foreach($value->getProduct->colorProduct as $val)
                                                        <option {{($val->id == $value['color_id'])?'selected':''}} value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="size_id[]" class="update-size" style="padding: 3px 5px;border-radius: 3px">
                                                    @foreach($value->getProduct->sizeProduct as $val)
                                                        <option {{($val->id == $value['size_id'])?'selected':''}} value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        <input type="number" id="quantity" name="quantity[]" min="1" value="{{$value->quantity}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">
                                                {{$value->getProduct->sale_price > 0 ? number_format($value->getProduct->sale_price * $value->quantity) : number_format( $value->getProduct->price*$value->quantity)}}Đ
                                            </td>
                                            <td data-id="{{$value->id}}" style="cursor: pointer" class="cart__close"><i id="" class="fa fa-close"></i></td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="{{route('frontend.home')}}">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn update__btn">
                                    <button style="padding: 14px 35px;background: black;color: white" class="btn-update"><i class="fa fa-spinner"></i>Update cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($cartCount != 0)
                    <div class="col-lg-4 mt-5 check__checkout">
                        <div class="cart__total">
                            <h6>Cart total</h6>
                            <ul>
                                @isset($result)
                                    <li>Total<span>{{number_format($result)}}Đ</span></li>
                                @endisset
                            </ul>
                            <a href="{{route('frontend.checkout')}}" class="primary-btn">Checkout</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function html() {
            return `<div style="display: flex;justify-content: center;align-items: center;padding:100px 0px">
                    <div>
                    <div class="text-center">
                        <img src="{{url('uploads')}}/shoppong.png" width="100px" alt="">
                    </div>
                    <h4>Giỏ hàng trống</h4>
                    <div style="text-align: center;background: #b0aeac;padding: 5px 5px;">
                        <a style="color: white" href="{{route('frontend.home')}}">Mua ngay</a>
                    </div>
                </div>
            </div>`;
        }

        function getCart(cart) {
            if (cart === 0) {
                $('.shopping-cart1').html(html())
                $('.check__checkout').css("display", "none")
                $('.shopping-cart').css("display", "none")
            } else {
                $('.check__checkout').css("display", "block")
            }
        }

        getCart({{$cartCount}})
        $(document).ready(function () {
            $('.cart__close').on('click', function (e) {
                e.preventDefault()

                let id = $(this).data('id');
                let url = '{{route('frontend.delete.cart','id')}}';
                url = url.replace('id', id)
                let parentTr = $(this).closest('#item-cart');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        console.log(data)
                        $(parentTr).remove()
                        if (data.countCart == 0) {
                            $('.shopping-cart1').html(html())
                            $('.check__checkout').css("display", "none")
                            $('.shopping-cart').css("display", "none")
                        } else {
                            $('.check__checkout').css("display", "block")
                        }
                        alertMes(data)
                    },
                });
            })
            $('.btn-update').on('click', function (e) {
                e.preventDefault()
                let data = $('.form-cart').serializeArray();
                let url = "{{route('frontend.update.cart')}}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: data,
                    success: function (data) {
                        alertMes(data)
                    },

                });
            })
        });
    </script>
@stop
