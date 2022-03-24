@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex flex-col items-center">
        <div>
            <div class="text-2xl font-bold py-4">{{ __('Reset Password') }}</div>

            <div>
                @if (session('status'))
                    <div class="p-4 bg-white border border-green-500 text-green-500 my-2" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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

                    <div class="mb-0">
                        <div>
                            <button type="submit">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
