@extends('backend.master')
@section('main')
    <div class="main_content_iner " >
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">

                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Danh sách đơn hàng</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="form-group mr-5">
                                    <select name="sort" id="sort" class="form-control"
                                            onchange="window.location = this.options[this.selectedIndex].value;">
                                        <option value="?sort_by=none">Sắp xếp theo</option>
                                        <option value="?status=0">Đơn hàng chưa xử lý</option>
                                        <option value="?status=1">Đơn hàng đã xác nhận</option>
                                        <option value="?status=2">Đơn hàng đang chờ lấy hàng</option>
                                        <option value="?status=3">Đơn hàng đang giao</option>
                                        <option value="?status=4">Đơn hàng đã giao</option>
                                        <option value="?status=5">Đơn hàng đã hủy</option>
                                        <option value="order">Bỏ sắp xếp</option>
                                    </select>
                                </div>
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" id="myInput" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">Add New</a>
                                </div>

                            </div>
                        </div>
                        <div class="QA_table ">
                            <table class="table lms_table_active">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Ngày tạo đơn</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Khách phải trả</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="body-table-color"  id="myTable">
                                @isset($order)
                                    @foreach($order as $key => $value)
                                        <tr class="product-item">
                                            <td id="">{{$value->id}}</td>
                                            <td id="">{{date_format($value->created_at,'d-m-y')}}</td>
                                            <td id="">{{$value->getUser->name}}</td>
                                            <td id="">{{$value->getUser->phone}}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    <span class="badge badge-danger">Chưa xử lý</span>
                                                @elseif ($value->status ==1)
                                                    <span class="badge badge-primary">Đã xác nhận</span>
                                                @elseif ($value->status ==2)
                                                    <span class="badge badge-warning">Chờ lấy hàng</span>
                                                @elseif ($value->status ==3)
                                                    <span class="badge badge-info">Đang giao hàng</span>
                                                @elseif ($value->status ==4)
                                                    <span class="badge badge-success">Đã giao hàng</span>
                                                @else
                                                    <span class="badge badge-dark">Đã huỷ</span>
                                                @endif
                                            </td>
                                            <td>{{number_format($value->total)}}Đ</td>
                                            <td>
                                                <a title="Xóa đơn hàng" href="{{route('order.destroy',$value->id)}}" style="cursor: pointer" class="button-delete" >
                                                    <i style="font-size: 20px" class="fas fa-trash-alt"></i>
                                                </a>
                                                <a title="Chi tiết đơn hàng" href="{{route('order.edit',$value->id)}}" style="cursor: pointer">
                                                    <i style="font-size: 20px" class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                            <div class="col-sm-12 col-xs-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-edit">

        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.button-delete').on('click',function (e) {
                if (confirm("Bạn có muốn xóa không")) {
                    e.preventDefault();
                    let parentTr = $(this).closest('.product-item');
                    let id =  $(this).data('id');
                    let url = '{{ route("order.destroy", ":id") }}';
                    url = url.replace(':id', id )
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            if (response) {
                                alertMes(response)
                            }
                            $(parentTr).remove();
                        },
                    });
                }
            });
        });
    </script>
@stop
