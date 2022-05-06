@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div>
                <h4>Chi tiết đơn hàng</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="QA_table ">
                        <div class="row">
                            <div class="col-4">
                                From
                                <address>
                                    <strong>Admin, Inc.</strong><br>
                                </address>
                            </div>
                            <div class="col-4">
                                Tên người mua :
                                <strong>{{$order->getUser->name}}</strong><br>
                                Địa chỉ :
                                <strong>{{$order->address}}</strong><br>
                                Số điện thoại :
                                <strong>{{$order->getUser->phone}}</strong><br>
                                Email :
                                <strong>{{$order->getUser->email}}</strong><br>
                            </div>
                            <div class="col-4">
                                <div class="row ">
                                    <div class="col-12">
                                        <h5>Trạng thái đơn hàng</h5>
                                        <form action="" class="form-inline " role="form">
                                            <div class="form-group">
                                                <select name="status" id="input" class="form-control status" required="required">
                                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Chờ lấy hàng</option>
                                                    <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đang giao hàng</option>
                                                    <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Đã giao hàng</option>
                                                    <option value="5" {{ $order->status == 5 ? 'selected' : '' }}>Đã hủy</option>
                                                </select>
                                            </div>
                                            <button data-id="{{$order->id}}" type="submit" class="btn btn-success ml-2 btn-update">Sửa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table lms_table_active" >
                            <thead>
                            <tr>
                                <th>Số lượng</th>
                                <th>Sản phẩm</th>
                                <th>Gía</th>
                                <th>Ảnh</th>
                                <th>Size</th>
                                <th>Màu</th>
                                <th>Tổng tiền sản phẩm</th>
                            </tr>
                            </thead>
                            <tbody class="body-table-product" id="myTable">
                                @foreach($orderDetail as $value)
                                  <tr>
                                      <td>{{$value->quantity}}</td>
                                      <td>{{$value->product->name}}</td>
                                      <td>{{number_format($value->product->sale_price > 0 ? $value->product->sale_price :$value->product->price)}}Đ</td>
                                      <td><img width="100px" src="{{url('uploads/product')}}/{{$value->product->image}}" alt=""></td>
                                      <td>{{$value->Size->name}}</td>
                                      <td>{{$value->Color->name}}</td>
                                      <td>{{number_format($value->quantity * $value->price)}}Đ</td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.form-data').on('click',function (e) {
                e.preventDefault()
                let url = '{{route('color.update',':id')}}'
                url = url.replace(':id',id)
                let formData = $(this).serialize()
                $.post(url,formData,function (res) {
                    alertMes(res)
                    window.location = '{{route('color.index')}}';
                })
            })
            $('.btn-update').on('click',function (e) {
                e.preventDefault()
                let id = $(this).data('id')
                let url = '{{route('order.update',':id')}}';
                url = url.replace(':id',id)
                let formData = {
                    'status':$(".status option:selected").val()
                }
                $.get(url,formData,function (res) {
                    alertMes(res)
                })
            })
        });
    </script>
@stop
