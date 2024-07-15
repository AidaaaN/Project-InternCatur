<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_masukModel extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_surat_msk';
    protected $fillable = ['nama_surat','tgl_masuk','perihal'];
    
}
