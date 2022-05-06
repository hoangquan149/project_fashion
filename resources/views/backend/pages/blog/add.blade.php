@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <form method="post"  class="form-data" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="white_box_tittle list_header">
                            <h4>Thêm mới blog</h4>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="title" class="form-control " value="{{old('name')}}" id="" placeholder="Tiêu đề ...">
                            <div class="text-danger text-left messages1"></div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Nội dung</label>
                            <textarea name="content" id="content"
                                      rows="10" placeholder="Nội dung..."
                                      class="form-control">{{old('content')}}</textarea>
                            <div class="text-danger text-left messages2"></div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="form-group">
                            <div class="custom-file mb-3 form-group">
                                <input type="file" class="custom-file-input image-upload-wrap" onchange="readURL(this)" value="{{old('file')}}" name="file">
                                <label class="custom-file-label" for="customFile">Choose ảnh</label>
                                <div class="text-danger text-left messages3"></div>
                                @error('file')
                                <small class="form-text" style="color: red">{{$message}}</small>
                                @enderror
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
                        <div class=" form-group">
                            <label for="select" class=" form-control-label">Danh mục blog</label>
                            <div class="input-group">
                                <select name="category_blog_id" id="select" class="form-control">
                                    <option >Chọn danh mục blog</option>
                                    @foreach($categoryBlog as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_blog_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-danger messages4"></div>

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
        }

        $(document).ready(function (e) {
            $('.form-data').on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: '{{route('blog.store')}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        alertMes(data)
                        setTimeout(function () {
                            window.location = "{{route('blog.index')}}"
                            return false;
                        },1600)
                    },error: function (data) {
                        console.log(data)
                        $('.messages1').html(data.responseJSON.errors.title)
                        $('.messages3').html(data.responseJSON.errors.image)
                        $('.messages2').html(data.responseJSON.errors.content)
                        $('.messages4').html(data.responseJSON.errors.category_blog_id)
                    }
                });
            }));
        });

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
