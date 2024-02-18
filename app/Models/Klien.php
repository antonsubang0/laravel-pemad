<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'alamat',
        'hp',
        'ditambahkan_oleh',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'ditambahkan_oleh');
    }
    public function pekerjaan() {
        return $this->hasOne(Pekerjaan::class, 'klien_id', 'id');
    }
    public function tipepekerjaan()
    {
        // return $this->hasOneThrough(
        //     Pekerjaan::class,
        //     Tipepekerjaan::class,
        //     'id',
        //     'klien_id',
        //     'id',
        //     'id' );
        return $this->hasOneThrough(
            Tipepekerjaan::class,
            Pekerjaan::class,
            'klien_id',
            'id', // 1a
            'id',
            'tipepekerjaan_id' //1a
        );
    }
    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'klien_id', 'id');
    }
    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'by_klien_id', 'id');
    }
    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'by_klien_id', 'id');
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'by_klien_id', 'id');
    }
}
