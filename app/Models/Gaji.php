<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gaji extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'gajis';

    protected $primaryKey = 'gaji_id';

    public function pegawai(): BelongsTo 
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id');    
    }

    public function posisi(): BelongsTo 
    {
        return $this->belongsTo(Posisi::class,'posisi_id');    
    }
}
