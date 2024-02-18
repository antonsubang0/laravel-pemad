@extends('layout-auth')
@section('title')
Penawaran Proyek
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h4 class="text-center fw-bolder">Penawaran Proyek</h4>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">Oleh</th>
                    <th scope="col">Harga Proyek</th>
                    <th scope="col">Harga Penawaran</th>
                    <th scope="col">Penawar</th>
                    <th scope="col">Terima</th>
                    <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penawaran as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->proyek->proyek }}</td>
                    <td>{{ $item->tipekrj-> tipe}}</td>
                    <td>{{ $item->oleh->name }}</td>
                    <td>{{ $item->proyek->harga_proyek }}</td>
                    <td>{{ $item->harga_penawaran }}</td>
                    <td>{{ $item->yangnawar->name }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin Sudah di Bayar ?');" action="{{ route('updatetawar', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm mt-1 mt-xl-0 btn-warning">Terima</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deltawar', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm mt-1 mt-xl-0 btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $penawaran->links() }}
    </div>
</div>
@stop
