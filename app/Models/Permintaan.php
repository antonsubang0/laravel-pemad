<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'proyek',
        'tipepekerjaan_id',
        'harga_proyek',
        'by_klien_id'
    ];
    public function klien()
    {
        return $this->hasOne(Klien::class, 'id', 'by_klien_id');
    }
    public function tipekrj()
    {
        return $this->hasOne(Tipepekerjaan::class, 'id', 'tipepekerjaan_id');
    }
}
