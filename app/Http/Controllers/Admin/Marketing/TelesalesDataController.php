<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CampaignClient;
use SweetAlert;
use Auth;
use DB;

class TelesalesDataController extends Controller
{

    public function index()
    {
      $rows = CampaignClient::orderBy('id', 'desc')->paginate(10);
      return view('Admin.digital-marketing.telesales_data.index',compact('rows'));
    }

    public function delete($id)
    {
        $row = CampaignClient::find($id);
        $row->delete();
        alert()->error(trans("admin.delete-message", 'Done'));
        return back();
    }

}
