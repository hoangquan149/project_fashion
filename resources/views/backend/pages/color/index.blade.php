@extends('backend.master')
@section('main')
    <div class="main_content_iner " >
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Danh sách màu</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="form-group mr-5">
                                    <select name="sort" id="sort" class="form-control"
                                            onchange="window.location = this.options[this.selectedIndex].value;">
                                        <option value="">Sắp xếp theo</option>
                                        <option value="?sort_by=created_at_desc">Màu mới nhất</option>
                                        <option value="?sort_by=created_at_asc">Màu cũ nhất</option>
                                        <option value="color">Bỏ sắp xếp</option>
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
                                    <a href="{{route('color.create')}}"class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table ">
                            <table class="table lms_table_active">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="body-table-color"  id="myTable">
                                    @isset($data)
                                        @foreach($data as $key => $value)
                                            <tr class="product-item">
                                                <td id="">{{$loop->index+1}}</td>
                                                <td id="name">{{$value->name}}</td>
                                                <td id="color"><div style="background: {{$value->value}};height: 50px;width: 50px"></div></td>
                                                <td id="status">{{($value->status==1)?"Hiện":"Ẩn"}}</td>
                                                <td>
                                                    <a href="{{route('color.edit',$value->id)}}" style="cursor: pointer;color: #8a8d92" class=" btn-edit" ><i style="font-size: 20px" class="fas fa-edit"></i></a>
                                                    <a data-id="{{$value->id}}"  style="cursor: pointer" class=" button-delete"><i style="font-size: 20px" class="fas fa-trash-alt"></i></a>
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
                    let url = '{{ route("color.destroy", ":id") }}';
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
