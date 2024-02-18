@extends('layout-auth')
@section('title')
Edit Klien
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Edit Klien</h4>
        <a href="{{ url('home/klien') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('klien.update', $klien->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $klien->name ) }}" placeholder="Masukkan Nama">
                <!-- error message untuk title -->
                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">HP</label>
                <input type="number" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp', $klien->hp) }}" placeholder="Masukkan HP">
                <!-- error message untuk title -->
                @error('hp')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $klien->alamat) }}" placeholder="Masukkan Alamat">
                <!-- error message untuk title -->
                @error('alamat')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-md btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>
@stop
