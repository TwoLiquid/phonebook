<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\Response\GeneralResponseTrait;
use App\Support\Transformers\TransformTrait;
use App\Support\Response\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lcobucci\JWT\Parser;

/**
 * Class BaseController.
 *
 * @package App\Http\Controllers\Dashboard
 */
abstract class BaseController extends Controller
{
    use GeneralResponseTrait;
    use TransformTrait;

    public function __construct()
    {
        return auth('dashboard')->user();
    }
}
