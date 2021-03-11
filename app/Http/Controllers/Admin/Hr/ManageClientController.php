<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManageClient;
use App\Models\MarketingRequest;
use App\Models\ProgrammingRequest;
use App\Models\OrderRequestNotes;
use App\Models\Client;
use App\User;
use SweetAlert;
use File;
use Auth;

class ManageClientController extends Controller
{

    public function index()
    {

        $rows = Client::where('response', 3)->paginate(10);
        return view('Admin.hr.manage-client.index', compact('rows'));
    }

    public function create($id)
    {
        $client  = Client::where('id', $id)->first();
        return view('Admin.hr.manage-client.create', compact("client"));
    }


    public function store(Request $request)
    {

        if($request->has('position'))
        {
            if($request->position == 'marketing' OR $request->position == 'all')
            {
                $data = $this->validate(request(), [
                    'client_id'                 => 'required',
                    'client_whatsapp'           => 'sometimes|nullable',
                    'client_website'            => 'sometimes|nullable',
                    'platform'                  => 'sometimes|nullable',
                    'client_youtube_channel'    => 'sometimes|nullable',
                    'client_career'             => 'sometimes|nullable',
                    'file_download'             => 'sometimes|nullable|mimes:zip',
                    'link_page'                 => 'sometimes|nullable',
                    'name_page'                 => 'sometimes|nullable',
                ]);


                $data['marketing_id'] = $request->user_position_id;
                $data['hr_id'] = Auth::user()->id;
                $data['client_id'] = $request->client_id;

                if(request()->hasFile('file_download'))
                {
                    $file = $request->file('file_download');
                    $fileupload = time().$file->getClientOriginalName();
                    $file->move(public_path('uploads/marketing/files'), $fileupload);
                    $data['file_download'] = $fileupload;
                }

                $id = MarketingRequest::insertGetId($data);

                //===> Start Notes
                if($request->has('note'))
                {
                    $client  = Client::where('id', $request->client_id)->first();

                    OrderRequestNotes::create([
                        'note'                          => $request->note,
                        'order_request_marketing_id'    => $id,
                    ]);
                }
                //====> End Notes
            }


            if($request->position == 'programming' OR $request->position == 'all')
            {
                $data = $this->validate(request(), [
                    'client_whatsapp'           => 'sometimes|nullable',
                    'client_website'            => 'sometimes|nullable',
                    'client_career'             => 'sometimes|nullable',
                ]);

                $data['client_id'] = $request->client_id;
                $data['hr_id'] = Auth::user()->id;

                $id = ProgrammingRequest::insertGetId($data);

                if($request->has('note'))
                {
                    OrderRequestNotes::create([
                        'note'                            => $request->note,
                        'order_request_programming_id'    => $id,
                    ]);
                }
            }
        }

        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }

    public function show($id)
    {
        $row = Client::where('id', $id)->first();
        return view('Admin.hr.manage-client.show', compact('row'));
    }


    public function delete($id)
    {
        $row = ManageClient::where('id', $id);
        $row->delete();
        return back();
    }

    public function show_users_marketing(Request $request, $search)
    {

        $clients = User::where('mobile', 'like', '%'. $search . '%')->where('role', 'marketing')->get();
        $data = '';
        foreach($clients as $client)
        {
            $data .= "<li id='".$client->id."'>" . $client->name . "</li>";
        }

        return response()->json(['success' => 'success', 'data' => $data]);
    }

}
