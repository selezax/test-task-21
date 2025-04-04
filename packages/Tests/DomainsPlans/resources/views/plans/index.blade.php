@extends('layouts.app')

@section("content")
<div class="container mt-5">
    <div class="row">
        @foreach($items as $i)
            <div class="col-lg-4 col-12 p-5 d-flex flex-column align-content-stretch">
                <h3>{{ $i->plan_name }}</h3>
                <p>Price: {{ $i->price_formatted }}</p>
                <ul class="list-group mb-5">
                    @foreach($i->features as $fTitle => $fItem)
                        <li class="list-group-item">{{ $fTitle }}: {{ $fItem }}</li>
                    @endforeach
                </ul>

                @if( $current_plan == $i->id)
                    <a href="#" class="btn btn-success mt-auto mx-auto">
                        <i class="fa fa-check me-2"></i> {{ __('Current plan') }}
                    </a>
                @else
                    <a href="{{ route('tdp.auth.plans.buy', ['plan_id' => $i->id]) }}" class="btn btn-outline-success mt-auto mx-auto">
                        <i class="fa fa-cart-plus me-2"></i> {{ __('Buy') }}
                    </a>
                @endif

            </div>
        @endforeach
    </div>
</div>
@endsection
