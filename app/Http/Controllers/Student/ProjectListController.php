<?php

namespace App\Http\Controllers\Student;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Alumini;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectListController extends Controller
{
    public function ProjectDetails()
    {
        $profile = $this->profiledata();
        $projectDetail = $this->projectDetail();
        $replayStatus = $this->replayStatus();

        return view('Student.projectlist',compact('profile','projectDetail','replayStatus'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function projectDetail()
    {
        $StudentData = Student::where('UserId_fk','=',Auth::user()->userId)->first();

        $projectDetail = Alumini::join('users','aluminis.UserId_fk','=','users.userId')
                                ->join('projects','aluminis.aluminiId','=','projects.aluminiId_fk')
                                ->join('departments','aluminis.departmentId_fk','=','departments.departmentId')
                                ->where('aluminis.departmentId_fk','=',$StudentData->departmentId_fk)->get();

        return $projectDetail;
    }

    public function replayStatus()
    {
        $StudentData = Student::where('UserId_fk','=',Auth::user()->userId)->first();

        $replayStatus = ProjectRequest::where('studentsId_fk','=',$StudentData->studentsId)->get();

        return $replayStatus;
    }

    public function RequestDetails(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $StudentData = Student::where('UserId_fk','=',Auth::user()->userId)->first();

        $ProjectRequest = new ProjectRequest;

        $ProjectRequest->aluminiId_fk = $request->aluminiId;
        $ProjectRequest->studentsId_fk = $StudentData->studentsId;
        $ProjectRequest->projectId_fk = $request->projectId;
        $ProjectRequest->requestInfo = $request->requestInfo;
        $ProjectRequest->replayStatus = 1;
        $ProjectRequest->created_at = $Date;
        $ProjectRequest->updated_at = $Date;
        $ProjectRequest->save();

        return redirect()->back()->with(['status'=>'Request Sent Successfully']);
    }
}
