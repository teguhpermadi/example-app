<div>
    {{-- Stop trying to control. --}}
    <div class="row mb-3">
        <div class="col-md-3">
            Provinsi
        </div>
        <div class="col-md-9">
            <select wire:model="provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                <option value="">Pilih</option>
                @foreach ($dataProvinsi as $provinsi)
                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
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
            <select wire:model="distrik" class="form-control @error('distrik') is-invalid @enderror">
                <option value="">Pilih</option>
                @if(!is_null($dataDistrik))
                
                    @foreach ($dataDistrik as $distrik)
                    {{ $distrik }}
                        <option value="{{ $distrik->id }}">{{ $distrik->name }}</option>
                    @endforeach
                @endif
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
