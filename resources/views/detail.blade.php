@extends('layouts.main')

@section('title', 'Detail Foto')

@section('content')

    <section class="container-fluid py-5">
        <div class="container text-center">
            <h2 class="">Detail Foto {{ $foto->title }}</h2>
            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>' ;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/" class="text-decoration-none">home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/categori-detail/{{ $foto->categori->id }}" class="text-decoration-none">
                                {{ $foto->categori->name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $foto->title }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 col-md-8 d-block mx-auto d-flex justify-content-center column">
                @if ($foto->foto)
                    <img src="{{ asset('storage/photo/' . $foto->foto) }}" class="img-fluid img-thumbnail"
                        alt="{{ $foto->title }}">
                @else
                    <img src="{{ asset('img/notFound.jpeg') }}" class="img-fluid img-thumbnail" alt="{{ $foto->title }}">
                @endif
            </div>
            <p class="">
                <i>by {{ $foto->user->username }} upload in {{ $foto->upload }} </i>
            </p>
            <p class="">
                {!! $foto->description !!}
            </p>
        </div>
    </section>


    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Foto terkait</h2>

            <div class="row justify-content-center">
                @if ($fotoTerkaits->count())

                    @foreach ($fotoTerkaits as $foto)
                        <div class="col-md-3 col-sm-6 mb-3 ">
                            <a href="/detail-foto/{{ $foto->id }}">
                                @if ($foto->foto == '')
                                    <img src="{{ asset('img/notFound.jpeg') }}"
                                        class="img-fluid img-thumbnail produk-terkait-image" alt="{{ $foto->title }}">
                                @else
                                    <img src="{{ asset('storage/photo/' . $foto->foto) }}"
                                        class="img-fluid img-thumbnail produk-terkait-image" alt="{{ $foto->title }}">
                                @endif
                            </a>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center text-white">Tidak ada foto terkait😢</h3>
                @endif
            </div>
        </div>
    </section>

@endsection
