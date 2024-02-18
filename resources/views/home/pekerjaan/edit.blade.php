@extends('layout-auth')
@section('title')
Edit Pekerjaan Klien
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Edit Pekerjaan Klien</h4>
        <a href="{{ route('pekerjaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('pekerjaan.update', $klien->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $klien->name ) }}" placeholder="Masukkan Nama" disabled>
                <!-- error message untuk title -->
                @error('name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">HP</label>
                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp', $klien->hp) }}" placeholder="Masukkan HP" disabled>
                <!-- error message untuk title -->
                @error('hp')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $klien->alamat) }}" placeholder="Masukkan Alamat" disabled>
                <!-- error message untuk title -->
                @error('alamat')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Tipe Pekerjaan</label>
                <select name="tipepekerjaan_id" class="form-select" aria-label="Default select example">
                    @foreach ($tipe as $a)
                        <option value="{{$a->id}}" {{$klien->pekerjaan ? $klien->pekerjaan->tipepekerjaan_id == $a->id ? 'selected' : '' : ''}}>{{$a->tipe}}</option>
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
                <label class="font-weight-bold">Pekerjaan</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan', $klien->pekerjaan ? $klien->pekerjaan->pekerjaan : '') }}" placeholder="Masukkan Pekerjaan">
                <!-- error message untuk title -->
                @error('pekerjaan')
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
