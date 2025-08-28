@extends("layout.default")
@section("title", "Login")
@section("content")


<div class="container-fluid main-content">
    <div class="row w-100 justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    <div class="facebook-logo">facebook</div>
                    <p class="fs-4 text-muted">Facebook helps you connect and share with the people in your life.
                    </p>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-card">
                        <form action="{{ route('login.post') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="example@gmail.com" name="email"
                                    value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3 password-container">
                                <input type="password" class="form-control" id="passwordField" placeholder="Password"
                                    name="password">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="far fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>

                            <button type="submit" class="btn btn-login">Log in</button>



                            <div class="text-center">
                                <button type="button" class="btn btn-create"><a href="{{ url('register') }}"
                                        class="text-decoration-none text-light">Create a
                                        new account</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection