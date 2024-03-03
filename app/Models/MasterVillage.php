<?php

/**
 * desa
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVillage extends Model
{
    use HasFactory;

    public function subdistrict()
    {
        return $this->belongsTo(MasterSubdistrict::class, 'masters_subdistrict_id');
    }
}
