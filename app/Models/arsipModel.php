<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsipModel extends Model
{
    use HasFactory;
    protected $table='arsip';
    protected $primaryKey='id_arsip';
    protected $fillable=['nama_surat','tgl_surat'];
    
}
