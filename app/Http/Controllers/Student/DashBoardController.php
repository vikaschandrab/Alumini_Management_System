<?php

namespace App\Http\Controllers\Student;

use App\Models\Jobs;
use App\Models\User;
use App\Models\Student;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function dashboardview()
    {
        $requestProjectCount = $this->requestProjectCount();
        $requestJobCount = $this->requestJobCount();
        $profile = $this->profile();

        return view('Student.student',compact('requestProjectCount','profile','requestJobCount'));
    }

    public function profile()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function requestProjectCount()
    {
        $studentsdepartment = Student::where('UserId_fk','=', Auth::user()->userId)->first();

        if($studentsdepartment)
        {
            $requestProjectCount = projects::where('departmentId_fk','=',$studentsdepartment->departmentId_fk)->count();
        }
        else
        {
            $requestProjectCount = 0;
        }

        return $requestProjectCount;
    }

    public function requestJobCount()
    {
        $requestJobCount = Jobs::count();

        return $requestJobCount;
    }
}
