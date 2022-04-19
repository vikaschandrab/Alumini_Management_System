<?php

namespace App\Http\Controllers\Alumini;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Alumini;
use App\Models\Student;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\ProjectRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectRequestController extends Controller
{
    public function aluminiProjectRequestDetails()
    {
        $profile = $this->profiledata();
        $fetchRequestDetails = $this->fetchRequestDetails();

        return view('Alumini.requestlist',compact('profile','fetchRequestDetails'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function fetchRequestDetails()
    {
        $aluminiProfile = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();

        if($aluminiProfile)
        {
            $fetchRequestDetails = Student::join('users','students.UserId_fk','=','users.userId')
                                            ->join('departments','students.departmentId_fk','=','departments.departmentId')
                                            ->join('project_requests','students.studentsId','=','project_requests.studentsId_fk')
                                            ->where('students.departmentId_fk','=',$aluminiProfile->departmentId_fk)
                                            ->orderBy('studentsId','DESC')
                                            ->get();
        }
        else
        {
            $fetchRequestDetails = [];
        }

        return $fetchRequestDetails;
    }

    public function ReplyRequest(Request $request)
    {

        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        if ($request -> has('requestreject'))
        {
            DB::table('project_requests')
                            ->where('requestId','=',$request->requestId)
                            ->update(array(
                                'replayStatus' => 3,
                                'updated_at' => $Date
                            ));

            return redirect()->back()->with(['status'=>'Rejected Successfully']);
        }
        elseif($request -> has('postiveReply'))
        {
            $aluminiProfile = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();
            $projectTitle = Projects::where('aluminiId_fk','=',$aluminiProfile->aluminiId)->first();

            $request->validate([
                'profilePicture' => ['max:25000'],
            ]);

            $file = $request->file('Attachement');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $projectTitle->title.'_'.$request->studentName;
            $filename = $fileName.'.'.$fileExtension;
            $file->move('documents/',$filename);

            DB::table('project_requests')
                            ->where('requestId','=',$request->requestId)
                            ->update(array(
                                'attachment'=>$filename,
                                'replyInfo' => $request->replayRequest,
                                'replayStatus' => 2,
                                'updated_at' => $Date
                            ));
            return redirect()->back()->with(['status'=>'Replay Sent Successfully']);
        }
    }
}
