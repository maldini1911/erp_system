<?php

namespace App\Http\Controllers\Admin\Programming;

use App\Http\Controllers\Controller;
use App\Models\MarketingRequest;
use Illuminate\Http\Request;
use App\models\ProgrammingRequest;
use App\Models\OrderRequestNotes;
use SweetAlert;

class ClientProgrammingController extends Controller
{

    public function index()
    {
        $rows = ProgrammingRequest::paginate(10);
        return view('Admin.programming.clients.index', compact('rows'));
    }


    public function show($id)
    {
        $row = ProgrammingRequest::find($id)->first();
        $notes = OrderRequestNotes::where('order_request_programming_id', $id)->paginate(4);
        return view('Admin.programming.clients.show', compact('row', 'notes'));
    }

    public function filter_clients(Request $request, $search)
    {

            $clients = ProgrammingRequest::whereHas('client', function($query) use($search){
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
