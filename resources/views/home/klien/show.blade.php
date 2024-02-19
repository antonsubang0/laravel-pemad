@extends('layout-auth')
@section('title')
Detail Klien
@stop
@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h4 class="text-center fw-bolder">Detail Klien</h4>
        <a href="{{ url('home/klien') }}" class="btn btn-md btn-warning mb-3">Kembali</a>
        <h5>Data Basic</h5>
        <table class="mb-3 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ditambahkan Oleh</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $klien->name }}</td>
                    <td>{!! $klien->hp !!}</td>
                    <td>{!! $klien->alamat !!}</td>
                    <td>{{ $klien->user->name }}</td>
                </tr>
            </tbody>
        </table>
        <h5>Data Pekerjaan</h5>
        <table class="mb-3 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tipe Pekerjaan</th>
                    <th scope="col">Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{!! $klien->tipepekerjaan == null ? 'Belum diisi' : $klien->tipepekerjaan->tipe !!}</td>
                    <td>{!! $klien->pekerjaan == null ? 'Belum diisi' : $klien->pekerjaan->pekerjaan !!}</td>
                </tr>
            </tbody>
        </table>
        <h5>Data Perusahaan</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Bank</th>
                    <th scope="col">Rekening</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{!! $klien->perusahaan == null ? 'Belum diisi' : $klien->perusahaan->nama_perusahaan !!}</td>
                    <td>{!! $klien->perusahaan == null ? 'Belum diisi' : $klien->perusahaan->bank !!}</td>
                    <td>{!! $klien->perusahaan == null ? 'Belum diisi' : $klien->perusahaan->rekening !!}</td>
                </tr>
            </tbody>
        </table>
        <h5>Data Proyek Klien</h5>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($klien->proyek as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->tipekrj->tipe !!}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <h5>Data Permintaan Klien</h5>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($klien->permintaan as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->tipekrj->tipe !!}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <h5>Data Pembelian Klien</h5>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">No. Invoice</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Harga Sebelumnya</th>
                    <th scope="col">Harga Final</th>
                    <th scope="col">Proyek Oleh</th>
                    <th scope="col">Status</th>
                    <th scope="col">HP</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($klien->pembelian as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->invoice }}</td>
                    <td>{{ $item->proyek->proyek }}</td>
                    <td>{{ $item->proyek->harga_proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->oleh->name !!}</td>
                    <td>{{ $item->status == 0 ? 'Belum dibayar' : 'Sudah dibayar' }}</td>
                    <td>{!! $item->klien->name !!} ({!! $item->klien->hp !!})</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <h5>Tagihan Klien</h5>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">No. Invoice</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Harga Sebelumnya</th>
                    <th scope="col">Harga Final</th>
                    <th scope="col">Proyek Oleh</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($klien->tagihan as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->invoice }}</td>
                    <td>{{ $item->proyek->proyek }}</td>
                    <td>{{ $item->proyek->harga_proyek }}</td>
                    <td>{!! $item->harga_proyek !!}</td>
                    <td>{!! $item->oleh->name !!}</td>
                    <td>{{ $item->status == 0 ? 'Belum dibayar' : 'Sudah dibayar' }}</td>
                    <td>{!! $item->klien->name !!} ({!! $item->klien->hp !!})</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop
