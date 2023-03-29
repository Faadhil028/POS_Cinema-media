<div class="row">
    <header class="navbar navbar-dark sticky-top col-lg-8 bg-dark flex-md-nowrap p-0 mb-2">
        <div class="d-flex flex-row mb-3">
            <div class="p-2 mr-3">
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
    <div class="col-lg-4 p-3 mb-2 bg-body-tertiary bg-dark text-white">
        <div class="d-flex justify-content-between">
            <div class="p-2">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                <p id="clock"></p>
            </div>
            <div class="p-2">
                <p>Hello,{{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>
</div>

<script>
    var clock = document.getElementById('clock');
    var updateClock = function() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var time = hours + ':' + minutes + ':' + seconds;
        clock.innerHTML = time;
    };
    setInterval(updateClock, 1000);
</script>
