@extends('layout-auth')
@section('title')
Tambah Permintaan
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Tambah Permintaan</h4>
        <a href="{{ route('permintaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('permintaan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Nama Proyek</label>
                <input type="text" class="form-control @error('proyek') is-invalid @enderror" name="proyek" value="{{ old('proyek') }}" placeholder="Masukkan Nama Proyek">
                <!-- error message untuk title -->
                @error('proyek')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Harga</label>
                <input type="number" class="form-control @error('harga_proyek') is-invalid @enderror" name="harga_proyek" value="{{ old('harga_proyek') }}" placeholder="Masukkan Harga">
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
                        <option value="{{$a->id}}">{{$a->tipe}}</option>
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
                        <option value="{{$b->id}}">{{$b->name}}</option>
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
                <button type="reset" class="btn btn-md btn-success">Reset</button>
            </div>

        </form>
    </div>
</div>
@stop
