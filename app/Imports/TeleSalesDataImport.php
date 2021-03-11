<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use App\Models\SettingTelesales;
use App\Models\Target;
use App\Models\Client;
use App\Models\CampaignClient;
use App\Models\FacebookOurCampaign;
use App\Models\GoogleOurCampaign;
use Notification;
use App\User;
use Auth;



//class TeleSalesDataImport implements ToModel
class TeleSalesDataImport implements ToCollection, WithStartRow

{
    public function startRow(): int
    {
        return 2;
    }
    private $users;


    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection(Collection $rows)
    {
        // TODO: Implement collection() method.


        $clientsPerUSer = (int) ceil($rows->count() / $this->users->count());


        foreach ($rows as $row)
        {
            if($row[4] == 'facebook-our')
            {
                $message = FacebookOurCampaign::where('id', $row[3])->first();
                if($message)
                {
                    $total_message = $message->messages_quantity+1;
                    FacebookOurCampaign::where('id', $row[3])->update(['messages_quantity' => $total_message]);
                }

            }

            if($row[4] == 'google-our')
            {
                $message = GoogleOurCampaign::where('id', $row[3])->first();
                if($message)
                {
                    $total_message = $message->messages_quantity+1;
                    GoogleOurCampaign::where('id', $row[3])->update(['messages_quantity' => $total_message]);
                }

            }
        }


        if($rows->count() == 1)
        {

                $user_all = $this->users->random(1);

                foreach($rows as $client)
                {
                    foreach($user_all as $user)
                   {
                        $id = Client::insertGetId([
                            'name'                  => $client[0],
                            'phone'                 => $client[1],
                            'phone2'                => $client[2],
                            'telesales_data'        => 1,
                            'source'                => 2,
                            'response'              => 1,
                            'from_user_id'          => Auth::user()->id,
                            'user_id'               => $user->id,
                        ]);

                        if($client[3] != null)
                        {
                            CampaignClient::create([
                                'client_id'         => $id,
                                'user_id'           => Auth::user()->id,
                                'campaign_id'       => $client[3],
                                'campaign_type'     => $client[4],
                            ]);
                            if($client[4] == 'facebook-our')
                            {
                                $message = FacebookOurCampaign::where('id', $client[3])->first();
                                FacebookOurCampaign::where('id', $client[3])->update(['messages_quantity' => $message->messages_quantity+$rows->count()]);
                            }
                        }
                    }

                }

                $id_client_sales = $id;
                $marketer = Auth::user()->name;
                Notification::send($user_all, new \App\Notifications\TelesalseDataNotification($id_client_sales, $marketer));
                //=============================================================================================================

                $month = Carbon::now()->format('Y/m');

                $target_check = Target::where('user_id', $user->id)->where('month', $month)->first();

                if($target_check)
                {
                    $total_clients = Client::where('response', '!=', 3)->where('user_id', $user->id)->count();

                    $target = SettingTelesales::where('id', 1)->first();
                    $target = $target->target;

                    $result_target = (int) ceil(($total_clients) * $target * (1/100));

                    Target::where('id', $target_check->id)->update([
                        'total_clients' => $total_clients,
                        'target'        => $result_target,
                        'user_id'       => $user->id
                    ]);

                }else{

                    $target = SettingTelesales::where('id', 1)->first();
                    $total_clients = Client::where('response', '!=', 3)->where('user_id', $user->id)->count();
                    $target = $target->target;
                    $result_target = (int) ceil($total_clients * $target * (1/100));

                    Target::create([
                        'total_clients' => $total_clients,
                        'target'        => $result_target,
                        'month'         => $month,
                        'user_id'       => $user->id
                    ]);
                }



        }else{

            foreach ($this->users as $user)
            {

                $clients = $rows->random($clientsPerUSer);

                foreach ($clients as $client)
                {

                    $id = Client::insertGetId([
                        'name'                  => $client[0],
                        'phone'                 => $client[1],
                        'phone2'                => $client[2],
                        'telesales_data'        => 1,
                        'source'                => 2,
                        'response'              => 1,
                        'from_user_id'          => Auth::user()->id,
                        'user_id'               => $user->id,
                    ]);

                    if($client[3] != null)
                    {
                        CampaignClient::create([
                            'client_id'         => $id,
                            'user_id'           => Auth::user()->id,
                            'campaign_id'       => $client[3],
                            'campaign_type'     => $client[4],
                        ]);
                    }

                    $rows = $rows->diff($clients);

                    $month = Carbon::now()->format('Y/m');

                    $target_check = Target::where('user_id', $user->id)->where('month', $month)->first();

                    if($target_check)
                    {
                        $total_clients = Client::where('response', '!=', 3)->where('user_id', $user->id)->count();
                        $target = SettingTelesales::where('id', 1)->first();
                        $target = $target->target;

                        $result_target = (int) ceil(($total_clients) * $target * (1/100));

                        Target::where('id', $target_check->id)->update([
                            'total_clients' => $total_clients,
                            'target'        => $result_target,
                            'user_id'       => $user->id
                        ]);

                    }else{

                        $target = SettingTelesales::where('id', 1)->first();
                        $total_clients = Client::where('response', '!=', 3)->where('user_id', $user->id)->count();
                        $target = $target->target;
                        $result_target = (int) ceil($total_clients * $target * (1/100));

                        Target::create([
                            'total_clients' => $total_clients,
                            'target'        => $result_target,
                            'month'         => $month,
                            'user_id'       => $user->id
                        ]);
                    }

                }


            }



            $all_users = $this->users;
            $id_client_sales = $id;
            $marketer = Auth::user()->name;
            Notification::send($all_users, new \App\Notifications\TelesalseDataNotification($id_client_sales, $marketer));
        }


    }
}
