@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex flex-col items-center">

            <div>
                <div class="text-2xl font-bold py-4">{{ __('Reset Password') }}</div>

                <div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email">{{ __('Email Address') }}</label>

                            <div>
                                <input id="email" type="email" class="@error('email') text-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="@error('password') text-red-500 @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <div class="p-4 bg-white border border-red-500 text-red-500 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
