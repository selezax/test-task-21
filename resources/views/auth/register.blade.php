@extends('layouts.app')

@section("content")
    <x-card>
        <x-slot:title>
            <h3><i class="fa fa-user"></i> {{ __('Register') }}</h3>
        </x-slot>

        <x-slot:before_body>
            <form method="POST" action="{{ route('register') }}">
            @csrf
        </x-slot>

        <x-slot:body>
            <x-input-bst :name="'name'" :label="'Name'" :type="'text'" :value="old('name')" :required="true" :error="$errors->get('name')" />
            <x-input-bst :name="'email'" :label="'Email'" :type="'email'" :value="old('email')" :required="true" :error="$errors->get('email')" />

            <x-input-bst :name="'password'" :label="'Password'" :type="'password'" :required="true" :error="$errors->get('password')"  />
            <x-input-bst :name="'password_confirmation'" :label="'Confirm Password'" :type="'password'" :required="true" :error="$errors->get('password_confirmation')"  />
        </x-slot>

        <x-slot:footer>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-success">{{ __('Register') }}</button>
        </x-slot>

        <x-slot:after_footer>
            </form>
        </x-slot>
    </x-card>
@endsection
