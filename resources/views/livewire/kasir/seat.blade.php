<div class="row">
    <section id="choose-chair" class="bg-white p-3 col-lg" style="border-radius: 20px">
        <div class="container py-5">
            <div class="row mb-5">
                <h1>STUDIO 1</h1>
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
                            <input type="checkbox" name="terpilih" id="terpilih" checked disabled>
                            <label for="terpilih">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </div>
                        <div class="text-choosed">Dipilih</div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-6">
                    <div class="seats">
                        <div class="seat sold">
                            <input type="checkbox" name="A1" id="A1" value="A1" disabled>
                            <label for="A1">A1</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A2" id="A2" value="A2" wire:model='pickSeats'
                                wire:change='updateSeats'>
                            <label for="A2">A2</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A3" id="A3" value="A3" wire:model='pickSeats'
                                wire:change='updateSeats'>
                            <label for="A3">A3</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A4" id="A4" value="A4" wire:model='pickSeats'
                                wire:change='updateSeats'>
                            <label for="A4">A4</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A5" id="A5" value="A5" wire:model='pickSeats'
                                wire:change='updateSeats'>
                            <label for="A5">A5</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="seats">
                        <div class="seat">
                            <input type="checkbox" name="A6" id="A6" value="A6">
                            <label for="A6">A6</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A7" id="A7" value="A7">
                            <label for="A7">A7</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A8" id="A8" value="A8">
                            <label for="A8">A8</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A9" id="A9" value="A9">
                            <label for="A9">A9</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="A10" id="A10" value="A10">
                            <label for="A10">A10</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="seats">
                        <div class="seat">
                            <input type="checkbox" name="B1" id="B1" value="B1">
                            <label for="B1">B1</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B2" id="B2" value="B2">
                            <label for="B2">B2</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B3" id="B3" value="B3">
                            <label for="B3">B3</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B4" id="B4" value="B4">
                            <label for="B4">B4</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B5" id="B5" value="B5">
                            <label for="B5">B5</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="seats">
                        <div class="seat">
                            <input type="checkbox" name="B6" id="B6" value="B6">
                            <label for="B6">B6</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B7" id="B7" value="B7">
                            <label for="B7">B7</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B8" id="B8" value="B8">
                            <label for="B8">B8</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B9" id="B9" value="B9">
                            <label for="B9">B9</label>
                        </div>
                        <div class="seat">
                            <input type="checkbox" name="B10" id="B10" value="B10">
                            <label for="B10">B10</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="bg-info p-4 text-center text-white">Layar Bioskop Disini</div>
            </div>
        </div>
    </section>
    <div class="col-lg-4 mt-1" style="border-radius: 20px">
        @livewire('kasir.kasir', ['price' => $price])
    </div>
</div>
