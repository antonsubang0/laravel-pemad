@extends('layout-auth')
@section('title')
Info Perusahaan
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
        <h4 class="text-center fw-bolder">Info Perusahaan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama Klien</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Bank</th>
                    <th scope="col">Rekening</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($perusahaan as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{!! $item->perusahaan == null ? 'Belum diisi' : $item->perusahaan->nama_perusahaan !!}</td>
                    <td>{!! $item->perusahaan == null ? 'Belum diisi' : $item->perusahaan->bank !!}</td>
                    <td>{!! $item->perusahaan == null ? 'Belum diisi' : $item->perusahaan->rekening !!}</td>
                    <td class="text-center">
                        <a href="{{ route('perusahaan.edit', $item->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-primary">EDIT</a>
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
        {{ $perusahaan->links() }}
    </div>
</div>
@stop
