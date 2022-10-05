@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="margin: auto">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email_phone" class="col-md-4 col-form-label text-md-end">{{ __('Email/Phone') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('email_phone') is-invalid @enderror" name="email_phone" value="{{ old('email_phone') }}" required  autofocus>

                                @error('email_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin-right: 50%">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
