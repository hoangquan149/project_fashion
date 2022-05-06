@extends('backend.master')
@section('main')
    <div class="main_content_iner " >
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="white_box_tittle list_header">
                        <h4>Thêm màu</h4>
                    </div>
                    <form method="post" data-id="" class="form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên màu</label>
                            <input type="text" name="name" class="form-control color-name" id="" placeholder="Name...">
                            <div class="text-danger text-left messages"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã màu</label>
                            <input type="color" name=   "value" class="form-control value-color" id="" >
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input status-color" checked value="1" name="status">Hiện
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input status-color" value="0" name="status">Ẩn
                            </label>
                        </div>
                        <button  type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-edit">

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
                    url: '{{route('color.store')}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        alertMes(data)
                        setTimeout(function () {
                            window.location = "{{route('color.index')}}"
                            return false;
                        },1000)
                    },error:function (data) {
                        console.log(data)
                        $('.messages').html(data.responseJSON.errors.name)
                    }
                });
            }));
        });
    </script>
@stop
