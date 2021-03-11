<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manageclient;
use App\Models\ProgrammingRequest;
use App\Models\OrderRequestNotes;
use App\Models\Client;
use App\User;
use SweetAlert;
use File;
use Auth;

class RequestsProgrammingController extends Controller
{

    public function index()
    {
        $rows = ProgrammingRequest::paginate(10);
        return view('Admin.hr.order-requests-programming.index', compact('rows'));
    }

    public function edit($id)
    {

        $row = ProgrammingRequest::where('id', $id)->first();

        return view('Admin.hr.order-requests-programming.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'client_whatsapp'           => 'sometimes|nullable',
            'client_website'            => 'sometimes|nullable',
            'client_career'             => 'sometimes|nullable',
        ]);

        $data['client_id'] = $request->client_id;
        $data['hr_id'] = Auth::user()->id;


        ProgrammingRequest::where('id', $id)->update($data);

        if($request->has('note'))
        {
            $client  = Client::where('id', $request->client_id)->first();

            OrderRequestNotes::create([
                'note'                          => $request->note,
                'order_request_programming_id'    => $id,
            ]);
        }

        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }

    public function show($id)
    {
        $row = ProgrammingRequest::where('id', $id)->first();
        $notes = OrderRequestNotes::where('order_request_marketing_id', $id)->paginate(4);
        return view('Admin.hr.order-requests-programming.show', compact('row', 'notes'));
    }


    public function delete($id)
    {
        $row = ProgrammingRequest::where('id', $id);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }



}
