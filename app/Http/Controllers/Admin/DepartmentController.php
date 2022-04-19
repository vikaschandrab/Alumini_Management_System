<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function departmentview()
    {
        $profile = $this->profile();
        $getDepartment = $this->getDepartment();

        return view('Admin.department',compact('profile','getDepartment'));
    }

    public function profile()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function getDepartment()
    {
        $getDepartment = Department::get();

        return $getDepartment;
    }

    public function addDepartment(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'addmore.*.name' => ['required'],
        ]);

        foreach ($request->addmore as $key => $value)
        {
            $department = new Department;

            $department->department = $value['name'];
            $department->created_at = $Date;
            $department->updated_at = $Date;
            $department->save();
        }

        return redirect()->back()->with('status','Department Added Successfully');
    }
}
