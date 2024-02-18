@extends('layout-auth')
@section('title')
Tambah Klien
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
    <h4 class="text-center fw-bolder">Tambah Klien</h4>
    <a href="{{ url('home/klien') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('klien.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                <!-- error message untuk title -->
                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">HP</label>
                <input type="number" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp') }}" placeholder="Masukkan HP">
                <!-- error message untuk title -->
                @error('hp')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                <!-- error message untuk title -->
                @error('alamat')
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
