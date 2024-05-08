<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'departments';
    protected $primaryKey = 'department_id';

    public function posisi()
    {
        return $this->hasMany(Posisi::class, 'posisi_id');
    }
}
