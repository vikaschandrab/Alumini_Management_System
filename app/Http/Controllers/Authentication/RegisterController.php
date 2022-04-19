<?php

namespace App\Http\Controllers\Authentication;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function creatUser(Request $request)
    {
        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

        if($request->password == $request->confirmPassword)
        {
            if(Str::length($request->password) >= 7)
            {
                $emailUser = User::where('email','=',$request->email)->first();

                if($emailUser)
                {
                    $phoneUser = User::where('phone','=',$request->phone)->first();

                    if($phoneUser->password == null)
                    {
                        if($phoneUser)
                        {
                            $user=['name' => $phoneUser->name,
                                    'phone' => $phoneUser->phone,
                                    'email' => $phoneUser->email];
                            $user['to'] = $request->email;
                            $Mail = Mail::send('Email.userlogin',$user,function($messages) use ($user){
                                $messages->to($user['to'])
                                        ->subject('Thank You For Creating Account in Alumini Management System');
                            });

                            $Mail = Mail::send('Email.adminMail', $user,function($messages) use ($user){
                                $messages->to('projectprince12@gmail.com')
                                        ->subject('New User Registered');
                            });

                                $phoneUser->password = Hash::make($request->password);
                                $phoneUser->status = 1;
                                $phoneUser->created_at = $Date;
                                $phoneUser->updated_at = $Date;
                                $phoneUser->save();

                                return redirect()->back()->with('status','Account Created Successfully');
                        }
                        else
                        {
                            return redirect()->back()->with('failure','Phone Number Does not Exists');
                        }
                    }
                    else
                    {
                        return redirect()->back()->with('failure','Account Already Exist');
                    }
                }
                else
                {
                    return redirect()->back()->with('failure','Email Does not Exists');
                }
            }
            else
            {
                return redirect()->back()->with('failure','Minimum Password Length is 7 digits');
            }
        }
        else
        {
            return redirect()->back()->with('failure','Password did not match');
        }
    }
}
