@extends('layout-auth')
@section('title')
Detail Permintaan
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Detail Permintaan</h4>
        <a href="{{ route('permintaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <h5>Detail Permintaan</h5>
        <table class="mb-3 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $permintaan->proyek }}</td>
                    <td>{!! $permintaan->harga_proyek !!}</td>
                    <td>{!! $permintaan->tipekrj->tipe !!}</td>
                    <td>{!! $permintaan->klien->name !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop
