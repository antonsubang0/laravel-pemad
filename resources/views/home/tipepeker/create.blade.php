@extends('layout-auth')
@section('title')
Buat Tipe Pekerjaan
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Buat Tipe Pekerjaan</h4>
        <a href="{{ route('tipepekerjaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('tipepekerjaan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Tipe Pekerjaan</label>
                <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ old('tipe') }}" placeholder="Masukkan Tipe Pekerjaan">
                <!-- error message untuk title -->
                @error('tipe')
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
