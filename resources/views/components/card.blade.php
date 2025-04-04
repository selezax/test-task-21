<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 col-lg-4 offset-md-4">
            <div class="card my-5 shadow-lg">
                <div class="card-header">
                    {{ $title ?? '' }}
                </div>
                {{ $before_body ?? ''  }}
                    @csrf
                    <div class="card-body">
                        {{ $body ?? ''  }}
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        {{ $footer ?? ''  }}
                    </div>
                {{ $after_footer ?? ''  }}
            </div>
        </div>
    </div>
</div>

