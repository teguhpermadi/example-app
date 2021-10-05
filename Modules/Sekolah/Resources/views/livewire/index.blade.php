<div>
    {{-- livewire view --}}
    <div class="card p-3">
        <div class="row">
            <div class="col-sm-3">
                <img src="{{ asset('storage/'.$logo) }}" alt="" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
                <h2 class="text-primary">{{ $namasekolah }}</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>NPSN</td>
                            <td>{{ $npsn }}</td>
                        </tr>
                        <tr>
                            <td>Bentuk Pendidikan</td>
                            <td>{{ $bentukpendidikan }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $alamat }}</td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>{{ $kelurahan }}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>{{ $kecamatan }}</td>
                        </tr>
                        <tr>
                            <td>Distrik</td>
                            <td>{{ $distrik }}</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>{{ $provinsi }}</td>
                        </tr>
                        <tr>
                            <td>Kodepos</td>
                            <td>{{ $kodepos }}</td>
                        </tr>
                        <tr>
                            <td>lintang</td>
                            <td>{{ $lat }}</td>
                        </tr>
                        <tr>
                            <td>bujur</td>
                            <td>{{ $lng }}</td>
                        </tr>
                        <tr>
                            <td>telp</td>
                            <td>{{ $telp }}</td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td>{{ $email }}</td>
                        </tr>
                        <tr>
                            <td>website</td>
                            <td>{{ $website }}</td>
                        </tr>
                </table>
                <a href="{{ route('sekolah.edit', $uuid) }}" class="btn btn-warning float-left mr-3">Edit</a>
                {{ Form::open(['route' => ['sekolah.destroy', $uuid], 'method' => 'delete', 'class' => 'float-left']) }}
                @csrf
                <button class="btn btn-danger">Hapus</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
