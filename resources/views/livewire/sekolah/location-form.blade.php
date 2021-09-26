<div>
    {{-- Stop trying to control. --}}
    <div class="row mb-3">
        <div class="col-md-3">
            Provinsi
        </div>
        <div class="col-md-9">
            <select wire:model="selectedProvinsi" class="form-control @error('provinsi') is-invalid @enderror">
                <option value="">Pilih</option>
                @foreach ($provinsi as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
            @error('provinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Distrik
        </div>
        <div class="col-md-9">
            <select wire:model="selectedDistrik" class="form-control @error('distrik') is-invalid @enderror">
                <option value="">Pilih</option>
                    @foreach ($distrik as $d)
                    {{ $distrik }}
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
            </select>
            @error('distrik') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Kecamatan
        </div>
        <div class="col-md-9">
            <select wire:model="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                <option value="">Pilih</option>
            </select>
            @error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Kelurahan
        </div>
        <div class="col-md-9">
            <select wire:model="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror">
                <option value="">Pilih</option>
            </select>
            @error('kelurahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Kodepos
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="kodepos" class="form-control @error('kodepos') is-invalid @enderror">
            @error('kodepos') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>
