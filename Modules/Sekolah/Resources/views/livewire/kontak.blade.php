<div>
    {{-- livewire view --}}
    <div class="row mb-3">
        <div class="col-md-3">
            Telp
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="telp" class="form-control  @error('telp') is-invalid @enderror">
            @error('telp') <div class="invalid-feedback">{{ $message }}</div> @enderror

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Email
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="email" class="form-control  @error('email') is-invalid @enderror">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            Website
        </div>
        <div class="col-md-9">
            <input type="text" wire:model="website" class="form-control  @error('website') is-invalid @enderror">
            @error('website') <div class="invalid-feedback">{{ $message }}</div> @enderror

        </div>
    </div>
</div>
