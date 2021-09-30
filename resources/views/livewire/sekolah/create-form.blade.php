<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit.prevent="submit">
        @livewire('sekolah.identitas-sekolah')

        @livewire('sekolah.location-form')
        @livewire('sekolah.map-form')
        {{-- @livewire('sekolah.contact-form') --}}
        <button type="submit" class="btn btn-primary">Save Contact</button>
    </form>
</div>
