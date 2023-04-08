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
                                {{ implode(', ', $seats) }}
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @error('seats')
            <div class="alert alert-warning alert-warning fade show mt-2" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
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
                    @error('amountPaid')
                        <div class="alert alert-warning alert-warning fade show mt-2" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
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
            @error('method')
                <div class="alert alert-warning alert-warning fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
        </div>
        <div class="p-2
            d-block mt-3" style="border-radius: 10px;">
            <button class="btn btn-dark form-control" wire:click='store'>Order</button>
        </div>
    @endif

    {{-- Modal --}}
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deskripsi</h1>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <table class="table table-borderless ml-5 col-lg-6">
                        <thead>
                            <tr>
                                <th>Film</th>
                                <th>:</th>
                                <th>{{ $filmName }}</th>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <th>:</th>
                                <th>{{ $date }}</th>
                            </tr>
                            <tr>
                                <th>Row</th>
                                <th>:</th>
                                <th>
                                    {{ implode(', ', $seats) }}
                                </th>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <th>:</th>
                                <th>{{ count($seats) }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-dark">Print Ticket</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        window.addEventListener('show-swal', event => {
            // Tampilkan SweetAlert ketika tombol diklik
            // alert('Name updated to: ');
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Transaction success',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                // Kode untuk memunculkan modal lain
                // Contoh:
                $('#myModal').modal('show');
            });
        });
    </script>
@endpush
