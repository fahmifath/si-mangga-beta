<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDetil extends Model
{
    use HasFactory;

    protected $table = 'sub_detils'; // Nama tabel yang digunakan
    protected $fillable = ['sub_detil', 'detil_id', 'quantity', 'satuan','harga_satuan']; 

    public function detils()
    {
        return $this->belongsTo(Detil::class, 'detil_id');
    }
}
