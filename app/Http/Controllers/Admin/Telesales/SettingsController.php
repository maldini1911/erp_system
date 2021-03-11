<?php

namespace App\Http\Controllers\Admin\Telesales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingTelesales;

class SettingsController extends Controller
{
    public function index(){
      $settings = SettingTelesales::where('id',1)->get();
      return view('Admin.telisales.settings.index',compact('settings'));
    }


    public function update(){
      $setting  = SettingTelesales::find(1);
      $setting->commission = request('commission');
      $setting->target = request('target');
      $setting->save();

      return back()->with('message','Settings Saved');
    }


}
