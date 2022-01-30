<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKeluarga extends Model
{
    use HasFactory;
    protected $table = 'master_keluarga';
    protected $guarded = ['id'];

    public function aKeluarga()
    {
        return $this->hasOne(AnggotaKeluarga::class);
    }
}
