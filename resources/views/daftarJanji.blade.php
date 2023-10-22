@extends('template')
@section('title', 'Daftar Janji')
@section('content')

    <div class="container mt-5">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-10">
                <div class="card border-0">
                    <div class="card-header">
                        <p class="fs-2 fw-bold text-center">Daftar Janji</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->tanggal->format('d-m-Y') }}</td>
                                        <td>
                                            @if ($data->status == 'menunggu')
                                                <span class="badge rounded-pill text-bg-secondary">{{ $data->status }}</span>
                                            @elseif ($data->status == 'diterima')
                                                <span class="badge rounded-pill text-bg-success">{{ $data->status }}</span>
                                            @elseif ($data->status == 'ditolak')
                                                <span class="badge rounded-pill text-bg-danger">{{ $data->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('janji.detail', $data->id) }}" class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-info-circle"></i></a>
                                            @if ($data->status == 'menunggu')
                                                <form action="{{ route('janji.delete', $data->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href="" class="btn btn-sm btn-danger  rounded-pill" onclick="return confirm('Apakah anda yakin ingin menghapus data ini? ')"><i class="fas fa-solid fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $datas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
