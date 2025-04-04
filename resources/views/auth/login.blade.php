@extends('layouts.app')

@section("content")
    @dump(session('status'))
    <x-card>
        <x-slot:title>
            <h3><i class="fa fa-user"></i> {{ __('Login') }}</h3>
        </x-slot>

        <x-slot:before_body>
            <form method="POST" action="{{ route('login') }}">
            @csrf
        </x-slot>

        <x-slot:body>
            <x-input-bst :name="'email'" :label="'Email'" :type="'email'" :value="old('email')" :required="true" :error="$errors->get('email')" />
            <x-input-bst :name="'password'" :label="'Password'" :type="'password'" :required="true" :error="$errors->get('password')"  />

            <x-checkout-bst :name="'remember'" :label="'Remember me'" :value="1" />
        </x-slot>

        <x-slot:footer>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-success">{{ __('Log in') }}</button>
        </x-slot>

        <x-slot:after_footer>
            </form>
        </x-slot>
    </x-card>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection
