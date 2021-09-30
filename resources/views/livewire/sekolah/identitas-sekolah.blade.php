<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row mb-3">
        <div class="col-md-3">
            Nama Sekolah
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="namasekolah" class="form-control @error('namasekolah') is-invalid @enderror" required>
            @error('namasekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            NPSN
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="npsn" class="form-control @error('npsn') is-invalid @enderror" required>
            @error('npsn') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Bentuk Pendidikan
        </div>
        <div class="col-md-9">
            {{-- <input type="text" wire:model="bentukpendidikan" class="form-control @error('bentukpendidikan') is-invalid @enderror" required> --}}
            <select wire:model="bentukpendidikan" class="form-control @error('bentukpendidikan') is-invalid @enderror" required>
                <option value="">Pilih</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
                <option value="sma">SMA</option>
            </select>
            @error('bentukpendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Alamat
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror" required>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>
