@extends('layout-auth')
@section('title')
Permintaan Proyek
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
        <h4 class="text-center fw-bolder">Permintaan Proyek</h4>
        <a href="{{ route('permintaan.create') }}" class="btn btn-md btn-success mb-3">Tambah Permintaan</a>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">By</th>
                    <th scope="col">Terima</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permintaan as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->tipekrj->tipe !!}</td>
                    <td>{!! $item->klien->name !!}</td>
                    <td>
                        <a href="{{ route('permintaan.terima', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-dark">TERIMA</a>
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('permintaan.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('permintaan.show', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-dark">SHOW</a>
                            <a href="{{ route('permintaan.edit', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm mt-1 mt-xl-0 btn-danger">HAPUS</button>
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
        {{ $permintaan->links() }}
    </div>
</div>
@stop
