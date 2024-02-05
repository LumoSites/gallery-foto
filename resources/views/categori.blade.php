@extends('layouts.main')

@section('title', 'Categori')

@section('content')


    <div class="container-fluid py-5">
        <div class="container">

            <h1 class="text-center">Categori Foto</h1>
            <p class="text-center">Abadikan momen terindah anda</p>

            <div class="row mt-5">
                {{-- Categori Start --}}
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="/home-categoris"
                            class="list-group-item d-flex justify-content-between align-items-center active">
                            All
                        </a>
                        @foreach ($categoris as $categori)
                            <a href="/categori-detail/{{ $categori->id }}"
                                class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $categori->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                {{-- Categori End --}}

                <div class="col-lg-9 d-flex flex-wrap justify-content-center">
                    @foreach ($fotos as $foto)
                        <div class="d-flex flex-column">
                            <div class="m-2 col-lg-10">
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

                    {{ $fotos->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
