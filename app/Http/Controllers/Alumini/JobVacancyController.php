<?php

namespace App\Http\Controllers\Alumini;

use Carbon\Carbon;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Alumini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobVacancyController extends Controller
{
    public function aluminiJobVacancyDetails()
    {
        $profile = $this->profiledata();
        $jobData = $this->jobData();

        return view('Alumini.workdetails',compact('profile','jobData'));
    }

    public function profiledata()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }

    public function jobData()
    {
        $aluminiProfile = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();

        if($aluminiProfile)
        {
            $jobData = Jobs::where('aluminiId_fk','=', $aluminiProfile->aluminiId)->get();
        }
        else
        {
            $jobData = [];
        }


        return $jobData;
    }

    public function addJobVacancy(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        $request->validate([
            'title' => ['required'],
            'company' => ['required'],
            'website' => ['required'],
            'experience' => ['required'],
            'vacancies' => ['required'],
            'referal' => ['required'],
        ]);

        if($request->id == null)
        {

            $aluminiProfile = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();

            $addJobVacancy = new Jobs;
            $addJobVacancy->aluminiId_fk = $aluminiProfile->aluminiId;
            $addJobVacancy->website = $request->website;
            $addJobVacancy->experiance = $request->experience;
            $addJobVacancy->position = $request->title;
            $addJobVacancy->company = $request->company;
            $addJobVacancy->vacancies = $request->vacancies;
            $addJobVacancy->referal = $request->referal;
            $addJobVacancy->created_at = $Date;
            $addJobVacancy->updated_at = $Date;
            $addJobVacancy->save();

            return redirect()->back()->with(['status'=>'Job Vacancy Details Saved Successfully']);
        }
        else
        {
            DB::table('jobs')
                            ->where('jobsId','=',$request->id)
                            ->update(array(
                                'website' => $request->website,
                                'experiance' => $request->experience,
                                'position' => $request->title,
                                'company' => $request->company,
                                'vacancies' => $request->vacancies,
                                'referal' => $request->referal,
                                'updated_at' => $Date
                            ));

            return redirect()->back()->with(['status'=>'Job Vacancy Details Updated Successfully']);
        }
    }

}
