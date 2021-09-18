@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profil Sekolah</h1>
    </div>

    <div class="section-body">
        @if (session('message'))
        <div class="alert {{ session('alert-class', 'alert-info') }}">
            {{ session('message') }}
        </div>
        @endif

        @if (empty($sekolah))
        <div class="alert bg-danger bg-gradient">
                Profil sekolah belum dilengkapi, silahkan lengkapi terlebih dahulu!
            <a type="button" class="btn btn-primary border border-light ml-3" href="{{ route('sekolah.create') }}">Tambah</a>
        </div>
        @endif

        @foreach ($sekolah as $s)

        <div class="card p-3">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ $s->logo }}" alt="" class="img-thumbnail">
                    <img src="https://source.unsplash.com/weekly?maps" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <h2 class="text-primary">{{ $s->namasekolah }}</h2>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>NPSN</td>
                                <td>{{ $s->npsn }}</td>
                            </tr>
                            <tr>
                                <td>Bentuk Pendidikan</td>
                                <td>{{ $s->bentukpendidikan }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $s->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td>{{ $s->kelurahan }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>{{ $s->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Distrik</td>
                                <td>{{ $s->kota }}</td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>{{ $s->provinsi }}</td>
                            </tr>
                            <tr>
                                <td>Kodepos</td>
                                <td>{{ $s->kodepos }}</td>
                            </tr>
                            <tr>
                                <td>lintang</td>
                                <td>{{ $s->lintang }}</td>
                            </tr>
                            <tr>
                                <td>bujur</td>
                                <td>{{ $s->bujur }}</td>
                            </tr>
                            <tr>
                                <td>telp</td>
                                <td>{{ $s->telp }}</td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td>{{ $s->email }}</td>
                            </tr>
                            <tr>
                                <td>website</td>
                                <td>{{ $s->website }}</td>
                            </tr>
                    </table>
                    <a href="{{ route('sekolah.edit', $s->id) }}" class="btn btn-warning float-left mr-3">Edit</a>
                    {{ Form::open(['route' => ['sekolah.destroy', $s->id], 'method' => 'delete', 'class' => 'float-left']) }}
                    @csrf
                    <button class="btn btn-danger">Hapus</button>
                    {{ Form::close() }}
                    <!-- Button trigger modal -->
                    {{-- <button class="btn btn-danger trigger--fire-modal-7" data-confirm="Realy?|Do you want to continue?" data-confirm-yes="alert('Deleted :)');">Delete</button> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection

@section('js')
{{-- custom js per page --}}
<script>

</script>
@endsection
