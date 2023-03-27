<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 280px;">
    <img src="{{ asset('soc movie 2.png') }}" alt="logo" class="mx-auto d-block mb-2" width="100">
    <hr>
    <h6 class="mt-2">Hello, {{ auth()->user()->name }}</h6>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto text-white">
        <li class="nav-item">
            <a href="{{ route('film') }}" class="nav-link {{ request()->routeIs('film') ? 'active' : '' }} link-light"
                aria-current="page">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.index') }}" class="nav-link link-light">
                Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-light">
                Orders
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-light">
                Products
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-light">
                Customers
            </a>
        </li>
        <hr>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 mt-2">
                @csrf
                <button type="submit" class="nav-link link-light">
                    <i class="bi bi-box-arrow-left"></i>
                    LOG OUT
                </button>
            </form>
        </li>
    </ul>
</div>
