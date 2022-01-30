<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;
    protected $table = 'anggota_keluarga';
    protected $guarded = ['id'];

    /**
     * Get the user associated with the AnggotaKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mKeluarga()
    {
        return $this->BelongsTo(MasterKeluarga::class);
    }
    /**
     * Get the user associated with the AnggotaKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mAnggota()
    {
        return $this->hasOne(MasterAnggota::class, 'id', 'anggota_id');
    }
}
