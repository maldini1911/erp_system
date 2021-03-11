<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use App\User;
use Notification;
use Auth;
use DB;
use Carbon\Carbon;


class clientNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notifications Metting Client To Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
        //$this->id = Auth::user();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //file_put_contents('CRON-'. time(),'');
//        return ;
       // $now = Carbon::now()->setSecond(0)->addMinutes(30);


//        $clients = Client::whereBetween('meeting_client',
//            [
//                $now,
//                $now->copy()->addMinute()
//            ]
//        )->get();


        $clients = Client::all();


        foreach ($clients as $client)
        {
            $min = strtotime($client->meeting_client) - (30 * 60);
            $time_before = date('Y-m-d H:i', $min);
            $now = date('Y-m-d H:i');
            //===========================================================
            $min_now = strtotime($client->meeting_client);
            $time_metting_now = date('Y-m-d H:i', $min_now);


            $user = User::where('id',$client->user_id)->first();

            if($time_metting_now == $now)
            {
                $message = "الان يوجد ميعاد مع العميل";
                $id_client = 'now'.$client->id;
                $meeting = $client->meeting_client;
                $user->notify(new \App\Notifications\ClientNotification($client->name, $message, $id_client, $meeting));
            }

            if($time_before == $now)
            {
                $message = "يوجد ميعاد مع عميل بعد 30 دقيقة";
                $id_client = 'before'.$client->id;
                $meeting = $client->meeting_client;
                $user->notify(new \App\Notifications\ClientNotification($client->name, $message, $id_client, $meeting));
            }
        }

        return "Done";

    }
}
