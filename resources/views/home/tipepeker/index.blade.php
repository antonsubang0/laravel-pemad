@extends('layout-auth')
@section('title')
List Tipe Pekerja
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
        <h4 class="text-center fw-bolder">List Tipe Pekerja</h4>
        <a href="{{ route('tipepekerjaan.create') }}" class="btn btn-md btn-success mb-3">Tambah Type</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tipe Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tipes as $tipe)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $tipe->tipe }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tipepekerjaan.destroy', $tipe->id) }}" method="POST">
                            <a href="{{ route('tipepekerjaan.edit', $tipe->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-primary">EDIT</a>
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
        {{ $tipes->links() }}
    </div>
</div>
@stop
