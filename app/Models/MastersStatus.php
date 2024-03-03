<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lerouse\LaravelRepository\HasRepository;
use TaliumAbstract\Attributes\Table;
use TaliumAbstract\Trait\InjectModel;

#[Table("masters_status")]
class MastersStatus extends Model
{
    use HasFactory;
    use InjectModel;
    use HasRepository;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->Iject();
    }

    public static function rules()
    {
        return [
            "name" => "required",
            "description" => "nullable"
        ];
    }
}
