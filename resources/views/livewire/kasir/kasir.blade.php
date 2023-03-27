<div class="p-3 bg-white" style="border-radius: 20px">
    <h3>Daftar Pesanan</h3>
    <hr>
    <div class="card bg-dark p-2" style="border-radius: 10px">
        <table class="text-white">
            <tbody>
                <tr>
                    <th>Nama Film</th>
                    <th> </th>
                    <th>The Avanger</th>
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
                        {{ count($seats) * $price }}
                    </th>
                </tr>
                <tr style="border-bottom: 1px solid">
                    <th>Tax</th>
                    <th> </th>
                    <th>Rp 0</th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th> </th>
                    <th class="d-inline">
                        Rp {{ $total }}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="p-2 d-block mt-3" style="border-radius: 10px;">
        <button class="btn btn-dark disabled">Cash</button>
        <button class="btn btn-info disabled">Qris</button>
    </div>
    <div class="p-2 d-block mt-3" style="border-radius: 10px;">
        <button class="btn btn-dark form-control" wire:click='store'>Order</button>
    </div>
</div>
