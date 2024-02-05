@extends('layouts.main')

@section('title', 'Home')

@section('content')


    <div class="container-fluid py-5">
        <div class="container">

            <h1 class="text-center">Gallery Foto</h1>
            <p class="text-center">Abadikan momen terindah anda</p>

            <div class="my-5">
                <form action="" method="get">
                    @csrf
                    <div class="col-md-10 col-lg-4 offset-md-1 offset-lg-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Search or All"
                                aria-label="Button" autocomplete="off">
                            <button class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex flex-wrap justify-content-center">
                @if ($fotos->count())

                    @foreach ($fotos as $foto)
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

                    {{ $fotos->links() }}
                @else
                    <h3 class="text-center">Data belum ada</h3>
                @endif
            </div>
        </div>
    </div>

@endsection
