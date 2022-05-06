@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>   {{Session::get('success')}}</strong>
                        </div>
                    @endif
                    <div class="QA_table ">
                        <div class="white_box_tittle list_header">
                            <h4>Danh sách sản phẩm</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="form-group mr-5">
                                    <select name="sort" id="sort" class="form-control"
                                            onchange="window.location = this.options[this.selectedIndex].value;">
                                        <option value="">Sắp xếp theo</option>
                                        <option value="?filter=created_at_desc">Sản phẩm mới nhất</option>
                                        <option value="?filter=created_at_desc">Sản phẩm cũ nhất</option>
                                        <option value="?sort_by=price_asc">Gía tăng dần</option>
                                        <option value="?sort_by=price_desc">Gía giảm dần</option>
                                        <option value="?status=1">Trạng thái hiện</option>
                                        <option value="?status=0">Trạng thái ẩn</option>
                                        <option value="product">Bỏ sắp xếp</option>
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
                                    <a href="{{route('product.create')}}" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <table class="table lms_table_active" >
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Sale_price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">IsHot</th>
                                <th>Category</th>
                            </tr>
                            </thead>
                            <tbody class="body-table-product" id="myTable">
                            @isset($data)
                                @foreach($data as $value)
                                    <tr class="product-item">
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{number_format($value->price)}}Đ</td>
                                        <td>{{number_format($value->sale_price>0)?number_format($value->sale_price).'Đ':'Không có giảm giá'}}</td>
                                        <td><img width="100px" src="{{url('uploads/product')}}/{{$value->image}}" alt=""></td>
                                        <td>{{($value->status==1)?'Hiện':'Ẩn'}}</td>
                                        <td>{{($value->isHot==0)?'Bình thường':'Nổi bật'}}</td>
                                        <td>{{$value->category->name}}</td>
                                        <td>
                                            <a href="{{route('product.edit',$value->id)}}" style="cursor: pointer;color: #8a8d92" class="" >
                                                <i style="font-size: 20px" class="fas fa-edit"></i></a>
                                            <a data-id="{{$value->id}}" style="cursor: pointer" class=" button-delete"><i style="font-size: 20px" class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
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
        {
            $(document).ready(function () {
                $('.button-delete').on('click',function (e) {
                    if (confirm("Bạn có muốn xóa không")) {
                        e.preventDefault();
                        let parentTr = $(this).closest('.product-item');
                        let id =  $(this).data('id');
                        let url = '{{ route("product.destroy", ":id") }}';
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

        }
    </script>

@stop
