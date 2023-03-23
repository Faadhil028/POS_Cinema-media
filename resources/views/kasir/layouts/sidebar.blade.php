<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <img src="{{ asset('soc movie 2.png') }}" alt="logo" class="mx-auto d-block mb-2" width="100">
    {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Sidebar</span>
    </a> --}}
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('film') }}" class="nav-link active" aria-current="page">
                Home
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                Orders
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                Products
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                Customers
            </a>
        </li>
        <hr>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="bi bi-box-arrow-left"></i>
                LOG OUT
            </a>
        </li>
    </ul>
    {{-- <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2" />
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div> --}}
</div>
