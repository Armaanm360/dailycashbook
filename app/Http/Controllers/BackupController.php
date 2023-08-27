<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function createAndDownloadBackup()
    {
        // Create a database backup using Laravel's built-in command
        Artisan::call('backup:run');

        // Get the path to the latest backup file
        $backupPath = storage_path('app' . DIRECTORY_SEPARATOR . 'backups' . DIRECTORY_SEPARATOR . Artisan::output());

        // Download the backup file
        return Storage::download($backupPath);
    }
}
