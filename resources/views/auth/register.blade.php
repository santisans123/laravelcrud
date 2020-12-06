@extends('layouts.auth')

@section('title')
Register Page
@endsection

@section('body')


<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img class="m-5" width="300px" src="../gambar/rreg.gif" alt="Robot">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <x-jet-authentication-card>
                                <x-slot name="logo">
                                </x-slot>
                            <x-jet-validation-errors class="mb-4" />
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <x-jet-input id="name" class="form-control form-control-user" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    </div>
                                    <div class="col-sm-6">
                                        <x-jet-label for="username" value="{{ __('Username') }}" />
                                        <x-jet-input id="username" class="form-control form-control-user" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                        <x-jet-input id="password" class="form-control form-control-user" type="password" name="password" required autocomplete="new-password" />
                                    </div>
                                    <div class="col-sm-6">
                                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                        <x-jet-input id="password_confirmation" class="form-control form-control-user" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>
                                </div>
                                <div class="text-center">
                                    <x-jet-button class="btn btn-primary btn-user btn-block">
                                        {{ __('Register') }}
                                    </x-jet-button>
                                <hr>
                                    <a class="small" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </x-jet-authentication-card>
        </div>
    </div>
</form>

@endsection
