@extends('layout.default')
@section('title', 'Registration')

@section('content')
<div class="container-fluid main-content">
    <div class="row w-100 justify-content-center align-items-center">
        <div class="col-lg-3 text-center"></div>
        <div class="col-lg-6 text-center">
            <div class="facebook-logo">facebook</div>
            <div class="card border-none shadow p-5 mb-5">
                <div class="card-body">
                    <form action="{{ route('register.post') }}" method="POST" id="registerForm"
                        onsubmit="return myFunction()">
                        @csrf
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input type="text" name="fname" class="form-control" placeholder="First name"
                                    value="{{ old('fname') }}">
                                @error('fname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lname" class="form-control" placeholder="Last name"
                                    value="{{ old('lname') }}">
                                @error('lname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <input type="email" name="email" class="form-control" placeholder="Email address"
                                value="{{ old('email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mt-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mt-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password">
                        </div>

                        <div class="mt-3 text-start">
                            <label for="birthdate" class="form-label">Date of birth</label>
                            <input type="date" name="dob" class="form-control" id="birthdate" value="{{ old('dob') }}">
                            @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mt-3 text-start">
                            <label class="form-label d-block"> Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select gender...</option>
                                <option value="male" {{ old('gender')=='male'?'selected':'' }}>Male</option>
                                <option value="female" {{ old('gender')=='female'?'selected':'' }}>Female</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <button type="submit" class="btn btn-login mt-3">Sign up</button>
                        <a href="{{ url('login') }}" class="text-decoration-none text-info">Already have a account?
                            Sign in</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 text-center"></div>
    </div>
</div>

<script>
function myFunction() {
    alert("Registration Successfull!");
}
</script>





@endsection