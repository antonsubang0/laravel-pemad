<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pekerjaan',
        'tipepekerjaan_id',
        'klien_id',
    ];
}
