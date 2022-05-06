@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <form method="post" class="form-data" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="white_box_tittle list_header">
                            <h4>Thêm mới danh mục blog</h4>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="name" class="form-control " value="{{old('name')}}" id="" placeholder="Tên danh mục ...">
                            <div class="text-danger text-left messages"></div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Trạng thái</label></div>
                            <div class="col col-md-8">
                                <div class="form-check-inline form-check">
                                    <label for="status" class="form-check-label mr-5">
                                        <input type="radio" id="" name="status" value="1"
                                               class="form-check-input" checked>Hiện
                                    </label>
                                    <label for="status2" class="form-check-label">
                                        <input type="radio" id="" name="status" value="0"
                                               class="form-check-input">Ẩn
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit"  class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (e) {
            $('.form-data').on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: '{{route('blog-category.store')}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        alertMes(data)
                        setTimeout(function () {
                            window.location = "{{route('blog-category.index')}}"
                            return false;
                        },1000)
                    },error: function (data) {
                    $('.messages').html(data.responseJSON.errors.name)
                },
                });
            }));
        });

    </script>
@stop
