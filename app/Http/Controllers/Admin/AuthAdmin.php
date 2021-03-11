<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingTelesales;
use App\Models\Target;
use App\Models\Client;
use Carbon\Carbon;
use App\User;
use Auth;

class AuthAdmin extends Controller
{

    public function login()
    {
        return view('Admin.auth.login');
    }


    public function login_post(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $user_sales = User::where('email', $email)->where('role', 'sales')->first();


        if(auth()->guard('web')->attempt(['email' => $email, 'password' => $password], true))
        {
            if($user_sales)
            {
                $month = Carbon::now()->format('Y/m');

                $target_check = Target::where('user_id', $user_sales->id)->where('month', $month)->first();
                if(!$target_check)
                {

                    $target = SettingTelesales::where('id', 1)->first();
                    $total_clients = Client::where('response', '!=', 3)->where('user_id', $user_sales->id)->count();
                    $target = $target->target;
                    $result_target = (int) ($total_clients * $target * (1/100));
                    Target::create([
                        'total_clients' => $total_clients,
                        'target'        => $result_target,
                        'month'         => $month,
                        'user_id'       => $user_sales->id
                    ]);
                }
            }
            return redirect('admin/dashboard');

        }else{

            return back();
        }
    }



    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/');
    }


}
