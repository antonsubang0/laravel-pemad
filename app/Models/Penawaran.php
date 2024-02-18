<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'proyek_id',
        'harga_penawaran',
        'by_klien_id',
    ];
    public function proyek()
    {
        return $this->hasOne(Proyek::class, 'id', 'proyek_id');
    }
    public function oleh() {
        return $this->hasOneThrough(
            Klien::class,
            Proyek::class,
            'id', //1b
            'id', // 1a
            'proyek_id', //1b
            'by_klien_id' //1a
        );
    }
    public function tipekrj() {
        return $this->hasOneThrough(
            Tipepekerjaan::class,
            Proyek::class,
            'id', //1b
            'id', // 1a
            'proyek_id', //1b
            'tipepekerjaan_id' //1a
        );
    }
    public function yangnawar()
    {
        return $this->hasOne(Klien::class, 'id', 'by_klien_id');
    }
}
