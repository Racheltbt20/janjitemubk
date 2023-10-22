<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FONT AWESOME -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS BOOTSTRAP -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Registrasi</title>
</head>

<body>

    <!-- CONTENT -->
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <h3 class="mb-5 text-center">Registrasi</h3>
                            <form action="{{ route('registrasi.store') }}" method="post">
                                @csrf
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" id="name" name="nama" class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}" placeholder="">
                                        <label for="nama">Nama</label>
                                        @error('nama')
                                        <div class="invalid-feedback justify-content-start">
                                            {{ $message }}
                                          </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4 ">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required name="password" placeholder="">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="row">
                                        <div class="form-check col-6 d-flex justify-content-center">
                                            <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="siswa" value="siswa" onclick="javascript:roleCheck();">
                                            <label class="form-check-label" for="role">Siswa</label>
                                        </div>
                                        <div class="form-check col-6 d-flex justify-content-center">
                                            <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="guru" value="guru" onclick="javascript:roleCheck();">
                                            <label class="form-check-label" for="role">Guru</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Password Guru -->
                                <div class="form-outline mb-4" style="display:none" id="passguru">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('pwguru') is-invalid @enderror" id="pwguru" name="pwguru" placeholder="">
                                        <label for="pwguru">Password Guru</label>
                                        @error('pwguru')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid mb-2">
                                    <button class="btn btn-primary btn-lg " type="submit">Registrasi</button>
                                </div>
                                <div>
                                    <p class="mb-0 text-center">Sudah punya akun? 
                                        <a href="{{ route('login.index') }}" class="fw-bold link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Login</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->

    <!-- JS BOOTSTRAP -->
    <script>
        function roleCheck() {
            if (document.getElementById('guru').checked) {
                document.getElementById('passguru').style.display = 'block';
            } else {
                document.getElementById('passguru').style.display = 'none';
            }
        }
    </script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
