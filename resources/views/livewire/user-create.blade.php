<div>
    <div class="row">
        <form wire:submit.prevent="store">
            <div class="form-group">
                <div class="form-row mt-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Nama</label>
                                <input type="text" wire:model.debounce.100ms="name" class="form-control"
                                    id="name" placeholder="Masukkan nama">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" wire:model.debounce.100ms="email" class="form-control"
                                    id="email" placeholder="Masukkan email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div>Jenis Kelamin</div>
                                <input type="radio" wire:model.debounce.100ms="gender" id="laki"
                                    value="1">&nbsp; <label for="laki">Laki - laki</label>
                                &emsp14;
                                <input type="radio" wire:model.debounce.100ms="gender" id="perempuan"
                                    value="2">&nbsp; <label for="perempuan">Perempuan</label>
                                <div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="address">Alamat</label>
                                <textarea wire:model.debounce.100ms="address" class="form-control" id="address" placeholder="Masukkan alamat"></textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-md-12">
                        <div class="row">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
