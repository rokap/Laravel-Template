@extends('layouts.auth')
@section('title','Registration')

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
            <h4 class="fw-300 c-grey-900 mB-40">Registration</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-normal text-dark">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                           autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="text-normal text-dark">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                           autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="text-normal text-dark">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="text-normal text-dark">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection