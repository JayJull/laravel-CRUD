<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = []; // tanpa deklarasi
    protected $dates = ['created_at']; // menampilkan dd/mm/yy

    // protected $fillable = ['nama', 'alamat', 'prodi'] harus deklarasi
}
