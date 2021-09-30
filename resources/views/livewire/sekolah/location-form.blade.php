<div>
    {{-- Stop trying to control. --}}
    <div class="row mb-3">
        <div class="col-md-3">
            Provinsi
        </div>
        <div class="col-md-9">
            <select wire:model="selectedProvinsi" class="form-control @error('selectedProvinsi') is-invalid @enderror" required>
                <option value="">Pilih</option>
                @foreach ($allProvinsi as $provinsi)
                    <option value="{{ $provinsi->code }}">{{ $provinsi->name }}</option>
                @endforeach
            </select>
            @error('selectedProvinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Distrik
        </div>
        <div class="col-md-9">
            <select wire:model="selectedDistrik" class="form-control @error('selectedDistrik') is-invalid @enderror" required>
                <option value="">Pilih</option>
                @foreach ($allDistrik as $distrik)
                    <option value="{{ $distrik->code }}">{{ $distrik->name }}</option>
                @endforeach
            </select>
            @error('selectedDistrik') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Kecamatan
        </div>
        <div class="col-md-9">
            <select wire:model="selectedKecamatan" class="form-control @error('selectedKecamatan') is-invalid @enderror" required>
                <option value="">Pilih</option>
                @foreach ($allKecamatan as $kecamatan)
                    <option value="{{ $kecamatan->code }}">{{ $kecamatan->name }}</option>
                @endforeach
            </select>
            @error('selectedKecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Kelurahan
        </div>
        <div class="col-md-9">
            <select wire:model="selectedKelurahan" class="form-control @error('selectedKelurahan') is-invalid @enderror" required>
                <option value="">Pilih</option>
                @foreach ($allKelurahan as $kelurahan)
                    <option value="{{ $kelurahan->code }}">{{ $kelurahan->name }}</option>
                    
                @endforeach
            </select>
            @error('selectedKelurahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Kodepos
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="kodepos" class="form-control @error('kodepos') is-invalid @enderror" required>
            @error('kodepos') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>
