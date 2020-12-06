@extends('layouts.auth')

@section('title')
Login Page
@endsection

@section('body')


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block">
                                <img width="450px" src="../gambar/robot.gif" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Please Login</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                        <div>
                                            <x-jet-label for="username" value="{{ __('Username') }}" />
                                            <x-jet-input id="username" class="form-control form-control-user" type="text" name="username" :value="old('username')" required autofocus />
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                        <x-jet-input id="password" class="form-control form-control-user" type="password" name="password" required autocomplete="current-password" />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <label for="remember_me" class="flex items-center">
                                                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                            <x-jet-button class="btn btn-primary btn-user btn-block">
                                                {{ __('Login') }}
                                            </x-jet-button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
        </form>

@endsection
