<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function search(Request $request)
    {
        try {
            $query = $request->get('query');
            $results = Course::where('name', 'like', '%' . $query . '%')->with('lecturers')->get();
            return response()->json($results);
        } catch (Exception $e) {
            // Log the exception for debugging
            dump($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function searchLecturer(Request $request)
    {
        try {
            $query = $request->get('query');

            $results = User::where('name', 'like', '%' . $query . '%')
                        ->where('role', 'LEC')
                        ->get();

            return response()->json($results);
        } catch (Exception $e) {
            // Log the exception for debugging
            dump($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}
