
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    @auth
    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <x-nav-link route="dashboard" title="Dashboard"></x-nav-link>
        </li>
        <li class="nav-item">
            <x-nav-link route="tdp.auth.plans.index" title="Plans"></x-nav-link>
        </li>

        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
        <li class="nav-item">
            <x-nav-link route="tdp.auth.users.index" title="Users"></x-nav-link>
        </li>
        @endif
    </ul>
    @endauth

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-sign-out"></i> {{ __('Logout') }}</button>
        </form>
    @else
        <a href="{{ route('register') }}" role="button" class="btn btn-outline-success ms-auto">{{ __('Register') }}</a>
        <a href="{{ route('login') }}" role="button" class="btn btn-success ms-lg-2">{{ __('Login') }}</a>
    @endauth

</div>

