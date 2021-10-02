@section('head-js')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
@endsection

<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row mb-3">
        <div class="col-md-3">
            Lokasi
        </div>
        <div class="col-md-9">
            <div wire:ignore id='map' style='height: 300px;'></div>
        </div>
    </div>
</div>

@push('script-livewire')
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<script>
    mapboxgl.accessToken = `{{ env('MAPBOX') }}`;
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [106.85, -6.21],
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

</script>
@endpush
