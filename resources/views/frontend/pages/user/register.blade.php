@extends('frontend.master')
@section('main')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng ký</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url({{url('assets/fe')}}/img/bg-1.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Đăng ký</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="{{route('frontend.post.register')}}" method="post" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Tên người dùng</label>
                                    <input type="text" name="name" class="form-control form-user__name" placeholder="Username" >
                                </div>
                                @error('name')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" name="email" class="form-control form-email" placeholder="Email" >
                                </div>
                                @error('email')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Số điện thoại</label>
                                    <input type="number" name="phone" class="form-control form-telephone" placeholder="Telephone" >
                                </div>
                                 @error('phone')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control form-password" placeholder="Password" >
                                </div>
                                 @error('password')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Xác nhận mật khẩu</label>
                                    <input type="password" name="confirmPassword" class="form-control form-confirm__password" placeholder="confirm password" >
                                </div>
                                 @error('confirmPassword')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Đăng Ký</button>
                                </div>
                                <div class="form-group d-md-flex">
{{--                                    <div class="w-50 text-left">--}}
{{--                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me--}}
{{--                                            <input type="checkbox" checked>--}}
{{--                                            <span class="checkmark"></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="w-50 text-md-right">--}}
{{--                                        <a href="#">Forgot Password</a>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Đăng Ký</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>

    </script>
@stop
