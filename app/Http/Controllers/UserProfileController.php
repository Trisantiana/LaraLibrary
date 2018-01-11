<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
use Auth;
use Image;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {



        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/images/' .$fileName);
            Image::make($avatar)->resize(300, 300)->save($path);

            $user = Auth::user();
            $user->avatar = $fileName;
            $user->save();
        }
         return view('user.profile', ['user' => Auth::user()]);
    }
}
