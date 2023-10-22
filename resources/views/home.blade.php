@extends('template')
@section('title', 'Home')
@section('content')

    <!-- HOME -->
    <div class="card my-5 mx-auto border-0" style="max-width: 1000px;">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="ava-img/samoyed.jpg" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
            </div>
            <div class="col-md-7 my-auto">
                <div class="card-body text-center bg-transparent">
                    <p class="fs-2 fw-bold">Buat Janji Temu Dengan Guru BK</p>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet inventore delectus id accusamus
                        tempore accusantium nam deleniti laboriosam earum, at a velit repudiandae ipsum dolores, ratione qui
                        ut debitis impedit.
                    </p>
                    <a href="#formJanji" type="button" class="btn btn-outline-dark btn-lg">Buat Janji</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END HOME -->

    <!-- FORM -->
    <div class="container mt-5" style="max-width: 700px" id="formJanji">
        <p class="fs-2 fw-bold text-center mt-5">Buat Janji</p>
        <div class="mt-3 mb-5 border border-2 border-primary rounded p-3">
            <form action="{{ route('janji.store') }}" method="post">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="row mt-4 mb-4">
                    <div class="col-8">
                        <div class="form-floating">
                            <input type="text" name="nama" value="{{ auth()->user()->nama }}" readonly class="form-control" id="nama" placeholder="">
                            <label for="nama">Nama Siswa</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas" aria-label="kelas">
                            <option selected disabled>Kelas</option>
                            <option value="10 RPL 1">10 RPL 1</option>
                            <option value="11 RPL 1">11 RPL 1</option>
                            <option value="12 RPL 1">12 RPL 1</option>
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Date input -->
                <div class="form-floating mb-4 date" id="datepicker">
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" min="{new Date().toISOString().split('T')[0]}" id="tanggal" placeholder="">
                    <label for="tanggal">Tanggal</label>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Guru input -->
                <div class="form-outline mb-4">
                    <select class="form-select @error('guru') is-invalid @enderror" id="guru" name="guru" aria-label="guru">
                        <option selected disabled>Nama Guru</option>
                        @foreach ($gurus as $guru)
                            <option value="{{ $guru->nama }}">{{ $guru->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4 text-start">
                    <select class="form-select @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" aria-label="keterangan">
                        <option selected disabled>Keterangan</option>
                        <option value="masalah kelas">masalah kelas</option>
                        <option value="masalah pertemanan">masalah pertemanan</option>
                        <option value="masalah lain">masalah lain</option>
                    </select>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary btn-block mb-4">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END FORM -->

@endsection
