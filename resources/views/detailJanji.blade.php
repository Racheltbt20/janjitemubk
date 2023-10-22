@extends('template')
@section('title', 'Detail Janji')
@section('content')
    
<div class="container" style="max-width: 700px" id="formJanji">
    <!-- DETAIL JANJI SISWA -->
    <p class="fs-2 fw-bold text-center mt-3">Detail Janji</p>
    <div class="mt-3 mb-5 border border-2 border-primary rounded p-3">
        <form action="">
            {{-- <div class="form-floating mb-2 date" id="datepicker">
                <div class="form-floating">
                    <input type="text" value="{{ $detail->nama }}" readonly class="form-control" id="nama" placeholder="">
                    <label for="nama">Nama Siswa</label>
                </div>
            </div>
            <div class="form-floating mb-2 date" id="datepicker">
                <div class="form-floating">
                    <input type="text" value="{{ $detail->kelas }}" readonly class="form-control" id="kelas" placeholder="">
                    <label for="kelas">Kelas</label>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="form-floating col-3">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->id }}" readonly class="form-control" id="id" placeholder="">
                        <label for="id">Id Janji</label>
                    </div>
                </div>
                <div class="form-floating col-9 date" id="datepicker">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->tanggal->format('d-m-Y') }}" readonly class="form-control" id="tanggal" placeholder="">
                        <label for="tanggal">Tanggal</label>
                    </div>
                </div>
            </div>
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
            <div class="form-floating mb-3">
                <div class="form-floating">
                    <input type="text" value="{{ $detail->status }}" readonly class="form-control" id="status" placeholder="">
                    <label for="status">Status</label>
                </div>
            </div>
        </form>
    </div>
    <!-- END DETAIL JANJI SISWA -->

    <!-- TANGGAPAN GURU -->
    {{-- @if ($detail->status == 'ditolak' || $detail->status == 'diterima')        
        <p class="fs-2 fw-bold text-center mt-3">Respon Guru</p>
        <div class="mt-3 mb-5 border border-2 border-primary rounded p-3">
            <form action="">
                <div class="form-floating mb-2 date" id="datepicker">
                    <div class="form-floating">
                        <input type="text" value="{{ $detail->status }}" readonly class="form-control" id="nama" placeholder="">
                        <label for="nama">Status</label>
                    </div>
                </div>
                <div class="form-outline mb-2 text-start">
                    <label class="form-label" for="keterangan">Respon</label>
                    <textarea class="form-control" id="keterangan" rows="4" readonly>{{ $detail->respon }}</textarea>
                </div>
            </form>
        </div>
    @endif --}}
    <!-- END TANGGAPAN GURU -->
</div>

@endsection