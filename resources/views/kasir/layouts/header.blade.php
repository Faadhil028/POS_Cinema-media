<div class="row">
    <header
        class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow col-lg-8 shadow p-3 mb-2 bg-body-tertiary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-dark position-absolute top-100 start-0" id="navbarNav">
            @include('kasir.layouts.sidebar')
            {{-- <ul class="navbar-nav mx-auto p-3">
                <li class="nav-item mx-2">
                    <a class="nav-link active text-white" aria-current="page" href="#hero">TRANSAKSI</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="#section">LAYANAN</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="#fitur">FITUR</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white" href="#contact">LOG OUT</a>
                </li>
            </ul> --}}
        </div>
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('film') }}">SOC MOVIE</a>
        <input class="form-control form-control-dark w-50 m-2" type="text" placeholder="Search" aria-label="Search">
    </header>
    <div class="col-lg-4 shadow p-3 mb-2 bg-body-tertiary rounded bg-white">
        <h1>Ticket</h1>
    </div>
</div>
