<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_keluarModel extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat_keluar';
    protected $fillable=['nama_surat','nomor_surat','tgl_keluar','tujuan_surat','jenis_surat','keterangan'];
    
}
