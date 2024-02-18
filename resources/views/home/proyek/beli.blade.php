@extends('layout-auth')
@section('title')
Beli Proyek
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Beli Proyek</h4>
        <a href="{{ route('proyek.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('proyekstore', $proyek->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control" name="proyek" value="{{ $proyek->proyek }}" placeholder="Masukkan Nama Proyek" disabled>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Harga</label>
                <input type="number" class="form-control" name="harga_proyek" value="{{$proyek->harga_proyek }}" placeholder="Masukkan Harga" disabled>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Tipe Pekerjaan</label>
                <input type="text" class="form-control" name="tipepekerjaan_id" value="{{ $proyek->tipekrj->tipe }}" placeholder="Masukkan Harga" disabled>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Pembeli</label>
                <select name="by_klien_id" class="form-select" aria-label="Default select example">
                    @foreach ($klien as $b)
                        <option value="{{$b->id}}" {{ $b->id == $proyek->by_klien_id ? 'selected' : '' }}>{{$b->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-md btn-primary">Beli</button>
            </div>
        </form>
    </div>
</div>
@stop
