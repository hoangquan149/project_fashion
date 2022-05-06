@extends('backend.master')
@section('main')
    <div class="main_content_iner " >
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="white_box_tittle list_header">
                        <h4>Sửa size</h4>
                    </div>
                    <form method="post"  class="form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên size</label>
                            <input type="text" name="name" class="form-control color-name" value="{{$data->name}}" id="" placeholder="Name...">
                        </div>
                        <button onclick="updatesize({{$data->id}})"  type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function updatesize(id) {
            $('.form-data').on('click',function (e) {
                e.preventDefault()
                let url = '{{route('size.update',':id')}}'
                url = url.replace(':id',id)
                let formData = $(this).serialize()
                $.post(url,formData,function (res) {
                    alertMes(res)
                    window.location = '{{route('size.index')}}';
                })
            })
        }
    </script>
@stop
