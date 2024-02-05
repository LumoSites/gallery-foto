<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery Foto | Registrasi</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        .kotak {
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body>


    <main class="container-fluid">
        <div class="container d-flex justify-content-center align-items-center kotak ">
            <div class="col-lg-6 border p-5">
                <h1 class="text-center">Silahkan Registrasi</h1>
                <form action="/registrasi" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                            class="form-control @error('first_name')
                            is-invalid
                        @enderror"
                            autocomplete="off" required>
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                            class="form-control" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="form-control @error('username')
                            is-invalid
                        @enderror"
                            autocomplete="off" required>
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror"
                            autocomplete="off" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                        <button type="reset" class="btn btn-danger"
                            onclick="return confirm('Are your sure?')">Reset</button>
                    </div>

                </form>
                <p class="text-center">sudah punya akun? silahkan <a href="/login">login</a></p>
            </div>
        </div>
    </main>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
