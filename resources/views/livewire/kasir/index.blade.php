<div>
    <div class="bg-white p-3"
        style="border-radius: 20px; display : @if ($showIndex === true) block @else none @endif;">
        <div class="d-flex justify-content-between">
            <div class="p-2">
                <button class="btn {{ $this->genre === null ? 'btn-info' : 'btn-dark' }}" style="border-radius: 10px"
                    wire:click.prevent='resetFilter()'>All</button>
                @foreach ($genres as $genre)
                    <button class="btn {{ $this->genre === $genre->name ? 'btn-info' : 'btn-dark' }}"
                        style="border-radius: 10px"
                        wire:click.prevent='filter({{ $genre->id }})'>{{ $genre->name }}</button>
                @endforeach
            </div>
            <div class="p-2">
                <div class="input-group">
                    <input class="form-control border-2 rounded-pill" type="search" wire:model='search'
                        placeholder="search">
                </div>
            </div>
        </div>
        <div class="container pt-3">
            <div class="row row-cols-4 g-4">
                @forelse ($timetables as $timetable)
                    {{-- Tampilkan film jika status Currently Staring dan Hari yang sama dengan sekarang --}}
                    {{-- @if ($timetable->date == $dateNow && $timetable->status == 'CURRENTLY AIRING') --}}
                    <div class="col d-flex justify-content-center">
                        <a href="" class="text-decoration-none text-dark">
                            <div class="image-container">
                                @if ($timetable->tumbnail)
                                    <img src="{{ asset('storage/uploads/' . $timetable->tumbnail) }}"
                                        class="poster-img shadow" alt="tumbnail_film" width="200" height="300"
                                        style="border-radius: 20px">
                                @else
                                    <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Frlv.zcache.com%2Ftemplate_film_template_poster-r2887074b782a4030942a741a5346e187_ai6av_8byvr_630.jpg%3Fview_padding%3D%5B285%2C0%2C285%2C0%5D&f=1&nofb=1&ipt=ac2f3ab3487738f4b5e43818cb8cf0e98251e9c1f5f7749e555f73deb6934941&ipo=images"
                                        class="poster-img shadow" alt="tumbnail_film" width="200" height="300"
                                        style="border-radius: 20px">
                                @endif
                                <div class="image-caption">
                                    @foreach (collect(explode(',', $timetable->button))->map(function ($showtime) {
            $showtime_arr = explode(';', $showtime);
            return [
                'id' => $showtime_arr[0],
                'time' => $showtime_arr[1],
                'studio' => $showtime_arr[2],
            ];
        })->sortBy('time') as $showtime)
                                        @php
                                            $timetableId = $showtime['id'];
                                            $time = $showtime['time'];
                                            $studio = $showtime['studio'];
                                        @endphp
                                        {{-- Untuk menampilakan Jam tidak lebih dari sekarang --}}
                                        {{-- @if (\Carbon\Carbon::parse($time)->format('H:i:s') >= $timeNow) --}}
                                        <button wire:click.prevent='pickSeat({{ $timetableId }})'>
                                            ({{ $studio }})
                                            {{ \Carbon\Carbon::parse($time)->format('H:i:s') }}</button>
                                        {{-- @endif --}}
                                    @endforeach
                                </div>
                            </div>
                            <div class="poster-title mt-3 ml-3">{{ $timetable->title }}</div>
                        </a>
                    </div>
                    {{-- @else
                        <div class="d-none d-lg-block">
                            <p>Ini adalah sebuah teks dalam div yang hanya muncul pada tampilan desktop.</p>
                        </div> --}}
                    {{-- @endif --}}
                @empty
                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="text-center">Tidak Ditemukan</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <livewire:kasir.seat />
</div>

<script>
    document.addEventListener('livewire:load', function() {
        setInterval(function() {
            @this.call('updateTime');
        }, 1000);
    });
</script>
