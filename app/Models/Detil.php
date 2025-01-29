<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detil extends Model
{
    use HasFactory;

    protected $table = 'detils'; // Nama tabel yang digunakan
    protected $fillable = ['detil', 'kode']; // Kolom yang bisa diisi secara massal

    public function subdetils()
    {
        return $this->hasMany(SubDetil::class, 'detil_id');
    }
}
