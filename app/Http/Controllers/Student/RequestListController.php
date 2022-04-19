<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Alumini;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestListController extends Controller
{
    public function ProjectRequestDetails()
    {
        $profile = $this->profiledata();
        $ProjectRequest = $this->ProjectRequest();
        $AluminiData = $this->AluminiData();

        return view('Student.requestlist',compact('profile','ProjectRequest','AluminiData'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function ProjectRequest()
    {
        $StudentData = Student::where('UserId_fk','=',Auth::user()->userId)->first();

        $ProjectRequest = ProjectRequest::join('aluminis','project_requests.aluminiId_fk','=','aluminis.aluminiId')
                                        ->join('projects','project_requests.projectId_fk','=','projects.projectId')
                                        ->where('project_requests.studentsId_fk','=',$StudentData->studentsId)
                                        ->get();
        return $ProjectRequest;
    }

    public function AluminiData()
    {
        $StudentData = Student::where('UserId_fk','=',Auth::user()->userId)->first();

        $AluminiData = Alumini::join('users','aluminis.UserId_fk','=','users.userId')
                                ->where('aluminis.departmentId_fk','=',$StudentData->departmentId_fk)
                                ->get();

        return $AluminiData;
    }
}
