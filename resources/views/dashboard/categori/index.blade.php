@extends('dashboard.layouts.main')

@section('title', 'Categori')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Selamat datang di halaman categori</h2>

            <div class="mb-3 mt-5">
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

            <div class="my-4">
                <a href="/categori-add" class="btn btn-primary">Add Data</a>
            </div>

            @if (session()->has('success'))
                <div class="col-lg-6 mx-auto my-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categoris->count())

                            @foreach ($categoris as $categori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $categori->name }}</td>
                                    <td>
                                        <a href="/categori-detail/{{ $categori->id }}"
                                            class="btn btn-success mb-2">Detail</a>
                                        <a href="/categori-edit/{{ $categori->id }}" class="btn btn-primary mb-2">Edit</a>
                                        <form action="/categori-delete/{{ $categori->id }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger mb-2"
                                                onclick="return confirm('Are your sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="3" class="text-center">Data belum ada</td>
                        @endif
                    </tbody>
                </table>

                {{ $categoris->links() }}
            </div>
        </div>
    </section>

@endsection
