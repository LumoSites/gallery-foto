@extends('dashboard.layouts.main')

@section('title', 'Add Categori')

@section('content')
    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Silahkan Masukkan Data</h2>

            <div class="col-lg-6 mx-auto">
                <form action="/categori-add" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                            autofocus value="{{ old('name') }}" autocomplete="off" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
