<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div wire:ignore id='map' style='width: 550px; height: 300px;'></div>
    <input type="text" name="bujur" id="" wire:model="long">
    <input type="text" name="lintang" id="" wire:model='lat'>
</div>

@push('script-livewire')
<script>
    document.addEventListener('livewire:load', () => {
        const defaultLocation = [112.621391, -7.983908]

        mapboxgl.accessToken =
            'pk.eyJ1IjoidGVndWhwZXJtYWRpIiwiYSI6ImNrdHlmdjhrdzB0enIydXRodTNrMmsweWsifQ.qDYxEaljnRN5URnTUZcDjQ';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 11, // starting zoom
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        map.addControl(new mapboxgl.NavigationControl)
        this.marker = new mapboxgl.Marker();

        map.on('click', (e) => {
            const longtitude = e.lngLat.lng
            const lattitude = e.lngLat.lat
            // console.log({longtitude, lattitude})
            @this.long = longtitude
            @this.lat = lattitude
            add_marker(e)
            Livewire.on('sendData')
        })

        function add_marker(event) {
            var coordinates = event.lngLat;
            // console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
            this.marker.setLngLat(coordinates).addTo(map);
        }
    })

</script>
@endpush
