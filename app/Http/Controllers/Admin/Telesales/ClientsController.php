<?php

namespace App\Http\Controllers\Admin\Telesales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\ClientNote;
use App\Models\SettingTelesales;
use App\Models\Commission;
use App\Models\Target;
use Illuminate\Notifications\Notification;
use App\Notifications\ClientNotification;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use SweetAlert;
use App\User;
use Auth;
use DB;

class ClientsController extends Controller
{

    use Notifiable;

    public function index(){

      $data = Client::where('telesales_data', 0)->paginate(10);
      return view('Admin.telisales.clients.index',compact('data'));
    }

    public function create(){

      $countries = DB::table('countries')->get();

      return view('Admin.telisales.clients.create',compact('countries'));
    }

    public function store(Request $request){


      $data = $this->validate(request(), [
        'name'                    =>  'required',
        'phone'                   =>  'sometimes|nullable',
        'phone2'                  =>  'sometimes|nullable',
        'email'                   =>  'sometimes|nullable',
        'landline'                =>  'sometimes|nullable',
        'source'                  =>  'sometimes|nullable',
        'response'                =>  'sometimes|nullable',
        'country_id'              =>  'sometimes|nullable',
        'meeting_client'          =>  'sometimes|nullable',
        'position'                =>  'sometimes|nullable',
        'price'                  =>  'sometimes|nullable'
      ]);


    $data['user_id'] = Auth::user()->id;


     $id = DB::table('clients')->insertGetId($data);

      if($request->has('note') && $request->note != null)
      {
        ClientNote::create([
          'client_id' => $id,
          'user_id'   => auth()->guard('web')->user()->id,
          'note'      => request('note')
        ]);

      }

      $month = Carbon::now()->format('Y/m');

      $target_check = Target::where('user_id', Auth::user()->id)->where('month', $month)->first();

      if($target_check)
      {
            $total_clients = Client::where('response', '!=', 3)->where('user_id', Auth::user()->id)->count();
            $target = SettingTelesales::where('id', 1)->first();
            $target = $target->target;

            if($request->response != 3)
            {

              $result_target = (int) ceil(($total_clients) * $target * (1/100));

              Target::where('id', $target_check->id)->update([
                  'total_clients' => $total_clients,
                  'target'        => $result_target,
                  'user_id'       => Auth::user()->id
              ]);

            }

            if($request->response == 3)
            {

              $result_target = (int) ceil(($total_clients) * $target * (1/100));

              Target::where('id', $target_check->id)->update([
                  'total_clients'         =>  $total_clients,
                  'target'                =>  $result_target,
                  'target_success'        =>  $target_check->arget_success+1,
                  'user_id'               =>  Auth::user()->id,
              ]);


            }

      }else{

              $target = SettingTelesales::where('id', 1)->first();
              $total_clients = Client::where('response', '!=', 3)->where('user_id', Auth::user()->id)->count();
              $target = $target->target;
              $result_target = (int) ceil($total_clients * $target * (1/100));

              Target::create([
                  'total_clients' => $total_clients,
                  'target'        => $result_target,
                  'month'         => $month,
                  'user_id'       => Auth::user()->id
              ]);

      }


        //=== Add Commission

        if($request->response == 3)
        {
                $month = Carbon::now()->format('Y/m');

                $commission = SettingTelesales::where('id', 1)->first();

                $price = $request->price;
                $add_commission = $commission->commission;

                $result_commission = (int) ceil($price * $add_commission * (1/100));

                Commission::create([
                    'commission' => $result_commission,
                    'client_id'  => $id,
                    'month'      => $month,
                    'user_id'    => Auth::user()->id
                ]);
        }


      alert()->success(trans('admin.success-message'), 'Done');
      return back();

    }

    public function show(Client $client){

      $total_price = DB::table('projects')->where('client_id', $client->id)->where('status','finish')->sum('price');

      $total_paid = DB::table('projects')->where('client_id',$client->id)->where('status','finish')->sum('paid');


      $total_remaining_price = $total_price-$total_paid;

      $projects = DB::table('projects')->where('client_id', $client->id)->get();

      return view('Admin.telisales.clients.show',compact('client','projects','total_price','total_remaining_price'));
    }

