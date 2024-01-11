<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $credentials = $this->validateUpdateInput($request);
        $user = User::find($credentials['username']);
        $userPassword = $user->password;

        if(!Hash::check($credentials['password'], $userPassword))
        {
            return back()->withErrors(['password' => 'Invalid Password']);
        }

        if($request->hasFile('user_avatar')) {
            $this->processImage($request->file('user_avatar'));
            $imageFile = $this->retrieveProfilePicture(Auth::user()->username);
            $imagePath = $this->formStoreableImagePath($imageFile);
            $user->profile_picture = $imagePath;
        }
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];

        if($user->role === 'LEC') {
            $user->description = $credentials['description'];
        }
        $user->save();

        $message = ['success' => 'Succesfully updated user!'];
        return redirect(route('profile.get'))->with($message);
    }

    private function validateUpdateInput(Request $request): array
    {
        $credentialsUser = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $credentialsUser;

        if(Auth::user()->role === 'LEC') {
            $credentialsLecturer = $request->validate([
                'description' => 'required'
            ]);
            $credentials = array_merge($credentialsUser, $credentialsLecturer);
        }
        return $credentials;
    }

    private function processImage(UploadedFile $image): void
    {
        $imageName = time() . "_" . Auth::user()->username . "." . $image->extension();

        $imageFile = $this->retrieveProfilePicture(Auth::user()->username);

        if($imageFile) {
            Storage::disk('public')->delete($imageFile);
        }
        Storage::disk('public')->putFileAs('profile_picture', $image, $imageName);
    }

    // Return the name of the file
    private function retrieveProfilePicture(string $username): string | null
    {
        $imageFiles = Storage::disk('public')->allFiles('profile_picture');
        foreach($imageFiles as $imageFile) {
            if(Str::contains($imageFile, $username))
            {
                return $imageFile;
            }
        }
        return null;
    }

    private function formStoreableImagePath(string $path): string
    {
        $prefix = "storage/";
        return $prefix . $path;
    }
}
