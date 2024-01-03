<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function search(Request $request)
    {
        try {
            $query = $request->get('query');
            $results = Course::where('name', 'like', '%' . $query . '%')->get();
            return response()->json($results);
        } catch (Exception $e) {
            // Log the exception for debugging
            dd($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
