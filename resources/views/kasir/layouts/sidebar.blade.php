<div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height:100%; background-color: black">
    <img src="{{ asset('soc movie 2.png') }}" alt="logo" class="mx-auto d-block mb-2" width="100">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto text-white">
        <li class="nav-item">
            <a href="{{ route('pos.film') }}"
                class="nav-link {{ request()->routeIs('pos.*') ? 'active' : '' }} link-light" aria-current="page">
                <i class="bi bi-house-door-fill mr-2"></i>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.index') }}" class="nav-link link-light">
                <i class="bi bi-clipboard-data-fill mr-2"></i>
                Dashboard
            </a>
        </li>
        {{-- <li>
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
        </li> --}}
        <hr>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 mt-2">
                @csrf
                <button type="submit" class="nav-link link-light">
                    <i class="bi bi-box-arrow-left mr-2"></i>
                    KELUAR
                </button>
            </form>
        </li>
    </ul>
</div>
