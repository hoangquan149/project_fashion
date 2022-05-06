@extends('backend.master')
@section('main')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <form action="{{route('product.update',$product->id)}}"  method="post" class="form-data" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="white_box_tittle list_header">
                            <h4>Sửa sản phẩm</h4>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control " value="{{$product->name}}" id="" placeholder="Tên sản phẩm...">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="price" class="form-control "  value="{{$product->price}}" id="" placeholder="Giá...">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giảm giá</label>
                                    <input type="text" name="sale_price" class="form-control "  value="{{$product->sale_price}}" id="" placeholder="Giảm giá...">
                                    @error('sale_price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                    <div class="custom-file mb-3 form-group">
                                        <input type="file" class="custom-file-input" id="" value="{{$product->image}}"  name="file">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ url('uploads/product') }}/{{ $product->image }}" alt="" srcset=""
                                             class="img-thumbnail w-25">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh liên quan</label>
                                    <div class="custom-file mb-3 form-group">
                                        <input type="file" class="custom-file-input" multiple id="" name="files[]">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('files')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        @foreach($product->getImageProduct as $value)
                                            <img height="" src="{{ url('uploads/imageProduct')}}/{{$value->image}}" alt="" srcset=""
                                                 class="img-thumbnail w-25">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class=" form-group">
                                    <label for="select" class=" form-control-label">Danh mục sản phẩm</label>
                                    <div class="input-group">
                                        <select name="category_id" id="select" class="form-control">
                                            <option>Chọn danh mục sản phẩm</option>
                                            @foreach($category as $key => $value)
                                                <option value="{{$value->id}}" {{($value->id == $product->category_id)?'selected':''}}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=" form-group">
                                    <label for="select" class=" form-control-label">Nhãn hiệu sản phẩm</label>
                                    <div class="input-group">
                                        <select name="brand_id" id="select" class="form-control">
                                            <option>Chọn nhãn hiệu sản phẩm</option>
                                            @foreach($brand as $key => $value)
                                                <option value="{{$value->id}}" {{$value->id}}" {{($value->id == $product->brand_id)?'selected':''}}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                                    <input type="checkbox" value="{{$value->id}}" {{(in_array($value->id,$color_product))?'checked':''}} id="" name="colors[]">
                                                    <i class="fas fa-tint"  style="color: {{$value->value}}"></i>
                                                </label>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=" form-group">
                                    <label for="select" class=" form-control-label">Size sản phẩm</label>
                                    <div class="input-group">
                                        @if ($size)
                                            @foreach($size as $value)
                                                <label style="margin: 0px 3px">
                                                    <input type="checkbox" value="{{$value->id}}" {{(in_array($value->id,$size_product))?'checked':''}} id="" name="sizes[]">
                                                    {{$value->name}}
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-control-label">Mô tả sản phẩm</label>
                            <textarea name="description" value="" id="description"
                                      rows="10" placeholder="Nội dung..."
                                      class="form-control">{{$product->description}}</textarea>
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
                                               class="form-check-input"  {{($product->status==1)?'checked':''}}>Hiện
                                    </label>
                                    <label for="status2" class="form-check-label">
                                        <input type="radio" id="status2" name="status" value="0"
                                               class="form-check-input" {{($product->status==0)?'checked':''}}>Ẩn
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
@stop
