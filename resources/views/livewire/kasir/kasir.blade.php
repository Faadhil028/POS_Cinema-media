<div class="p-3 bg-white" style="border-radius: 20px">
    <h3>Daftar Pesanan</h3>
    <hr>
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
    <div class="p-2 d-block mt-3" style="border-radius: 10px;">
        <button class="btn btn-info" wire:click='showCash'>Cash</button>
        <button class="btn btn-info" wire:click='showQris'>Qris</button>
    </div>
    <div class="card bg-dark p-2 mt-3"
        style="border-radius: 10px; display : @if ($showCash === true) block @else none @endif;">
        <table class="text-white">
            <tbody>
                <tr>
                    <th>Uang Pembayaran</th>
                    <th> </th>
                    <th>
                        Rp
                        <input type="number" min="0" wire:model='amountPaid' wire:change='calculateChange'
                            oninput="validity.valid||(value='');"
                            value="{{ $amountPaid ? number_format($amountPaid) : 0 }}">
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
        <button class="btn btn-dark form-control" wire:click='store'>Order</button>
    </div>
</div>
