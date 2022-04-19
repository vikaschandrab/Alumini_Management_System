<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function studentview()
    {
        $profile = $this->profile();
        $studentCount = $this->studentCount();
        $UnRegStudentCount = $this->UnRegStudentCount();
        $studentList = $this->studentList();
        $unRegStudentsList = $this->unRegStudentsList();

        return view('Admin.student',compact('profile','studentCount','studentList','UnRegStudentCount','unRegStudentsList'));
    }

    public function profile()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function studentCount()
    {
        $studentCount = Student::count();

        return $studentCount;
    }

    public function UnRegStudentCount()
    {
        $UnRegStudentCount = User::where('status','=','0')->where('userType','=','STUDENT')->count();

        return $UnRegStudentCount;
    }

    public function studentList()
    {
        $studentList = Student::join('users','users.userId','=','students.UserId_fk')
                                ->join('departments','departments.departmentId','=','students.departmentId_fk')
                                ->orderBy('studentsId','DESC')
                                ->get();

        return $studentList;
    }

    public function unRegStudentsList()
    {
        $unRegStudentsList = User::where('status','=','0')->where('userType','=','STUDENT')->get();

        return $unRegStudentsList;
    }
}
