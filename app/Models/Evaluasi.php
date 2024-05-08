<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluasi extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'evaluasis';

    protected $primaryKey = 'evaluasi_id';

    public function pegawai(): BelongsTo 
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id');    
    }
}
