@extends('layout-auth')
@section('title')
Perkerjaan Utama
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
        <h4 class="text-center fw-bolder">Perkerjaan Utama</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pekerjaan as $pekerj)
                <tr>
                    <td>{{ $pekerj->name }}</td>
                    <td>{!! $pekerj->tipepekerjaan == null ? 'Belum diisi' : $pekerj->tipepekerjaan->tipe !!}</td>
                    <td>{!! $pekerj->pekerjaan == null ? 'Belum diisi' : $pekerj->pekerjaan->pekerjaan !!}</td>
                    <td class="text-center">
                        <a href="{{ route('pekerjaan.edit', $pekerj->id) }}" class="btn btn-sm mt-1 mt-xl-0 btn-primary">EDIT</a>
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
        {{ $pekerjaan->links() }}
    </div>
</div>
@stop
