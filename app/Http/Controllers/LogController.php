<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;


class LogController extends Controller
{
    public function customLog()
    {
        $logContent = File::get(storage_path('logs/custom.log'));

        return view('logs.custom', compact('logContent'));
    }

    public function clear()
    {
        $logFilePath = storage_path('logs/custom.log');

        if (File::exists($logFilePath)) {
            File::put($logFilePath, '');
        }
        return redirect()->route('logs.custom')->with('success', 'Le fichier de logs a été vidé.');
    }
}


