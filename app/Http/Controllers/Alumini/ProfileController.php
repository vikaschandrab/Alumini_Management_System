<?php

namespace App\Http\Controllers\Alumini;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Alumini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = $this->profiledata();
        $jobDetails = $this->jobDetails();

        return view('Alumini.profile',compact('profile','jobDetails'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function jobDetails()
    {
        $jobDetails = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();

        return $jobDetails;
    }

    public function addProfile(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'profilePicture' => ['required','image','max:5000'],
        ]);

        $file = $request->file('profilePicture');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Auth::user()->phone;
        $filename = $fileName.'.'.$fileExtension;
        $file->move('img/alumini/',$filename);

        $AddUsers = User::where('UserId','=', Auth::user()->userId)->first();
        $AddUsers->email = $request->aluminiEmail;
        $AddUsers->phone = $request->aluminiPhone;
        $AddUsers->updated_at = $Date;
        $AddUsers->profilePicture=$filename;
        $AddUsers->save();

        return redirect()->back()->with(['status'=>'Profile Updated Successfully']);
    }

    public function addJob(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $aluminiProfile = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();

        if($aluminiProfile)
            {
                DB::table('aluminis')
                            ->where('UserId_fk','=',Auth::user()->userId)
                            ->update(array(
                                'companyName' => $request->Company,
                                'jobDesignation' => $request->Designation,
                                'jobExperiance' => $request->Experience,
                                'updated_at' => $Date
                            ));

                return redirect()->back()->with(['status'=>'Job Details Updated Successfully']);
            }
        else
            {
                return redirect()->back()->with(['failure'=>'Please Updated Add Department and Registration Number Before Adding Job Details']);
            }
    }
}
