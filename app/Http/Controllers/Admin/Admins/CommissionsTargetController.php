<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingTelesales;
use App\Models\Commission;
use App\Models\Target;

class CommissionsTargetController extends Controller
{
    public function commissions(){
        $commissions = Commission::orderBy('id', 'desc')->paginate(10);
        return view('Admin.admins.commissions.index',compact('commissions'));
    }

    public function targets(){
        $targets = Target::orderBy('id', 'desc')->paginate(10);
        return view('Admin.admins.target.index',compact('targets'));
    }


}
