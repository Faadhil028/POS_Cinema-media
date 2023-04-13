<div class="p-3 bg-white" style="border-radius: 20px; height:100vh">
    <h3>Daftar Pesanan</h3>
    <hr>
    @if ($filmName == ' ')
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="text-center">
                <i class="bi bi-basket-fill display-2"></i>
                <h2>Pesanan Anda Kosong</h2>
                <p>Silahkan pilih film untuk pesan lebih lanjut</p>
            </div>
        </div>
    @else
        <h3>{{ $studioName }} ({{ $studioClass }})</h3>
        {{-- <p>Date : {{ $date }}</p>
        <p>Time : {{ \Carbon\Carbon::parse($time)->format('H:i') }}</p> --}}
        <div class="card bg-dark p-2 mt-3" style="border-radius: 10px">
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
                        {{-- @else
                        <tr>
                            <th>Kursi (x0)</th>
                            <th> </th>
                            <th>
                            </th>
                        </tr> --}}
                    @endif
                    <tr>
                        <th>Date</th>
                        <th> </th>
                        <th> {{ $date }}</th>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <th> </th>
                        <th> {{ \Carbon\Carbon::parse($time)->format('H:i') }}</th>
                    </tr>
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
        <div class="p-2 d-flex justify-content-center mt-3" style="border-radius: 10px;">
            <button class="p-2 mr-2"
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
            d-flex justify-content-center mt-3">
            <button class="btn btn-warning form-control mr-2" style="width:75%; border-radius:15px"
                wire:click='resetField'>Reset</button>
            <button class="btn btn-dark form-control" style="width:75%; border-radius:15px"
                wire:click='store'>Order</button>

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
                    <a href="{{ route('pos.ticket', $tdetail_id) }}" class="btn btn-dark">Print
                        Ticket</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        window.addEventListener('show-swal', event => {
            // Tampilkan SweetAlert ketika tombol diklik
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Transaksi Berhasil',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                // Kode untuk memunculkan modal lain
                $('#myModal').modal('show');
            });
        });
    </script>
@endpush
