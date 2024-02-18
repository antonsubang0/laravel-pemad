@extends('layout-auth')
@section('title')
Detail Klien
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Detail Klien</h4>
        <a href="{{ url('home/klien') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <h5>Data Basic</h5>
        <table class="mb-3 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ditambahkan Oleh</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $klien->name }}</td>
                    <td>{!! $klien->hp !!}</td>
                    <td>{!! $klien->alamat !!}</td>
                    <td>{{ $klien->user->name }}</td>
                </tr>
            </tbody>
        </table>
        <h5>Data Pekerjaan</h5>
        <table class="mb-3 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $klien->name }}</td>
                    <td>{!! $klien->tipepekerjaan == null ? 'Belum diisi' : $klien->tipepekerjaan->tipe !!}</td>
                    <td>{!! $klien->pekerjaan == null ? 'Belum diisi' : $klien->pekerjaan->pekerjaan !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop
