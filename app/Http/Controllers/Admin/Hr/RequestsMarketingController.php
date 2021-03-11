<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manageclient;
use App\Models\MarketingRequest;
use App\Models\OrderRequestNotes;
use App\Models\Client;
use App\User;
use SweetAlert;
use File;
use Auth;

class RequestsMarketingController extends Controller
{

    public function index()
    {
        $rows = MarketingRequest::paginate(10);
        return view('Admin.hr.order-requests-marketing.index', compact('rows'));
    }

    public function edit($id)
    {

        $row = MarketingRequest::where('id', $id)->first();
        return view('Admin.hr.order-requests-marketing.edit', compact('row'));
    }

    public function update(Request $request, $id)
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

            $folder_download = MarketingRequest::where('id', $id)->first();
            $path_file = public_path('uploads/marketing/files/'.$folder_download->file_download);

            if(file_exists($path_file))
            {
                File::delete($path_file);
            }

        }

        MarketingRequest::where('id', $id)->update($data);

        if($request->has('note'))
        {
            $client  = Client::where('id', $request->client_id)->first();

            OrderRequestNotes::create([
                'note'                          => $request->note,
                'order_request_marketing_id'    => $id,
            ]);
        }

        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }

    public function show($id)
    {
        $row = MarketingRequest::where('id', $id)->first();
        $notes = OrderRequestNotes::where('order_request_marketing_id', $id)->paginate(4);
        return view('Admin.hr.order-requests-marketing.show', compact('row', 'notes'));
    }


    public function delete($id)
    {
        $row = MarketingRequest::where('id', $id);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }



}
