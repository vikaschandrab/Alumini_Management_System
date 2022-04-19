<?php

namespace App\Http\Controllers\Alumini;

use App\Models\User;
use App\Models\Alumini;
use Illuminate\Http\Request;
use App\Models\ProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function dashboardview()
    {
        $requestCount = $this->requestCount();
        $profile = $this->profile();

        return view('Alumini.alumini',compact('requestCount','profile'));
    }

    public function requestCount()
    {
        $aluminiId = Alumini::where('UserId_fk','=',Auth::user()->userId)->first();
        $requestCount = ProjectRequest::where('aluminiId_fk','=',$aluminiId->aluminiId)
                                        ->where('replayStatus','=',1)->count();

        return $requestCount;
    }

    public function profile()
    {
        $profile = User::where('userId','=', Auth::user()->userId)->first();

        return $profile;
    }
}
