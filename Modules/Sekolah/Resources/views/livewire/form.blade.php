@push('head-js')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
@endpush

<div>
    {{-- livewire view --}}
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
                {{-- <input type="text" wire:model="bentukpendidikan" class="form-control @error('bentukpendidikan') is-invalid @enderror" required> --}}
                <select wire:model="bentukpendidikan" class="form-control @error('bentukpendidikan') is-invalid @enderror">
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
                <input type="text" wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror">
                @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                Provinsi
            </div>
            <div class="col-md-9">
                <select wire:model="selectedProvinsi" class="form-control @error('selectedProvinsi') is-invalid @enderror" >
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
                <select wire:model="selectedDistrik" class="form-control @error('selectedDistrik') is-invalid @enderror" >
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
                <select wire:model="selectedKecamatan" class="form-control @error('selectedKecamatan') is-invalid @enderror" >
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
                <select wire:model="selectedKelurahan" class="form-control @error('selectedKelurahan') is-invalid @enderror" >
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
                <input type="text" wire:model="kodepos" class="form-control @error('kodepos') is-invalid @enderror" >
                @error('kodepos') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                Lokasi
            </div>
            <div class="col-md-9">
                <div wire:ignore id='map' style='height: 300px;'></div>
            </div>
        </div>
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
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@push('script-livewire')
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<script>
    mapboxgl.accessToken = `{{ env('MAPBOX') }}`;
    var center
    
    @if ($lat && $lng)
        center = [{{ $lng }}, {{ $lat }}]
    @else
        center = [106.85, -6.21]
    @endif

    // alert(center)
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: center,
        zoom: 8,
        attributionControl: false
    });
    map.addControl(new mapboxgl.AttributionControl(), 'top-left');

    map.on('click', (e) => {
        Livewire.emit('dataLngLat', {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng
        })

        add_marker(e)
    });

    this.marker = new mapboxgl.Marker();

    function add_marker(event) {
        var coordinates = event.lngLat;
        this.marker.setLngLat(coordinates).addTo(map);
    }

    @if ($lat && $lng)
        set_marker(center)
    @endif
    
    function set_marker(point)
    {
        this.marker.setLngLat(point).addTo(map);
    }

</script>
@endpush
