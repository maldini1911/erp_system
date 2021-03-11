<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\FacebookCoustmerCampaign;
use SweetAlert;
use File;
use Auth;

class FacebookCoustmerCampaignController extends Controller
{

    public function index()
    {

        $rows = FacebookCoustmerCampaign::paginate(10);
        return view('Admin.digital-marketing.facebook-coustmer-campaign.index', compact('rows'));
    }

    public function create()
    {
        return view('Admin.digital-marketing.facebook-coustmer-campaign.create');
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'client_id'             => 'required',
            'campaign_type'         => 'required',
            'started'               => 'sometimes|nullable',
            'ended'                 => 'sometimes|nullable',
            'full_budget'           => 'sometimes|nullable',
            'custom_budget'         => 'sometimes|nullable',
            'messages_quantity'     => 'sometimes|nullable',
            'reached'               => 'sometimes|nullable',
            'engagement'            => 'sometimes|nullable',
            'comments'              => 'sometimes|nullable',
            'likes'                 => 'sometimes|nullable',
            'total_clicks'          => 'sometimes|nullable',
            'page_likes'            => 'sometimes|nullable',
            'upload_screenshot'     => 'sometimes|nullable',
            'campaign_notes'        => 'sometimes|nullable'
        ]);

        $data['user_id'] = Auth::user()->id;

        if(request()->hasFile('upload_screenshot'))
        {
            $file = $request->file('upload_screenshot');
            $fileName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/marketing/facebook'), $fileName);
            $data['upload_screenshot'] = $fileName;
        }

        FacebookCoustmerCampaign::create($data);
        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }

    public function show($id)
    {
        $row = FacebookCoustmerCampaign::where('id', $id)->first();
        return view('Admin.digital-marketing.facebook-coustmer-campaign.show', compact('row'));
    }

    public function edit($id)
    {

        $row = FacebookCoustmerCampaign::where('id', $id)->first();
        return view('Admin.digital-marketing.facebook-coustmer-campaign.edit', compact('row'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'client_id'             => 'required',
            'campaign_type'         => 'required',
            'started'               => 'sometimes|nullable',
            'ended'                 => 'sometimes|nullable',
            'full_budget'           => 'sometimes|nullable',
            'custom_budget'         => 'sometimes|nullable',
            'messages_quantity'     => 'sometimes|nullable',
            'reached'               => 'sometimes|nullable',
            'engagement'            => 'sometimes|nullable',
            'comments'              => 'sometimes|nullable',
            'likes'                 => 'sometimes|nullable',
            'total_clicks'          => 'sometimes|nullable',
            'page_likes'            => 'sometimes|nullable',
            'upload_screenshot'     => 'sometimes|nullable|mimes:jpg,jpeg,png',
            'campaign_notes'        => 'sometimes|nullable'
        ]);

        $data['user_id'] = Auth::user()->id;

        $image = FacebookCoustmerCampaign::where('id', $id)->first();

        if(request()->hasFile('upload_screenshot'))
        {
            $file = $request->file('upload_screenshot');
            $imageName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/marketing/facebook'), $imageName);
            $data['upload_screenshot'] = $imageName;

            $image_path = public_path('uploads/marketing/facebook/'.$image->upload_screenshot);

            if(file_exists($image_path))
            {
                File::delete($image_path);
            }
        }

        FacebookCoustmerCampaign::where('id', $id)->update($data);
        alert()->success(trans('admin.udpate-message'), 'Done');
        return back();
    }


    public function delete($id)
    {
        $row = FacebookCoustmerCampaign::where('id', $id);
        $row->delete();
        return back();
    }



}
