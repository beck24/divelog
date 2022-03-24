@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex flex-col items-center">
        <div>
            <div class="text-2xl font-bold py-4">{{ __('Login') }}</div>

            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email">{{ __('Email Address') }}</label>

                        <div>
                            <input id="email" type="email" class="@error('email') text-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="p-4 bg-white border border-red-500 text-red-500 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password" class="form-control @error('password') text-red-500 @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="p-4 bg-white border border-red-500 text-red-500 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="flex flex-row items-center gap-4">
                            <button type="submit">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
