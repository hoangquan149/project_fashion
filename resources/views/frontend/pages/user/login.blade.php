@extends('frontend.master')
@section('main')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng nhập</h2>
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
                                    <h3 class="mb-4">Đăng nhập</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="{{route('frontend.post.login')}}" method="post" class="signin-form">
                                @csrf
                                @isset($cart)
                                    <input type="hidden" name="cart" value="{{$cart}}">
                                @endisset
                                @isset($add)
                                    <input type="hidden" name="add" value="{{$add}}">
                                @endisset
                                @isset($proName)
                                    <input type="hidden" name="proName" value="{{$proName}}">
                                @endisset
                                @isset($id)
                                    <input type="hidden" name="id" value="{{$id}}">
                                @endisset
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control form-email" placeholder="Email">
                                    <div class="text-danger text-left message-email"></div>
                                </div>
                                @error('email')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control form-password" placeholder="Password">
                                    <div class="text-danger text-left message-password"></div>
                                </div>
                                @error('password')
                                <div class="text-danger text-left">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3 form-submit">Đăng nhập</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var formPassword = document.querySelector('.form-password')
        var formEmail = document.querySelector('.form-email')
        var messagePassword = document.querySelector('.message-password')
        var messageEmail = document.querySelector('.message-email')

        var formData = document.querySelector('.form-submit')
        formData.addEventListener('click',validate)

        // function validate(){
        //     let checker = true;
        //     if (checkPassword() == false) {
        //         checker = false
        //     }
        //
        //     if(checkEmail() == false){
        //         checker = false
        //     }
        //     return checker;
        // }
        //
        //
        // console.log(checkEmail())
        // function checkPassword() {
        //     formPassword.addEventListener('keyup', function () {
        //         if (this.value.length < 6) {
        //             return false
        //         }
        //     })
        //     return false
        // }
        //
        // function checkEmail() {
        //     formEmail.addEventListener('keyup', function () {
        //         var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //         if (!emailReg.test(this.value)) {
        //             return false
        //         }
        //     })
        //     return false
        // }

        //     formPassword.addEventListener('keyup', function () {
        //         console.log(this.value.length)
        //         if (this.value.length >= 6) {
        //             formPassword.style.border = "1px solid green"
        //             messagePassword.innerHTML = "";
        //             return false
        //         }  else {
        //             formPassword.style.border = "1px solid red"
        //             messagePassword.innerHTML = "Mật khẩu phải lớn hơn hoặc bằng 6 kí tự";
        //             return true
        //         }
        //     })
        //
        //
        //
        //     formEmail.addEventListener('keyup', function () {
        //         var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //         if (!emailReg.test(this.value)) {
        //             messageEmail.innerHTML = "Email phải đúng định dạng";
        //             formEmail.style.border = "1px solid red"
        //             submit.addEventListener('click', function () {
        //                 return false
        //             })
        //         }else {
        //             messageEmail.innerHTML = "";
        //             formEmail.style.border = "1px solid green"
        //             return true
        //         }
        //     })






    </script>
@stop
