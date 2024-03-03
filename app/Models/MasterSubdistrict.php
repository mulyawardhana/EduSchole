<?php

/**
 * Kecamatan
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSubdistrict extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo(MasterDistrict::class, 'masters_district_id');
    }

    public function villages()
    {
        return $this->hasMany(MasterVillage::class);
    }
}
