@extends('layouts.main')

@section('title', 'Categori')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5 mt-5">Selamat datang di categori {{ $categori->name }}</h2>

            <div class="d-flex flex-wrap justify-content-center">
                @if ($categori->foto->count())

                    @foreach ($categori->foto as $foto)
                        <div class="d-flex flex-column">
                            <div class="m-2">
                                @if ($foto->foto)
                                    <a href="/detail-foto/{{ $foto->id }}">
                                        <img class="img-fluid" src="{{ asset('storage/photo/' . $foto->foto) }}"
                                            alt="{{ $foto->title }}">
                                    </a>
                                @else
                                    <a href="/detail-foto/{{ $foto->id }}">
                                        <img class="img-fluid" src="{{ asset('img/notFound.jpeg') }}">
                                    </a>
                                @endif
                                <p>{{ $foto->title }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center mt-5">Tidak ada foto yang di upload</h3>
                @endif
            </div>
        </div>
    </section>

@endsection
