@extends('layout-auth')
@section('title')
Tagihan Proyek
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
        <h4 class="text-center fw-bolder">Tagihan Proyek</h4>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">No. Invoice</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Harga Sebelumnya</th>
                    <th scope="col">Harga Final</th>
                    <th scope="col">Proyek Oleh</th>
                    <th scope="col">Status</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tagihan as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->invoice }}</td>
                    <td>{{ $item->proyek->proyek }}</td>
                    <td>{{ $item->proyek->harga_proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->oleh->name !!}</td>
                    <td>{{ $item->status == 0 ? 'Belum dibayar' : 'Sudah dibayar' }}</td>
                    <td>{!! $item->klien->name !!} ({!! $item->klien->hp !!})</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin Sudah di Bayar ?');" action="{{ route('updatetagihan', $item->invoice) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm mt-1 mt-xl-0 btn-warning">Ubah Status Bayar</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deltagihan', $item->invoice) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm mt-1 mt-xl-0 btn-danger">Hapus Tagihan</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $tagihan->links() }}
    </div>
</div>
@stop
