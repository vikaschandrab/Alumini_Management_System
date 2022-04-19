<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $admin = $this->profiledata();
        return view('Admin.profile',compact('admin'));
    }

    public function profiledata()
    {
        $admin = User::where('userId','=', Auth::user()->userId)->first();

        return $admin;
    }

    public function updateProfile(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'profilePicture' => ['required','image','max:5000'],
        ]);

        $file = $request->file('profilePicture');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Auth::user()->phone;
        $filename = $fileName.'.'.$fileExtension;
        $file->move('img/admin/',$filename);

        $AddUsers = User::where('UserId','=', Auth::user()->userId)->first();
        $AddUsers->updated_at = $Date;
        $AddUsers->profilePicture=$filename;
        $AddUsers->save();

        return redirect()->back()->with(['status'=>'Profile Picture Updated Successfully']);
    }
}
