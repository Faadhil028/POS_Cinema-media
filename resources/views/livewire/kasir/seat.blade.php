<div>
    <section id="choose-chair" class="bg-white p-3 col-lg"
        style="border-radius: 20px; display : @if ($showSeat === true) block @else none @endif;">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="title">PILIH KURSI</div>
                <div class="subtitle">Pilih kursi yang akan kamu tempati selama pemutaran film</div>
            </div>
            <div class="row mb-5">
                <div class="col d-flex justify-content-end">
                    <div class="full d-flex ">
                        <div class="seat sold">
                            <label for="terpilih">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>

                        <div class="text-full">Terisi</div>
                    </div>
                    <div class="empty d-flex mx-3 seats">
                        <div class="seat">
                            <label for="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                        <div class="text-empty">Kursi Kosong</div>
                    </div>
                    <div class="choosed d-flex ">
                        <div class="seat">
                            <input type="checkbox" checked disabled>
                            <label for="terpilih">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                        <div class="text-choosed">Dipilih</div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                @if ($seats)
                    @foreach (collect($seats)->chunk(5) as $chunk)
                        <div class="col-6">
                            <div class="seats">
                                @foreach ($chunk as $seat)
                                    @if (in_array($seat['row'] . $seat['number'], $seatSold))
                                        <div class="seat sold">
                                            <input type="checkbox" name="{{ $seat['row'] }}{{ $seat['number'] }}"
                                                id="{{ $seat['row'] }}{{ $seat['number'] }}"
                                                value="{{ $seat['row'] }}{{ $seat['number'] }}" disabled>
                                            <label
                                                for="{{ $seat['row'] }}{{ $seat['number'] }}">{{ $seat['row'] }}{{ $seat['number'] }}</label>
                                        </div>
                                    @else
                                        <div class="seat">
                                            <input type="checkbox" name="{{ $seat['row'] }}{{ $seat['number'] }}"
                                                id="{{ $seat['row'] }}{{ $seat['number'] }}"
                                                value="{{ $seat['row'] }}{{ $seat['number'] }}"
                                                wire:model='pickSeats' wire:change='updateSeats'>
                                            <label
                                                for="{{ $seat['row'] }}{{ $seat['number'] }}">{{ $seat['row'] }}{{ $seat['number'] }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1>Kursi Belum Terdaftar</h1>
                @endif
            </div>
            <div class="row mb-5">
                <div class="p-4 text-center text-white" style="background-color: #118EEA;">Layar Bioskop Disini</div>
            </div>
        </div>
    </section>
</div>
