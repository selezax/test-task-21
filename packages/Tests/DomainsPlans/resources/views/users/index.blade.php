@extends('layouts.app')

@section("content")
<div class="container mt-5">
    <div class="row">
        <div class="table-responsive-md">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('email') }}</th>
                    <th>{{ __('domain') }}</th>
                    <th>{{ __('created_at') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        {{--<td><li>{{ implode('</li><li>', $item->domains?->toArray() ?? []) }}</li></td>--}}
                        <td>
                            <ul>
                            @foreach($item->domains?->toArray() ?? [] as $dItem)
                                <li>{{ $dItem['domain'] }}</li>
                            @endforeach
                            </ul>
                        </td>
                        <td>{{ $item->created_at->format('d.m.Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row my-3">
        {{ $items->links() }}
    </div>
</div>
@endsection
