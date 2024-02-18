@extends('layout-auth')
@section('title')
Edit Permintaan
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Edit Permintaan</h4>
        <a href="{{ route('permintaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('permintaan.update', $permintaan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control @error('proyek') is-invalid @enderror" name="proyek" value="{{ old('proyek', $permintaan->proyek) }}" placeholder="Masukkan Nama Proyek">
                <!-- error message untuk title -->
                @error('proyek')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Harga</label>
                <input type="number" class="form-control @error('harga_proyek') is-invalid @enderror" name="harga_proyek" value="{{ old('harga_proyek', $permintaan->harga_proyek) }}" placeholder="Masukkan Harga">
                <!-- error message untuk title -->
                @error('harga_proyek')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Tipe Pekerjaan</label>
                <select name="tipepekerjaan_id" class="form-select" aria-label="Default select example">
                    @foreach ($tipe as $a)
                        <option value="{{$a->id}}" {{ $a->id == $permintaan->tipepekerjaan_id ? 'selected' : ''}}>{{$a->tipe}}</option>
                    @endforeach
                </select>
                <!-- error message untuk title -->
                @error('tipepekerjaan_id')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Klien</label>
                <select name="by_klien_id" class="form-select" aria-label="Default select example">
                    @foreach ($klien as $b)
                        <option value="{{$b->id}}" {{ $b->id == $permintaan->by_klien_id ? 'selected' : '' }}>{{$b->name}}</option>
                    @endforeach
                </select>
                <!-- error message untuk title -->
                @error('by_klien_id')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
