<div class="p-3 bg-white" style="border-radius: 20px">
    @if ($filmName == ' ')
        <h3>Daftar Pesanan</h3>
        <hr>
        <h1>Silahkan Pilih Film</h1>
    @else
        <h1>{{ $studioName }} ({{ $studioClass }})</h1>
        <p>{{ $date }}</p>
        <p>{{ $time }}</p>
        <div class="card bg-dark p-2" style="border-radius: 10px">
            <table class="text-white">
                <tbody>
                    <tr>
                        <th>Nama Film</th>
                        <th> </th>
                        <th>{{ $filmName }}</th>
                    </tr>
                    @if ($seats)
                        <tr>
                            <th>Kursi (x{{ count($seats) }})</th>
                            <th> </th>
                            <th>
                                @foreach ($seats as $seat)
                                    {{ $seat }}
                                @endforeach
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card bg-dark p-2 mt-3" style="border-radius: 10px">
            <table class="text-white">
                <tbody>
                    <tr>
                        <th>Sub Total</th>
                        <th> </th>
                        <th>
                            Rp
                            {{ number_format(count($seats) * $price) }}
                        </th>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th> </th>
                        <th class="d-inline">
                            Rp {{ number_format($total) }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card bg-dark p-2 mt-3"
            style="border-radius: 10px; display : @if ($showCash === true) block @else none @endif;">
            <table class="text-white">
                <tbody>
                    <tr>
                        <th>Uang Pembayaran</th>
                        <th> </th>
                        <th class="form-inline">
                            <p>
                                Rp
                                <input type="number" class="form-control bg-transparent text-white" min="0"
                                    wire:model='amountPaid' wire:change='calculateChange'
                                    oninput="validity.valid||(value=0);" onclick="if(this.value=='0') this.value='';"
                                    value="{{ $amountPaid ? number_format($amountPaid) : 0 }}">
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <th>Uang Kembalian</th>
                        <th> </th>
                        <th>Rp {{ number_format($change) }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card bg-dark p-2 mt-3 text-white"
            style="border-radius: 10px; display : @if ($showQris === true) block @else none @endif;">
            <h1>Ini QRIS</h1>
        </div>
        <div class="p-2 d-block mt-3" style="border-radius: 10px;">
            <button class="p-2"
                style="width:100px; border: 1px solid black; border-radius: 15px; @if ($showCash) background-color: #343A40; color: white; @else  background-color: white; @endif"
                wire:click='showCash'>Cash</button>
            <button class="p-2"
                style="width:100px; border: 1px solid black; border-radius: 15px; @if ($showQris) background-color: #343A40; color: white; @else  background-color: white; @endif"
                wire:click='showQris'>Qris</button>
        </div>
        <div class="p-2
            d-block mt-3" style="border-radius: 10px;">
            <button class="btn btn-dark form-control" wire:click='store'>Order</button>
        </div>
    @endif
</div>
