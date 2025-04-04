<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <div class="container">
            <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center">
                <img src="https://picsum.photos/100/50?random=1" class="rounded float-start me-3" alt="ConveyThis - Test task" />
                <strong>{{ env('APP_NAME') }}</strong>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <x-nav />

        </div>
    </nav>
</header>
