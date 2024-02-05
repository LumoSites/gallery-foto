@extends('dashboard.layouts.main')

@section('title', 'Add Foto')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Add data foto</h2>

            <div class="col-lg-6 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" autofocus value="{{ old('title') }}"
                            autocomplete="off" required>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categori" class="form-label">Categori</label>
                        <select name="categori_id" id="categori"
                            class="form-control @error('categori_id') is-invalid @enderror">
                            @foreach ($categoris as $categori)
                                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                            @endforeach
                        </select>
                        @error('categori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
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
                        <input type="hidden" id="description" name="description" value="{{ old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-danger"
                            onclick="return confirm('Are your sure?')">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
