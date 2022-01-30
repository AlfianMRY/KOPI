<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAnggota extends Model
{
    use HasFactory;
    protected $table = 'master_anggota';
    protected $guarded = ['id'];

    /**
     * Get the user associated with the MasterAnggota
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aKeluarga()
    {
        return $this->hasOne(AnggotaKeluarga::class, 'anggota_id', 'id');
    }
}
