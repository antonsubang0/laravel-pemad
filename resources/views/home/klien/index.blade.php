@extends('layout-auth')
@section('title')
List Klien
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
        <h4 class="text-center fw-bolder">List Klien</h4>
        <a href="{{ url('home/klien/create') }}" class="btn btn-md btn-success mb-3">Tambah Klien</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kliens as $klien)
                <tr>
                    <td>{{ $klien->name }}</td>
                    <td>{!! $klien->hp !!}</td>
                    <td>{!! $klien->alamat !!}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('klien.destroy', $klien->id) }}" method="POST">
                            <a href="{{ route('klien.show', $klien->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-dark">SHOW</a>
                            <a href="{{ route('klien.edit', $klien->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm mt-1 mt-xl-0 btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $kliens->links() }}
    </div>
</div>
@stop
