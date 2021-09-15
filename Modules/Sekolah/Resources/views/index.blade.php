@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('sekolah.name') !!}</h1>
    </div>

    <div class="section-body">
        <div class="alert alert-warning">
            Profil sekolah belum dilengkapi, silahkan lengkapi terlebih dahulu!
        </div>

        <div class="card p-3">
            <div class="row">
                <div class="col-sm-3">
                    <img src="https://source.unsplash.com/weekly?nature" alt="" class="img-thumbnail">
                    <img src="https://source.unsplash.com/weekly?maps" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <h2>Lorem ipsum dolor sit</h2>
                    </p>amet consectetur adipisicing elit. At vero reiciendis omnis, modi officiis
                    obcaecati quae saepe possimus doloremque! Excepturi, ipsum. Laboriosam commodi vel fuga debitis
                    inventore mollitia itaque reprehenderit eum suscipit quas, tempora nemo facilis quisquam impedit
                    deleniti at dicta exercitationem quasi, cum laborum? Optio animi quaerat voluptas, tempore amet
                    voluptatem eveniet natus architecto aliquid dolor et eius delectus facilis iusto. Nesciunt aut qui
                    minima incidunt nisi rerum quisquam, facere ex dignissimos! Quia necessitatibus porro est minima eos
                    enim dolorem vero. Optio consequatur inventore reiciendis eum beatae quia veniam dicta reprehenderit
                    natus possimus vero ea laudantium suscipit repellendus eius ex distinctio nostrum dolorum a, alias
                    culpa quasi minima? Ducimus beatae hic corrupti doloremque provident, nemo praesentium blanditiis
                    voluptatum, non, deleniti excepturi voluptates. Quasi quam mollitia porro ipsum ullam, ab magnam
                    consequatur cumque officiis nulla sit nobis optio doloribus dolor. Possimus similique id eum
                    perspiciatis provident ab nostrum aspernatur molestiae. Autem inventore provident laudantium,
                    dolorem ad doloribus impedit? Qui dicta deleniti est quasi officiis ipsum, molestias distinctio
                    harum voluptatum impedit dolorum architecto fugit maxime similique quod saepe soluta minima?
                    Doloribus quis atque vitae nihil blanditiis, aut rerum consequatur? Quia ullam libero, eveniet
                    minima saepe nisi quidem vel est tempore inventore.
                    <p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
{{-- custom js per page --}}
@endsection
