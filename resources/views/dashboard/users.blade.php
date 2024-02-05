@extends('dashboard.layouts.main')

@section('title', 'Users')

@section('content')

    <section class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center">Selamat datang di halaman user</h2>

            <div class="my-4">
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
                            <th>username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count())

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <form action="/user-delete/{{ $user->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are your sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4" class="text-center">Belum ada data</td>
                        @endif
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </section>

@endsection
