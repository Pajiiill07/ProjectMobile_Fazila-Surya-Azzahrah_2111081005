<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'pegawais';

    protected $primaryKey = 'pegawai_id';

    protected $fillable = [
        'user_id',
        'posisi_id',
        'manager_id',
        'nama_lengkap',
        'no_hp',
        'email',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'foto_profile',
        'tanggal_mulai',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class,'user_id');    
    }

    public function posisi(): BelongsTo 
    {
        return $this->belongsTo(Posisi::class,'posisi_id');    
    }

    public function pegawai(): BelongsTo 
    {
        return $this->belongsTo(Pegawai::class,'manager_id');    
    }
}
