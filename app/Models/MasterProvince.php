<?php

/**
 * provinsi
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProvince extends Model
{
    use HasFactory;

    public function districts()
    {
        return $this->hasMany(MasterDistrict::class);
    }
}
