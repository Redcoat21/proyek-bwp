<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showFile(Request $request)
    {
        $request->validate([
            'image' => 'image'
        ]);

        $images = $request->input('image');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "_" . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');

            $image->move('uploads', $image->getClientOriginalName());
        }

        return back();
    }
}
