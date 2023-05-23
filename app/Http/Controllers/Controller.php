<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function logAction(Request $request, string $action)
    {
        Log::channel('crud')->info('Action CRUD', [
            'method' => $request->getMethod(),
            'url' => $request->fullUrl(),
            'action' => $action,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }

}

