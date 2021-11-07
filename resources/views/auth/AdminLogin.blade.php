@extends('Backend.layouts.app')

@section('content')
    {{-- <div class="container-login100"> --}}
		{{-- <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30"> --}}
            {{-- <span class="login100-form-title p-b-37">
                <a href="/">Home</a>
            </span> --}}

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="login100-form validate-form">

                @csrf
				<span class="login100-form-title p-b-37">
					Admin Login
				</span>
                <input type="hidden" value="admin" name="role" id="">

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback focus-input100" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>

				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="password" required autocomplete="current-password">

                    @error('password')
                        <span class="focus-input100 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
				</div>

                {{-- Remember me --}}
                <div class="container-login100-form-btn my-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

				<div class="container-login100-form-btn">

					<button class="login100-form-btn">
						{{ __('Login') }}
					</button>
				</div>

			</form>


		{{-- </div> --}}
	{{-- </div> --}}
@endsection
