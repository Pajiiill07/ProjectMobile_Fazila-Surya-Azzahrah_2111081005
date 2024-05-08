<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'laporans';

    protected $primaryKey = 'laporan_id';

    protected $fillable = [
        'pegawai_id',
        'tanggal_laporan',
        'tanggal_submit',
        'judul_laporan',
        'isi_laporan',
    ];

    public function pegawai(): BelongsTo 
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id');    
    }
}
