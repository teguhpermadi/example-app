<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit.prevent="submit">
        <div class="row mb-3">
            <div class="col-md-3">
                Nama Sekolah
            </div>
            <div class="col-md-9">
                <input type="text" wire:model="namasekolah" class="form-control @error('namasekolah') is-invalid @enderror">
                @error('namasekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                NPSN
            </div>
            <div class="col-md-9">
                <input type="text" wire:model="npsn" class="form-control @error('npsn') is-invalid @enderror">
                @error('npsn') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                Bentuk Pendidikan
            </div>
            <div class="col-md-9">
                <input type="text" wire:model="bentukpendidikan" class="form-control @error('bentukpendidikan') is-invalid @enderror">
                @error('bentukpendidikan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                Alamat
            </div>
            <div class="col-md-9">
                <input type="text" wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror">
                @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- @livewire('sekolah.location-form') --}}
        {{-- @livewire('sekolah.map-form') --}}
        {{-- @livewire('sekolah.contact-form') --}}
        <button type="submit" class="btn btn-primary">Save Contact</button>
    </form>
</div>
