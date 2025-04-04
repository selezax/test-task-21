    <x-card>
        <x-slot:title>
            <h3><i class="fa fa-user"></i> {{ __('Please enter a domain') }}</h3>
        </x-slot>

        <x-slot:before_body>
            <form method="POST" action="{{ route('tdp.auth.domain.add') }}">
            @csrf
        </x-slot>

        <x-slot:body>
            <x-input-bst :name="'domain'" :label="'Domain'" :type="'text'" :value="old('domain')" :error="$errors->get('domain')" />
        </x-slot>

        <x-slot:footer>
            <button type="submit" class="btn btn-success">{{ __('Send') }}</button>
        </x-slot>

        <x-slot:after_footer>
            </form>
        </x-slot>
    </x-card>



    <div class="container">
        <form method="post" action="{{ route('tdp.auth.domain.update') }}" >
            @csrf
        @foreach($domains as $iDom)
            <div class="row my-1">
                <div class="col-8 col-md-4 offset-md-3 col-lg-3 offset-lg-4">
                    <input name="domains[{{ $iDom->id }}]" value="{{ $iDom->domain }}" class="form-control">
                    @if($err = $errors->get('domains.' . $iDom->id))
                        <ul>
                            <li class="text-danger small">{{ implode('</li><li>', $err) }}</li>
                        </ul>
                    @endif
                </div>
                <div class="col-4 col-md-2 col-lg-1 ">
                    <div class="form-check text-danger small">
                        <input name="removes[{{ $iDom->id }}]" class="form-check-input" type="checkbox" value="{{ $iDom->id }}" id="remove{{$iDom->id}}">
                        <label class="form-check-label" for="remove{{$iDom->id}}">
                            Delete
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="row my-3">
                <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

