<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumini;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        $admin = $this->profile();
        $alumini = $this->aluminiCount();
        $student = $this->studentCount();
        return view('Admin.admin',compact('admin','alumini','student'));
    }

    public function profile()
    {
        $admin = User::where('userId','=', Auth::user()->userId)->first();

        return $admin;
    }

    public function aluminiCount()
    {
        $alumini = Alumini::count();

        return $alumini;
    }

    public function studentCount()
    {
        $student = Student::count();

        return $student;
    }
}
