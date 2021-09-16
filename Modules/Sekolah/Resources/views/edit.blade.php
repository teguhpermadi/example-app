@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('sekolah.name') !!}</h1>
    </div>

    <div class="section-body">
        <div class="alert alert-danger">
            <p>
                Profil sekolah belum dilengkapi, silahkan lengkapi terlebih dahulu!
            </p>
            <button type="button" class="btn btn-light">Tambah</button>
        </div>

        <div class="card p-3">
            <div class="row">
                <div class="col-sm-3">
                    <img src="https://source.unsplash.com/weekly?nature" alt="" class="img-thumbnail">
                    <img src="https://source.unsplash.com/weekly?maps" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <form action="">
                    <h2>Lorem ipsum dolor sit</h2>
                    <table class="table table-striped">
                        <tbody>
                            <?php for ($i=0; $i < 5; $i++) { ?>
                            <tr>
                                <td>Lorem ipsum dolor sit amet.</td>
                                <td><input type="text" class="form-control" value="Lorem ipsum dolor sit amet."></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
{{-- custom js per page --}}
@endsection
