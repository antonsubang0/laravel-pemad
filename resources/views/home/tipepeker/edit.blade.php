@extends('layout-auth')
@section('title')
Edit Tipe Pekerjaan
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Edit Tipe Pekerjaan</h4>
        <a href="{{ route('tipepekerjaan.index') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <form action="{{ route('tipepekerjaan.update', $types->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="font-weight-bold">Tipe</label>
                <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ old('tipe', $types->tipe ) }}" placeholder="Masukkan Tipe Pekerjaan">
                <!-- error message untuk title -->
                @error('tipe')
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
