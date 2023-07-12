<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;


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

    public function download()
    {
        $logFilePath = storage_path('logs/custom.log');

        // Vérifier si le fichier existe
        if (Storage::exists($logFilePath)) {
            // Récupérer le nom du fichier
            $fileName = basename($logFilePath);

            // Télécharger le fichier
            return Storage::download($logFilePath, $fileName);
        }

        // Gérer le cas où le fichier n'existe pas
        return redirect()->back()->with('error', 'Le fichier de logs est introuvable.');
    }

}