    public function edit(Client $client){

      $countries = DB::table('countries')->get();
      $notes = ClientNote::where('client_id', $client->id)->get();

      return view('Admin.telisales.clients.edit', compact('client','countries','notes'));

    }

    public function update(Request $request, $id){

        $data = $this->validate(request(), [
          'name'                    =>  'required',
          'phone'                   =>  'sometimes|nullable',
          'phone2'                  =>  'sometimes|nullable',
          'email'                   =>  'sometimes|nullable',
          'landline'                =>  'sometimes|nullable',
          'source'                  =>  'sometimes|nullable',
          'response'                =>  'sometimes|nullable',
          'country_id'              =>  'sometimes|nullable',
          'meeting_client'          =>  'sometimes|nullable',
          'position'                =>  'sometimes|nullable',
          'price'                   =>  'sometimes|nullable',
        ]);

        $client = Client::where('id', $id)->first();

        $data['user_id'] = $client->user_id;

        if($client->response != 3)
        {
            $month = Carbon::now()->format('Y/m');
            $target_check = Target::where('user_id', $client->user_id)->where('month', $month)->first();

            if ($target_check)
            {
                if ($request->response == 3)
                {

                    $total_clients = Client::where('response', '!=', 3)->where('user_id', $client->user_id)->count();
                    $target = SettingTelesales::where('id', 1)->first();
                    $target = $target->target;
                    $result_tareget = (int) ceil(($total_clients-1) * $target * (1/100));

                    Target::where('id', $target_check->id)->update([
                        'total_clients'         => $total_clients-1,
                        'target'                => $result_tareget,
                        'target_success'        => $target_check->target_success+1,
                        'month'                 => $month,
                        'user_id'               => $target_check->user_id,
                    ]);
                }
            }
        }

        $client->update($data);

       if(request()->has('note') && request('note') != null)
       {
            ClientNote::create([
              'client_id' => $client->id,
              'user_id'   => auth()->guard('web')->user()->id,
              'note'      => request('note')
            ]);
       }

       if($request->response == 3 && $request->has('price'))
        {

               $check_commission = Commission::where('client_id', $client->id)->first();

               if(!$check_commission)
               {

                   $month = Carbon::now()->format('Y/m');

                   $commission = SettingTelesales::where('id', 1)->first();

                    $add_commission = $commission->commission;

                    $result_commission = (int)($request->price * $add_commission * (1/100));

                    Commission::create([
                       'commission' => $result_commission,
                        'client_id'  => $client->id,
                        'month'      => $month,
                        'user_id'    => Auth::user()->id
                    ]);
               }
        }

        alert()->success(trans('admin.update-message'), 'Done');
      return back();

    }


    public function notifications_telesales_data()
    {
        return view('Admin.telisales.clients.notifications_telsales_data');
    }

    public function notifications()
    {
        return view('Admin.telisales.clients.notifications_all');
    }

    public function delete_notifications($client)
    {
        $row = DB::table('notifications')->where('data->id_client',$client);
        $row->delete();
        alert()->error(trans('Delete Success'), 'Done');
        return back();
    }

    public function delete_notifications_telesales_data($client)
    {
        $row = DB::table('notifications')->where('data->id_client_sales',$client);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }

    public function delete($id)
    {
      $row = Client::find($id);
      $row->delete();
      alert()->success(trans('Delete Success'), 'Done');
      return back();
    }


    public function show_clients(Request $request, $search)
    {
        $clients = Client::where('phone', 'like', '%'. $search . '%')->where('response', 3)->get();
        $data = '';
        foreach($clients as $client)
        {
            $data .= "<li id='".$client->id."'>" . $client->name . "</li>";
        }

        return response()->json(['success' => 'success', 'data' => $data]);
    }


    public function delete_notes($id)
    {
      $note = ClientNote::find($id);
      $note->delete();
      alert()->success(trans('admin.delete-message'), 'Done');
      return back();

    }


    public function clients_marketers(){

      $clients = Client::where('telesales_data', 1)->paginate(10);
      return view('Admin.telisales.marketers-sales.index',compact('clients'));
    }


}
