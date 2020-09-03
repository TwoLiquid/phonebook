<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\Transformers\TransformTrait;
use App\Support\Response\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lcobucci\JWT\Parser;

/**
 * Class BaseController.
 *
 * @package App\Http\Controllers\Api
 */
abstract class BaseController extends Controller
{
    use ApiResponseTrait;
    use TransformTrait;

    public function __construct()
    {
        return auth('api')->user();
    }
}
