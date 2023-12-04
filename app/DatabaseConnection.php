<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseConnection extends Model
{
    public static function connect()
    {
        try {
            $pdo = DB::connection('pgsql')->getPdo();
            return $pdo;
        } catch (\Exception $e) {
            // Log the error
            Log::error('Database connection failed: ' . $e->getMessage());

            // Return a meaningful response
            return null; // Or handle the error as per your application's requirements
        }
    }
}
