<?php

namespace App\Http\Controllers\Student;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileview()
    {
        $profile = $this->profile();
        $fetchDepartment = $this->fetchDepartment();

        return view('Student.profile',compact('profile','fetchDepartment'));
    }

    public function profile()
    {
        $profile = Student::join('users','students.UserId_fk','=','users.UserId')
                            ->join('departments','students.departmentId_fk','=','departments.departmentId')
                        ->where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function fetchDepartment()
    {
        $fetchDepartment = Department::get();

        return $fetchDepartment;
    }

    public function prfileUpdate(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'profilePicture' => ['required','image','max:5000'],
        ]);

        $file = $request->file('profilePicture');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = Auth::user()->phone;
        $filename = $fileName.'.'.$fileExtension;
        $file->move('img/student/',$filename);

        if($request->email == null || $request->phone == null)
        {
            DB::table('users')
                    ->where('userId','=',Auth::user()->userId)
                    ->update(array(
                        'profilEpicture' => $filename,
                        'updated_at' => $Date
                    ));
        }
        else
        {
            DB::table('users')
                    ->where('userId','=',Auth::user()->userId)
                    ->update(array(
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'profilEpicture' => $filename,
                        'updated_at' => $Date
                    ));
        }

        $Student = Student::where('UserId_fk','=',Auth::user()->userId)->first();

        if($Student)
        {
            if($request->studentregnumber == null || $request->department == null)
            {

            }
            else
            {
                DB::table('students')
                            ->where('UserId_fk','=',Auth::user()->userId)
                            ->update(array(
                                'StudentregNumber' => $request->studentregnumber,
                                'departmentId_fk' => $request->department,
                                'updated_at' => $Date
                            ));
            }
        }
        else
        {

            $Student = new Student;

            $Student->UserId_fk = Auth::user()->userId;
            $Student->StudentregNumber = $request->studentregnumber;
            $Student->departmentId_fk = $request->department;
            $Student->created_at = $Date;
            $Student->updated_at = $Date;
            $Student->save();
        }


        return redirect()->back()->with(['status'=>'Profile Updated Successfully']);
    }
}
