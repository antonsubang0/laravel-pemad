@extends('layout-auth')
@section('title')
Edit Info Perusahaan
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Edit Info Perusahaan</h4>
        <a href="{{ route('perusahaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('perusahaan.update', $klien->id) }}" method="post" enctype="multipart/form-data">
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
                <label class="font-weight-bold">Perusahaan</label>
                <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" value="{{ old('perusahaan', $klien->perusahaan ? $klien->perusahaan->nama_perusahaan : '') }}" placeholder="Masukkan Nama Perusahaan">
                <!-- error message untuk title -->
                @error('perusahaan')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Bank</label>
                <input type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{ old('bank', $klien->perusahaan ? $klien->perusahaan->bank : '' ) }}" placeholder="Masukkan Bank">
                <!-- error message untuk title -->
                @error('bank')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Rekening</label>
                <input type="text" class="form-control @error('rekening') is-invalid @enderror" name="rekening" value="{{ old('rekening', $klien->perusahaan ? $klien->perusahaan->rekening : '') }}" placeholder="Masukkan Pekerjaan">
                <!-- error message untuk title -->
                @error('rekening')
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
