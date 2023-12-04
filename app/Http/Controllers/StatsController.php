<?php

namespace App\Http\Controllers;

use App\DatabaseConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function __construct()
    {
        // Use Laravel middleware for setting headers
        $this->middleware(function ($request, $next) {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type');
            header('Content-Type: application/json');

            return $next($request);
        });
    }

    public function connect()
    {
        $pdo = DatabaseConnection::connect();

        // Your code using $pdo goes here

        return response()->json(['message' => 'Connection successful']);
    }

    public function getGeneral()
    {
        $result = DB::select('SELECT * FROM statsEquipeGeneralGeneral');
        return response()->json($result);
    }

    public function getAttaque()
    {
        $result = DB::select('SELECT * FROM statsEquipeAttaqueGeneral');
        return response()->json($result);
    }

    public function getDefense()
    {
        $result = DB::select('SELECT * FROM statsEquipeDefenseGeneral');
        return response()->json($result);
    }

    public function getByPathGen($path)
    {
        switch ($path) {
            case 'general':
                $result = DB::select('SELECT * FROM statsEquipeGeneralGeneral');
                break;
            case 'domicile':
                $result = DB::select('SELECT * FROM statsEquipeGeneralDomicile');
                break;
            case 'exterieur':
                $result = DB::select('SELECT * FROM statsEquipeGeneralExterieur');
                break;
            default:
                // Handle the default case, e.g., return an error response
                break;
        }

        // You can return the result as JSON or modify the response accordingly
        return response()->json($result);
    }

    public function getByPathAtt($path)
    {
        switch ($path) {
            case 'general':
                $result = DB::select('SELECT * FROM statsEquipeAttaqueGeneral');
                break;
            case 'domicile':
                $result = DB::select('SELECT * FROM statsEquipeAttaqueDomicile');
                break;
            case 'exterieur':
                $result = DB::select('SELECT * FROM statsEquipeAttaqueExterieur');
                break;
            default:
                // Handle the default case, e.g., return an error response
                break;
        }

        // You can return the result as JSON or modify the response accordingly
        return response()->json($result);
    }
    
    public function getByPathDef($path)
    {
        switch ($path) {
            case 'general':
                $result = DB::select('SELECT * FROM statsEquipeDefenseGeneral');
                break;
            case 'domicile':
                $result = DB::select('SELECT * FROM statsEquipeDefenseDomicile');
                break;
            case 'exterieur':
                $result = DB::select('SELECT * FROM statsEquipeDefenseExterieur');
                break;
            default:
                // Handle the default case, e.g., return an error response
                break;
        }

        // You can return the result as JSON or modify the response accordingly
        return response()->json($result);
    }
}
