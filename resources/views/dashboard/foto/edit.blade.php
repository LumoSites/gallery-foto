@extends('dashboard.layouts.main')

@section('title', 'Edit Foto')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Halaman edit foto {{ $foto->title }}</h2>

            <div class="col-lg-6 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" value="{{ $foto->title }}"
                            autocomplete="off" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label for="categori" class="form-label">Categori</label>
                        <select name="categori_id" id="categori" class="form-control">
                            <option value="{{ $foto->categori_id }}">{{ $foto->categori->name }}</option>
                            @foreach ($categoris as $categori)
                                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imageOld" class="form-label">Foto old</label>
                        <div class="col-lg-5 offset-lg-3">
                            @if ($foto->foto)
                                <input type="hidden" name="oldImage" value="{{ $foto->foto }}">
                                <img src="{{ asset('storage/photo/' . $foto->foto) }}" class="img-thumbnail"
                                    alt="{{ $foto->title }}">
                            @else
                                <input type="hidden" name="oldImage" value="">
                                <img src="{{ asset('img/notFound.jpeg') }}" class="img-thumbnail"
                                    alt="{{ $foto->title }}">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto new <span class="text-danger">*option</span></label>
                        <input type="file" name="img" id="foto"
                            class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="hidden" id="description" name="description" value="{{ $foto->description }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/fotos" class="btn btn-primary">Back</a>
                        <button type="reset" class="btn btn-danger" onclick="return confirm('Are your sure?')">
                            Reset
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
