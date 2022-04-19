<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Alumini;
use Illuminate\Http\Request;
use App\Imports\AluminiImport;
use App\Http\Controllers\Controller;
use App\Imports\FileImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AluminiController extends Controller
{
    public function aluminiview()
    {
        $profile = $this->profile();
        $aluminiCount = $this->aluminiCount();
        $UnRegAluminiCount = $this->UnRegAluminiCount();
        $aluminiList = $this->aluminiList();
        $UnRegAlumini = $this->UnRegAlumini();
        return view('Admin.adminAlumini',compact('profile','aluminiCount','aluminiList','UnRegAluminiCount','UnRegAlumini'));
    }

    public function profile()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function aluminiCount()
    {
        $aluminiCount = User::where('status','=',1)->where('userType','=','ALUMINI')->count();

        return $aluminiCount;
    }

    public function UnRegAluminiCount()
    {
        $UnRegAluminiCount = User::where('status','=',0)->where('userType','=','ALUMINI')->count();

        return $UnRegAluminiCount;
    }

    public function UnRegAlumini()
    {
        $UnRegAlumini = User::where('status','=',0)->where('userType','=','ALUMINI')->get();

        return $UnRegAlumini;
    }

    public function aluminiList()
    {
        $aluminiList = Alumini::join('users','users.userId','=','aluminis.UserId_fk')
                            ->join('departments','departments.departmentId','=','aluminis.departmentId_fk')
                            ->join('projects','projects.aluminiId_fk','=','aluminis.aluminiId')
                            ->orderBy('aluminiId','DESC')
                            ->get();

        return $aluminiList;
    }

    public function fileImport(Request $request)
    {
        $request->validate([
            'aluminiDoc' => 'required|max:10000|mimes:xlsx,xls',
        ]);

        Excel::import(new FileImport,$request->file('aluminiDoc'));

        return redirect()->back()->with('status','Alumini Added Successfully');
    }
}
