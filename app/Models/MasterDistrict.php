<?php

/**
 * Kabupaten
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDistrict extends Model
{
    use HasFactory;

    public function province()
    {
        return $this->belongsTo(MasterProvince::class, 'masters_province_id');
    }

    public function subdistricts()
    {
        return $this->hasMany(MasterSubdistrict::class);
    }
}
