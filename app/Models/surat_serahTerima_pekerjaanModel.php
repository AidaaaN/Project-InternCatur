<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_serahTerima_pekerjaanModel extends Model
{
    use HasFactory;
    protected $table='surat_serahterima_pekerjaan';
    protected $primaryKey = 'id_surat_serahterima_pekerjaan';
    protected $fillable = ['kode_surat','isi_surat'];
}
