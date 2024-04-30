<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function showFile(Request $request)
    {
        $request->validate([
            'image' => 'image'
        ]);

        $files = Storage::disk('public')->allFiles('course');
        foreach($files as $file)
        {
            if(Str::contains($file, '2'))
            {
                $profile_picture = Storage::disk('public')->get($file);
                break;
            }
        }
//        if($request->hasFile('image')) {
//            $image = $request->file('image');
//            $imageName = time() . "_" . $image->getClientOriginalName();
//            $imagePath = $image->storeAs('uploads', $imageName, 'public');
//
//            $image->move('uploads', $image->getClientOriginalName());
//        }
        return back()->with(['image' => base64_encode($profile_picture)])->withHeaders(['Content-Type' => 'image/jpeg']);
    }
}
