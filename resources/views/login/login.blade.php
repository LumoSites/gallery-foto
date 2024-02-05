<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery Foto | Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        .kotak {
            height: 100vh;
            width: 100%;
        }

        .bulet {
            border-radius: 9px;
        }
    </style>
</head>

<body>

    <main class="container-fluid">
        <div class="container kotak d-flex justify-content-center align-items-center">
            <div class="col-lg-6 border p-5 bulet">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif


                <h1 class="text-center">Selamat Login</h1>
                <form action="/login" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" autofocus value="{{ old('username') }}"
                            class="form-control @error('username')
                            is-invalid
                        @enderror"
                            required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-25">Login</button>
                    </div>

                </form>
                <p class="text-center">belum punya akun? silahkan <a href="/registrasi">registrasi</a></p>
            </div>
        </div>
    </main>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
