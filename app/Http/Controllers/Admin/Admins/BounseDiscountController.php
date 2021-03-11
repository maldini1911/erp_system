<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BonuseDiscount;
use Carbon\Carbon;
use App\User;
use File;
use Auth;

class BounseDiscountController extends Controller
{

    public function index($id)
    {

        $rows = BonuseDiscount::orderBy('id', 'desc')->where('user_id', $id)->paginate(10);
        $user_id = $id;
        return view('Admin.admins.bounse_discount.index', compact('rows', 'user_id'));
    }
    
    public function create_bounse($id)
    {
        $user_id = $id;
        return view('Admin.admins.bounse_discount.create_bounse', compact('user_id'));
    }

    public function create_discount($id)
    {
        $user_id = $id;
        return view('Admin.admins.bounse_discount.create_discount', compact('user_id'));
    }

    public function store_bounse(Request $request)
    {

        $data = $this->validate(request(), [
            'bounse'                => 'sometimes|nullable|string',
            'reason_bounse'         => 'sometimes|nullable|string',
            'month'                 => 'sometimes|nullable',
            'amount'                => 'sometimes|nullable',
        ]);

        $data['month'] =  Carbon::parse($request->month)->format('Y/m');
        $data['user_id'] = $request->user_id;

        BonuseDiscount::create($data);

        alert()->success(trans('admin.success-message'), 'Done');
        return back();

    }


    public function store_discount(Request $request)
    {
        $data = $this->validate(request(), [
            'discount'                => 'sometimes|nullable|string',
            'reason_discount'         => 'sometimes|nullable|string',
            'month'                   => 'sometimes|nullable',
            'amount'                  => 'sometimes|nullable|',
        ]);

        $data['user_id'] = $request->user_id;

        BonuseDiscount::create($data);

        //alert()->success(trans('admin.success'), 'Done');
        return back();

    }

    public function show($id)
    {
        $rows =  BonuseDiscount::where('user_id', $id)->get();
        $user_id = $id;
        return view('Admin.admins.bounse_discount.show', compact('rows', 'user_id'));
    }

    public function edit_bounse($id)
    {
        $row = BonuseDiscount::where('id', $id)->first();
        $user_id = $row->user_id;
        return view('Admin.admins.bounse_discount.edit_bounse', compact('row', 'user_id'));
    }


    public function update_bounse(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'bounse'                => 'sometimes|nullable|string',
            'reason_bounse'         => 'sometimes|nullable|string',
            'month'                 => 'sometimes|nullable',
            'amount'                => 'sometimes|nullable',
        ]);

        $data['user_id'] = $request->user_id;

        BonuseDiscount::where('id', $id)->update($data);
        return back();
    }


    public function edit_discount($id)
    {
        $row = BonuseDiscount::where('id', $id)->first();
        $user_id = $row->user_id;
        return view('Admin.admins.bounse_discount.edit_discount', compact('row', 'user_id'));
    }


    public function update_discount(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'discount'                => 'sometimes|nullable|string',
            'reason_discount'         => 'sometimes|nullable|string',
            'month'                   => 'sometimes|nullable',
            'amount'                  => 'sometimes|nullable',
        ]);

        $data['user_id'] = $request->user_id;

        BonuseDiscount::where('id', $id)->update($data);
        return back();
    }

    public function delete($id)
    {
        $row = BonuseDiscount::where('id', $id);
        $row->delete();
        return back();
    }


}
