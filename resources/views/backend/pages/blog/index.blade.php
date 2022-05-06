@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="QA_table ">
                        <div class="white_box_tittle list_header">
                            <h4>Danh sách blog</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="form-group mr-5">
                                    <select name="sort" id="sort" class="form-control"
                                            onchange="window.location = this.options[this.selectedIndex].value;">
                                        <option value="?sort_by=none">Sắp xếp theo</option>
                                        <option value="?sort_by=title_asc">Tên (A - Z)</option>
                                        <option value="?sort_by=title_desc">Tên (Z - A)</option>
                                        <option value="?sort_by=title_desc">Bỏ sắp xếp</option>
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
                                    <a href="{{route('blog.create')}}" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <table class="table lms_table_active" >
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tiêu đề</th>
{{--                                <th scope="col">Nội dung</th>--}}
                                <th scope="col">Ảnh</th>
                                <th scope="col">Status</th>
                                <th scope="col">Danh mục</th>
                            </tr>
                            </thead>
                            <tbody class="body-table" id="myTable">
                            @isset($data)
                                @foreach($data as $value)
                                    <tr class="product-item">
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->title}}</td>
{{--                                        <td>{{$value->content}}</td>--}}
                                        <td><img width="200px" src="{{url('uploads/blog')}}/{{$value->image}}" alt=""></td>
                                        <td>{{($value->status==1)?'Hiện':''}}</td>
                                        <td>{{$value->categoryBlog->name}}</td>
                                        <td>
                                            <a href="{{route('blog.edit',$value->id)}}" style="cursor: pointer;color: #8a8d92"  ><i style="font-size: 20px" class="fas fa-edit"></i></a>
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
                        let url = '{{ route("blog.destroy", ":id") }}';
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
