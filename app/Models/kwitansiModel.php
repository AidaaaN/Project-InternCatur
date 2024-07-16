<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kwitansiModel extends Model
{
    use HasFactory;
    protected $table = 'kwitansi';
    protected $primaryKey = 'id_kwitansi';
    protected $fillable = ['nama_penerima','nominal','tanggal_kwitansi'];
    
}
