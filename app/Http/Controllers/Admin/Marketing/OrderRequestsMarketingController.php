<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Manageclient;
use App\Models\MarketingRequest;
use App\User;
use SweetAlert;
use File;
use Auth;

class OrderRequestsMarketingController extends Controller
{

    public function index()
    {
        $rows = MarketingRequest::paginate(10);
        return view('Admin.digital-marketing.order-requests.index', compact('rows'));
    }


    public function show($id)
    {
        $row = MarketingRequest::where('id', $id)->first();
        return view('Admin.digital-marketing.order-requests.show', compact('row'));
    }


    public function delete($id)
    {
        $row = FacebookCoustmerCampaign::where('id', $id);
        $row->delete();
        return back();
    }

    public function filter_clients(Request $request, $search)
    {
        $clients = MarketingRequest::whereHas('client', function($query) use($search){
            $query->where('phone', 'like', '%'. $search . '%');
        })->get();

        $data = '';
        foreach($clients as $client)
        {
            $data .= "<li id='".$client->id."'>" . $client->client['name'] . "</li>";
        }

        return response()->json(['success' => 'success', 'data' => $data]);
    }


}
