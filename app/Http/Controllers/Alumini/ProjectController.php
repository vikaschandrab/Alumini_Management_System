<?php

namespace App\Http\Controllers\Alumini;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Alumini;
use App\Models\Projects;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function aluminiprojectdetails()
    {
        $profile = $this->profiledata();
        $Projectdetails = $this->Projectdetails();
        $fetchDepartment = $this->fetchDepartment();

        return view('Alumini.projectdetails',compact('profile','Projectdetails','fetchDepartment'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function Projectdetails()
    {
        $Projectdetails = Alumini::join('departments','departments.departmentId','=','aluminis.departmentId_fk')
                            ->join('projects','projects.aluminiId_fk','=','aluminis.aluminiId')
                            ->where('aluminis.UserId_fk','=', Auth::user()->userId)
                            ->first();

        return $Projectdetails;
    }

    public function fetchDepartment()
    {
        $fetchDepartment = Department::get();

        return $fetchDepartment;
    }

    public function addProjectDetails(Request $request)
    {

        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'title' => ['required'],
            'abstract' => ['required'],
            'regNo' => ['required'],
            'guide' => ['required'],
            'department' => ['required'],
            'start_datepicker' => ['required'],
            'achievements' => ['required'],
        ]);

            $aluminiProfile = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();

            if($aluminiProfile)
            {

                DB::table('aluminis')
                            ->where('UserId_fk','=',Auth::user()->userId)
                            ->update(array(
                                'regNumber' => $request->regNo,
                                'departmentId_fk' => $request->department,
                                'updated_at' => $Date
                            ));

                DB::table('projects')
                            ->where('aluminiId_fk','=',$aluminiProfile->aluminiId)
                            ->update(array(
                                'title' => $request->title,
                                'description' => $request->abstract,
                                'guide' => $request->guide,
                                'achievements' => $request->achievements,
                                'projectYear' => date('Y-m-d', strtotime($request->start_datepicker)),
                                'updated_at' => $Date
                            ));

            }
            else
            {

                $aluminiDetails = new Alumini;

                $aluminiDetails->UserId_fk = Auth::user()->userId;
                $aluminiDetails->regNumber = $request->regNo;
                $aluminiDetails->departmentId_fk = $request->department;
                $aluminiDetails->isActive = 1;
                $aluminiDetails->created_at = $Date;
                $aluminiDetails->updated_at = $Date;
                $aluminiDetails->save();


                $Projectdetails = new Projects;

                $Aluminifk = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();


                $Projectdetails->aluminiId_fk = $Aluminifk->aluminiId;
                $Projectdetails->title = $request->title;
                $Projectdetails->description = $request->abstract;
                $Projectdetails->guide = $request->guide;
                $Projectdetails->achievements = $request->achievements;
                $Projectdetails->projectYear = date('Y-m-d', strtotime($request->start_datepicker));
                $Projectdetails->departmentId_fk = $Aluminifk->departmentId_fk;
                $Projectdetails->created_at = $Date;
                $Projectdetails->updated_at = $Date;
                $Projectdetails->save();
            }


        return redirect()->back()->with(['status'=>'Project Details Updated Successfully']);
    }
}
