<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable = [
        'proyek_id',
        'harga_proyek',
        'status',
        'by_klien_id',
        'invoice',
    ];
    public function proyek()
    {
        return $this->hasOne(Proyek::class, 'id', 'proyek_id');
    }
    public function klien()
    {
        return $this->hasOne(Klien::class, 'id', 'by_klien_id');
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
}
