@extends('layout-auth')
@section('title')
List Proyek
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
        <h4 class="text-center fw-bolder">List Proyek</h4>
        <a href="{{ route('proyek.create') }}" class="btn btn-md btn-success mb-3">Tambah Proyek</a>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">By</th>
                    <th scope="col">Beli</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proyeks as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->tipekrj->tipe !!}</td>
                    <td>{!! $item->klien->name !!}</td>
                    <td>
                        <a href="{{ route('proyekbeli', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-dark">BELI</a>
                        <a href="{{ route('tawarproyek', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-dark">TAWAR</a>
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('proyek.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('proyek.show', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-dark">SHOW</a>
                            <a href="{{ route('proyek.edit', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-primary">EDIT</a>
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
        {{ $proyeks->links() }}
    </div>
</div>
@stop
