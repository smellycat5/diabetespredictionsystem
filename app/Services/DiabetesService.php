<?php

namespace App\Services;

use App\Models\Diabetes;
use App\Models\UserProject;
use \Exception;

class DiabetesService
{
    public static function addRecord(array $request): bool
    {
        $log = Diabetes::create($request);

        // $id = auth()->user()->id;
        // $userproject = new UserProject;
        // $userproject->user_id = $id;
        // $userproject->project_id = $log->id;
        // $userproject->save();
        
        if (!is_object($log)) return false;
        return true;
    }
    public static function showRecord()
    {
    
            $rec = Diabetes::all();
            
            return response()->json([
                'records' => count($rec)
            ]);
    }

}