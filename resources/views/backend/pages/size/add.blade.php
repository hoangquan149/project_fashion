@extends('backend.master')
@section('main')
    <div class="main_content_iner " >
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="white_box_tittle list_header">
                        <h4>Thêm mới size</h4>
                    </div>
                    <form method="post" data-id="" class="form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên size</label>
                            <input type="text" name="name" class="form-control color-name" id="" placeholder="Name...">
                            <div class="text-danger text-left messages"></div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
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
                    url: '{{route('size.store')}}',
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        alertMes(data)
                        setTimeout(function () {
                            window.location = "{{route('size.index')}}"
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
