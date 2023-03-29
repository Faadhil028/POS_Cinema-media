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
        <button class="btn btn-dark form-control" wire:click.prevent="store">Order</button>
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
