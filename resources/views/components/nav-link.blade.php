@props(['route', 'title'])

<a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}" aria-current="page" href="{{ route($route) }}">{{ __($title) }}</a>
