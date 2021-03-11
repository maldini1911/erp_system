<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GoogleCoustmerCampaign;
use File;
use Auth;

class GoogleCoustmerCampaignController extends Controller
{

    public function index()
    {

        $rows = GoogleCoustmerCampaign::paginate(10);
        return view('Admin.digital-marketing.google-coustmer-campaign.index', compact('rows'));
    }

    public function create()
    {
        return view('Admin.digital-marketing.google-coustmer-campaign.create');
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
            'impression'            => 'sometimes|nullable',
            'clicks'                => 'sometimes|nullable',
            'ctr'                   => 'sometimes|nullable',
            'roi'                   => 'sometimes|nullable',
            'campaign_notes'        => 'sometimes|nullable'
        ]);

        $data['user_id'] = Auth::user()->id;
        GoogleCoustmerCampaign::create($data);
        alert()->success(trans('admin.success-message'), 'Done');
        return back();

    }

    public function show($id)
    {
        $row =  GoogleCoustmerCampaign::where('id', $id)->first();
        return view('Admin.digital-marketing.google-coustmer-campaign.show', compact('row'));
    }

    public function edit($id)
    {
        $row =  GoogleCoustmerCampaign::where('id', $id)->first();
        return view('Admin.digital-marketing.google-coustmer-campaign.edit', compact('row'));
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
            'impression'            => 'sometimes|nullable',
            'clicks'                => 'sometimes|nullable',
            'ctr'                   => 'sometimes|nullable',
            'roi'                   => 'sometimes|nullable',
            'campaign_notes'        => 'sometimes|nullable'
        ]);

        $data['user_id'] = Auth::user()->id;
        GoogleCoustmerCampaign::where('id', $id)->update($data);
        alert()->success(trans('admin.update-message'), 'Done');
        return back();


    }


    public function destroy($id)
    {
        $row = GoogleCoustmerCampaign::where('id', $id);
        $row->delete();
        return back();
    }



}
