@extends('backend.master')
@section('main')
    <div class="main_content_iner " >
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Danh sách danh mục</h4>
                            <div class="box_right d-flex lms_block">
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="body-table-category"  id="myTable">
                                @isset($data)
                                    @foreach($data as $value)
                                        <tr class="product-item">
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>
                                                <a data-id="{{$value->id}}" style="cursor: pointer" class="status_btn button-delete">Delete</a>
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
                    let url = '{{ route("category.destroy", ":id") }}';
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
