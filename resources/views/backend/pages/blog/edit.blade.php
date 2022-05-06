@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <form action="{{route('blog.update',$data->id)}}"  data-id="{{$data->id}}" method="post" class="form-data" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="white_box_tittle list_header">
                            <h4>Sửa banner</h4>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="title" class="form-control " value="{{$data->title}}" id="" placeholder="Tiêu đề ...">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <input type="text" name="content" class="form-control " value="{{$data->content}}" id="" placeholder="Nội dung ...">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file mb-3 form-group">
                                <input type="file" class="custom-file-input image-upload-wrap" onchange="readURL(this)" name="file">
                                <label class="custom-file-label" for="customFile">Choose ảnh</label>
                                @error('file')
                                <small class="form-text" style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="image-edit" style="display: flex;justify-content: center;">
                                <img width="350px" src="{{url('uploads/blog')}}/{{$data->image}}" alt="">
                            </div>
                            <div class="file-upload-content" style="display: none">
                                <img class="file-upload-image" src="#" alt="" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()"
                                            class="remove- btn btn-danger btn-sm">Remove
                                    </button>
                                </div>
                            </div>
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
        function readURL(input) {
            if (input.files) {
                console.log(input.files[0])
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();
                    $('.image-edit').hide();
                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload();
            }

        }

        function removeUpload() {
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
            $('.image-edit').show();
        }


            {{--$(document).ready(function (e) {--}}
            {{--    $('.form-data').on('submit',(function(e) {--}}
            {{--        e.preventDefault()--}}
            {{--        let id = $(this).data('id')--}}
            {{--        let url = '{{route('blog.update',':id')}}'--}}
            {{--        url = url.replace(':id',id)--}}
            {{--        let formData = $(this).serialize()--}}
            {{--        $.ajax({--}}
            {{--            type:'POST',--}}
            {{--            url: url,--}}
            {{--            data:formData,--}}
            {{--            cache:false,--}}
            {{--            processData: false,--}}
            {{--            success:function(data){--}}
            {{--                alertMes(data)--}}
            {{--                setTimeout(function () {--}}
            {{--                    window.location = "{{route('blog.index')}}"--}}
            {{--                    return false;--}}
            {{--                },1600)--}}
            {{--            },--}}
            {{--        });--}}
            {{--    }));--}}
            {{--});--}}
    </script>
@endsection
@section('css')
    <style>
        .file-upload-content{
            display: flex;
            justify-content: center;
        }

        .file-upload-content .file-upload-image{
            width: 350px;
        }
    </style>
@stop
