<div class="row">
    <header class="navbar navbar-dark sticky-top col-lg-8 flex-md-nowrap p-0 mb-2" style="background-color: black">
        <div class="d-flex flex-row justify-content-between mb-3">
            <div class="p-2 mr-3 ml-3">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-dark position-absolute top-100 start-0" id="navbarNav">
                    @include('kasir.layouts.sidebar')
                </div>
            </div>
            <div class="p-2">
                <h2><a class="navbar-brand" href="{{ route('pos.film') }}">SOC MOVIE</a></h2>
            </div>
        </div>
    </header>
    <div class="col-lg-4 p-3 mb-2 bg-body-tertiary text-white" style="background-color: black">
        <div class="d-flex justify-content-between">
            <div class="p-2">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                <p id="clock"></p>
            </div>
            <div class="p-2">
                <div class="row">
                    <div class="col mt-auto">
                        <p>Hello,{{ auth()->user()->name }}</p>
                    </div>
                    <div class="col">
                        <img class="rounded-circle" style="width: 50px;"
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimg.pugam.com%2F2018%2F02%2Favatar1.png&f=1&nofb=1&ipt=121d022021903a2552bb470b80b77ba8054bbd775ad54063f1772582491b8458&ipo=images" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
