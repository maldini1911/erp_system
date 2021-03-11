<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use App\Models\CampaignClient;
use Illuminate\Http\Request;

use App\Models\GoogleOurCampaign;
use File;
use Auth;

class GoogleOurCampaignController extends Controller
{

    public function index()
    {

        $rows = GoogleOurCampaign::paginate(10);
        return view('Admin.digital-marketing.google-our-campaign.index', compact('rows'));
    }

    public function create()
    {
        return view('Admin.digital-marketing.google-our-campaign.create');
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'campaign_type'         => 'required',
            'started'               => 'sometimes|nullable',
            'ended'                 => 'sometimes|nullable',
            'full_budget'           => 'sometimes|nullable',
            'impression'            => 'sometimes|nullable',
            'clicks'                => 'sometimes|nullable',
            'ctr'                   => 'sometimes|nullable',
            'roi'                   => 'sometimes|nullable',
            'campaign_notes'        => 'sometimes|nullable'
        ]);

        $data['user_id'] = Auth::user()->id;
        GoogleOurCampaign::create($data);
        alert()->success(trans('admin.success-message'), 'Done');
        return back();

    }

    public function show($id)
    {
        $row =  GoogleOurCampaign::where('id', $id)->first();
        $confirmed = CampaignClient::whereHas('client', function ($query){
            $query->where('response', 3);
        })->where('campaign_id', $row->id)->where('campaign_type', 'google-our')->count();

        $unconfirmed = CampaignClient::whereHas('client', function ($query){
            $query->where('response', '!=', 3);
        })->where('campaign_id', $row->id)->where('campaign_type', 'google-our')->count();

        return view('Admin.digital-marketing.google-our-campaign.show', compact('row', 'confirmed', 'unconfirmed'));
    }

    public function edit($id)
    {
        $row = GoogleOurCampaign::where('id', $id)->first();
        return view('Admin.digital-marketing.google-our-campaign.edit', compact('row'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'campaign_type'         => 'required',
            'started'               => 'sometimes|nullable',
            'ended'                 => 'sometimes|nullable',
            'full_budget'           => 'sometimes|nullable',
            'full_budget'           => 'sometimes|nullable',
            'impression'            => 'sometimes|nullable',
            'clicks'                => 'sometimes|nullable',
            'ctr'                   => 'sometimes|nullable',
            'roi'                   => 'sometimes|nullable',
            'campaign_notes'        => 'sometimes|nullable'
        ]);

        $data['user_id'] = Auth::user()->id;
        GoogleOurCampaign::where('id', $id)->update($data);
        alert()->success(trans('admin.update-message'), 'Done');
        return back();


    }


    public function destroy($id)
    {
        $row = GoogleOurCampaign::where('id', $id);
        $row->delete();
        return back();
    }



}
