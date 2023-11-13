

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
    <title>Detail Janji</title>
</head>

<body>

    <!-- TOPBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- End Toggle button -->
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active fw-medium" href="{{ route('guru.index') }}">Daftar Janji</a>
                </div>
            </div>
            <!-- End Collapsible wrapper -->
            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                    id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('ava-img/samoyed.jpg') }}" class="rounded-circle" height="35"
                        alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item disabled">Hai, {{ auth()->user()->nama }}!</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" href="#">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End Avatar-->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- END TOPBAR -->

    <div class="container" style="max-width: 700px" id="formJanji">
        <!-- DETAIL JANJI SISWA -->
        <p class="fs-2 fw-bold text-center mt-3">Detail Janji</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('guru.index') }}">
                <button class="btn btn-outline-primary btn-block mb-4">kembali</button>
            </a>
        </div>
        <div class="mb-5 border border-2 border-primary rounded p-3">
            <form action="">
                <div class="row mb-3">
                    <div class="form-floating col-3" id="id">
                        <div class="form-floating">
                            <input type="text" value="{{ $detail->id }}" readonly class="form-control" id="id" placeholder="">
                            <label for="id">Id Janji</label>
                        </div>
                    </div>
                    <div class="form-floating col-9" id="datepicker">
                        <div class="form-floating">
                            <input type="text" value="{{ $detail->tanggal->format('d-m-Y') }}" readonly class="form-control" id="tanggal" placeholder="">
                            <label for="tanggal">Tanggal</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3 date" id="nama">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->nama }}" readonly class="form-control" id="nama" placeholder="">
                        <label for="nama">Nama Siswa</label>
                    </div>
                </div>
                {{-- <div class="form-floating mb-2 date">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->kelas }}" readonly class="form-control" id="kelas" placeholder="">
                        <label for="kelas">Kelas</label>
                    </div>
                </div> --}}
                {{-- <div class="form-outline mb-2">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->guru }}" readonly class="form-control" id="guru" placeholder="">
                        <label for="guru">Nama Guru</label>
                    </div>
                </div> --}}
                <div class="form-floating mb-3 text-start">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->keterangan }}" readonly class="form-control" id="guru" placeholder="">
                        <label for="keterangan">Keterangan</label>
                    </div>
                </div>
            </form>
        </div>
        <!-- END DETAIL JANJI SISWA -->
    
        <!-- TANGGAPAN GURU -->
        <p class="fs-2 fw-bold text-center mt-3">Respon Guru</p>
        <div class="mt-3 mb-5 border border-2 border-primary rounded p-3">
            @if ($detail->status == 'menunggu')
                <form action="{{ route('guru.respon', $detail->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" aria-label="status" required>
                            @if($detail->status == 'menunggu') {
                                <option selected disabled>Menunggu</option>
                            } @else {
                                <option selected disabled>Status</option>
                            }
                            @endif
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-outline mb-3 text-start">
                        <label class="form-label" for="respon">Respon</label>
                        <textarea class="form-control @error('respon') is-invalid @enderror" id="respon" rows="4" name="respon" required></textarea>
                        @error('respon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary btn-block">Kirim</button>
                    </div>
                </form>
            @else
                <form action="" >
                    <div class="form-floating mb-2 date" id="datepicker">
                        <div class="form-floating">
                            <input type="text" value="{{ $detail->status }}" readonly class="form-control" id="status" placeholder="">
                            <label for="status">Status</label>
                        </div>
                    </div>
                    <div class="form-outline mb-2 text-start">
                        <label class="form-label" for="keterangan">Respon</label>
                        <textarea class="form-control" id="keterangan" rows="4" readonly>{{ $detail->respon }}</textarea>
                    </div>
                </form>
            @endif
        </div>
        <!-- END TANGGAPAN GURU -->
    </div>

    <!-- JS BOOTSTRAP -->
    {{-- <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
