<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_tandaTerimaModel extends Model
{
    use HasFactory;
    protected $table='surat_tandaterima';
    protected $primaryKey ='id_surat_tandaterima';
    protected $fillable =['kode_surat','isi_surat'];
}
