<?php

namespace App\Http\Controllers\Student;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function studentJobVacancyDetails()
    {
        $profile = $this->profiledata();
        $jobData = $this->jobData();

        return view('Student.joblist',compact('profile','jobData'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function jobData()
    {
        $jobData = Jobs::get();

        return $jobData;
    }

}
