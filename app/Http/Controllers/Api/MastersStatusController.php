<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MastersStatus;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Prefix;
use TaliumAbstract\Attributes\Model;
use TaliumAbstract\Attributes\Service;
use TaliumAbstract\Attributes\StaticMethodRules;
use TaliumAbstract\Trait\AutoCrudApi;

#[Prefix("api/status")]
#[Middleware("api")]
#[StaticMethodRules(MastersStatus::class)]
#[Model(MastersStatus::class)]
class MastersStatusController extends Controller
{
    use AutoCrudApi;
}
