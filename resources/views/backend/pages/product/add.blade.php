@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <form action="{{route('product.store')}}"  method="post" class="form-data" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                <div class="col-5">
                    <div class="white_box_tittle list_header">
                        <h4>Thêm sản phẩm</h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control nameBrand" value="{{old('name')}}" id="" placeholder="Tên sản phẩm...">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" name="price" class="form-control nameBrand" value="{{old('price')}}" id="" placeholder="Giá...">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm giá</label>
                                <input type="text" name="sale_price" class="form-control nameBrand" value="{{old('sale_price')}}" id="" placeholder="Giảm giá...">
                                @error('sale_price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file mb-3 form-group">
                            <input type="file" class="custom-file-input image-upload-wrap" onchange="readURL(this)" value="{{old('file')}}" name="file">
                            <label class="custom-file-label" for="customFile">Choose ảnh</label>
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
                      <div class="custom-file mb-3 form-group" align="left">
                          <input type="file" class="custom-file-input " id="files" name="files[]" multiple />
                          <label class="custom-file-label" for="customFile">Choose ảnh liên quan</label>
                      </div>

                   <div class="row">
                       <div class="col-6">
                           <div class=" form-group">
                               <label for="select" class=" form-control-label">Danh mục sản phẩm</label>
                               <div class="input-group">
                                   <select name="category_id" id="select" class="form-control">
                                       <option >Chọn danh mục sản phẩm</option>
                                       @foreach($category as $key => $value)
                                           <option value="{{$value->id}}">{{$value->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               @error('category_id')
                               <div class="text-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                       <div class="col-6">
                           <div class=" form-group">
                               <label for="select" class=" form-control-label">Nhãn hiệu sản phẩm</label>
                               <div class="input-group">
                                   <select name="brand_id" id="select" class="form-control">
                                       <option>Chọn nhãn hiệu sản phẩm</option>
                                       @foreach($brand as $key => $value)
                                           <option value="{{$value->id}}">{{$value->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               @error('brand_id')
                               <div class="text-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-6">
                            <div class=" form-group">
                                <label for="select" class=" form-control-label">Màu sản phẩm</label>
                                <div class="input-group">
                                    @if ($color)
                                        @foreach($color as $value)
                                            <label style="margin: 0px 3px">
                                                <input type="checkbox" value="{{$value->id}}" id="" name="colors[]">
                                                <i class="fas fa-tint"  style="color: {{$value->value}}"></i>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @error('colors')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class=" form-group">
                                <label for="select" class=" form-control-label">Size sản phẩm</label>
                                <div class="input-group">
                                    @if ($size)
                                        @foreach($size as $value)
                                            <label style="margin: 0px 3px">
                                                <input type="checkbox" value="{{$value->id}}" id="" name="sizes[]">
                                                {{$value->name}}
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @error('sizes')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-control-label">Mô tả sản phẩm</label>
                        <textarea name="description" id="description"
                                  rows="10" placeholder="Nội dung..."
                                  class="form-control">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label">Trạng thái</label></div>
                        <div class="col col-md-8">
                            <div class="form-check-inline form-check">
                                <label for="status" class="form-check-label mr-5">
                                    <input type="radio" id="status1" name="status" value="1"
                                           class="form-check-input" checked>Hiện
                                </label>
                                <label for="status2" class="form-check-label">
                                    <input type="radio" id="status2" name="status" value="0"
                                           class="form-check-input">Ẩn
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label">Sản phẩm nổi bật</label>
                        </div>
                        <div class="col col-md-8">
                            <div class="form-check-inline form-check">
                                <label for="status3" class="form-check-label mr-5">
                                    <input type="radio" id="status3" name="isHot" value="1"
                                           class="form-check-input">Nổi bật
                                </label>
                                <label for="status4" class="form-check-label">
                                    <input type="radio" id="status4" name="isHot" value="0"
                                           class="form-check-input" checked>Bình thường
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();
                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();
                    $('.image-title').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function() {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function() {
            $('.image-upload-wrap').removeClass('image-dropping');
        });

        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\"><i class=\"fas fa-trash-alt\"></i></span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            }
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
        input[type="file"] {
            display: block;
        }

        .pip{
            margin-top: 10px;
            display: inline-flex;
        }

        .pip span i{
            /*position: absolute;*/
            /*left: -3px;*/
            /*cursor: pointer;*/
            /*top: 43px;*/
            /*color: red;*/
            /*padding: 3px;*/
            /*font-size: 17px;*/
        }

        .pip img{
            position: relative;
            border: 1px solid black;
            width: 120px;
        }
    </style>
@stop
