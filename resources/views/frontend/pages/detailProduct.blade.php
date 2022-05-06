@extends('frontend.master')
@section('main')
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="index-2.html">Home</a>
                        <a href="shop.html">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <div class="row">
                      <div class="col-lg-3 col-md-3">
                          <ul class="nav nav-tabs" role="tablist">
                              @foreach($products->imageProduct as $value)
                                  <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                          <div class="product__thumb__pic set-bg" data-setbg="{{url('uploads/imageProduct')}}/{{$value->image}}">
                                          </div>
                                      </a>
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                      <div class="col-lg-9 col-md-9">
                          <div class="tab-content">
                              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                  <div class="product__details__pic__item">
                                      <img src="{{url('uploads/product')}}/{{$products->image}}" alt="">
                                  </div>
                              </div>
                              <div class="tab-pane" id="tabs-2" role="tabpanel">
                                  <div class="product__details__pic__item">
                                      <img src="{{url('assets')}}/fe/img/shop-details/product-big-3.png" alt="">
                                  </div>
                              </div>
                              <div class="tab-pane" id="tabs-3" role="tabpanel">
                                  <div class="product__details__pic__item">
                                      <img src="{{url('assets')}}/fe/img/shop-details/product-big.png" alt="">
                                  </div>
                              </div>
                              <div class="tab-pane" id="tabs-4" role="tabpanel">
                                  <div class="product__details__pic__item">
                                      <img src="{{url('uploads/product')}}/{{$products->image}}" alt="">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">
                        <div class="" style="text-align: left">
                            <div class="row ">
                                <div class="col-lg-8">
                                    <div class="product__details__text">
                                        <h4>{{$products->name}}</h4>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        @if ($products->sale_price>0)
                                            <h3>{{number_format($products->sale_price)}}Đ<span>{{number_format($products->price)}}</span></h3>
                                        @else
                                            <h3>{{number_format($products->price)}}Đ</h3>
                                        @endif
                                        <p>{{$products->description}}</p>
                                        <div class="product__details__option">
                                            <div class="product__details__option__size" style="width: 100%">
                                                <span>Size:</span>
                                                @foreach($products->sizeProduct as $value)
                                                    <label id="{{$value->id}}" class="form-check-label input-name-size" >
                                                        {{$value->name}}
                                                    </label>
                                                @endforeach
                                            </div>
                                            <div style="width: 100%" class="product__details__option__color">
                                                <span style="top: 0">Color:</span>
                                                @foreach($products->colorProduct as $value)
                                                    <label class="input-name-color" id="{{$value->id}}"  style="background: {{$value->value}}" for="sp-1">
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <form class="cart-post">
                                            @csrf
                                            <div class="product__details__cart__option">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" min="1" name="quantity" id="quantity" class="" value="1">
                                                    </div>
                                                </div>
                                              @if(\Illuminate\Support\Facades\Auth::guard('customer')->user())
                                                    <button
                                                        class="primary-btn button-add-cart"
                                                        data-product-id="{{$products->id}}"
                                                        data-color-id = ""
                                                        data-size-id = ""
                                                        data-user-id="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->id}}"
                                                    >Add to cart</button>
                                                @else
                                                    <a href="{{route('frontend.post.cart')}}?login=add-cart&sanpham={{$products->name}}&id={{$products->id}}" style="color: white" class="primary-btn ">Add to cart</a>
                                              @endif
                                            </div>
                                        </form>
                                        <div class="product__details__last__option">
                                            <ul>
                                                <li><span>Categories:</span>{{$products->category->name}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="product__details__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                        solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                        ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div>
    <div class="container">
        <form action="" id="form-comment">
            @csrf
            <div class="form-group">
                <label for=""></label>
                <input type="text" name="comment" id="" class="form-control" placeholder="" >
               
            </div>
            <button 
            class="btn btn-primary"
            data-user-id="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->id}}"
            data-product-id="{{$products->id}}"
            >submit</button>
        </form>
        <div class="text-center">
            <h5>Danh sach binh luan</h5>
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
 
</div>
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach($relateProduct as $value)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
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
    </div>
</section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.button-add-cart').click(function (e) {
                e.preventDefault()
                let user_id = $(this).data('user-id')
                let product_id = $(this).data('product-id')
                let quantity = $('#quantity').val()
                let color_id = $(this).data('size-id')
                let size_id = $(this).data('color-id')
                $.ajax({
                    type: "GET",
                    url: "{{route('frontend.post.cart')}}",
                    data: {
                        'user_id':user_id,
                        'product_id':product_id,
                        'color_id':color_id,
                        'size_id':size_id,
                        'quantity':quantity
                    },
                    success: function (data) {
                        alertMes(data)
                    },
                });

                $('#choose-color').on('change',function () {
                    alert($(this).val())
                })
            })

            $('.input-name-size').click(function () {
                $('.button-add-cart').attr('data-size-id',this.id)
                // $('#size_id').val(this.id)
            })

            $('.input-name-color').click(function () {
                // $('#color_id').val(this.id)
                $('.button-add-cart').attr('data-color-id',this.id)
            })

            $('#form-comment').on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                console.log(formData);
                $.ajax({
                    type:'POST',
                    url: '{{route('comment.store')}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        console.log(data);
                    },
                });
            }));
        });
    
    </script>
@stop
