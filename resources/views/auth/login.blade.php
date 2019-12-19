@extends('layouts.auth')

@section('title','Login')

@section('auth')
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("//picsum.photos/2000")'>
            <div class="pos-a centerXY">
                <div class="bdrs-50p pos-r" style='width: 900px; height: 500px;'>
                    <h1 class="pos-a centerXY row fw-300 c-grey-900 mB-20 mb-0 align-items-center text-center">
                        <img src="{{asset('images/logo.png')}}"><span class="text-white" style=" text-shadow: 2px 2px 8px #000;">Rokap Inc | <span
                                    class="small">Accounting</span></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
            <h4 class="row fw-300 c-grey-900 mB-20 mb-0 align-items-center">
                <img src="{{asset('images/logo.png')}}"><span>Rokap Inc</span>
            </h4>
            <hr>
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="text-normal text-dark">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="text-normal text-dark">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input class="peer" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class=" peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Remember Me</span>
                                </label>
                            </div>
                        </div>
                        <div class="peer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection