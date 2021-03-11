<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacebookCoustmerCampaign;
use App\Models\FacebookOurCampaign;
use App\Models\GoogleCoustmerCampaign;
use App\Models\GoogleOurCampaign;
use App\Models\Project;
use App\Models\Client;
use App\Models\MarketingRequest;
use App\Models\ProgrammingProject;
use App\Models\ProgrammingRequest;
use App\Models\Commission;
use App\Models\Target;
use Carbon\Carbon;
use App\User;
use Auth;

class DashboradController extends Controller
{
    public function index()
    {

        if(Auth::user()->role == 'sales')
        {
            $clients = Client::where('user_id', Auth::user()->id)->count();
            $clients_done = Client::where('user_id', Auth::user()->id)->where('response', 3)->count();
            $clients_active = Client::where('user_id', Auth::user()->id)->where('response', 1)->count();
            $clients_unactive = Client::where('user_id', Auth::user()->id)->where('response', 2)->count();

            $projects = Project::where('user_id', Auth::user()->id)->count();
            $projects_waiting = Project::where('user_id', Auth::user()->id)->where('status', 'waiting')->count();
            $projects_pending = Project::where('user_id', Auth::user()->id)->where('status', 'pending')->count();
            $projects_cancel = Project::where('user_id', Auth::user()->id)->where('status', 'cancel')->count();
            $projects_delay = Project::where('user_id', Auth::user()->id)->where('status', 'delay')->count();
            $projects_finish = Project::where('user_id', Auth::user()->id)->where('status', 'finish')->count();

            $telesales_data = Client::where('from_user_id', Auth::user()->id)->where('telesales_data', 1)->count();

            $month = Carbon::now()->format('Y/m');
            $commissions = Commission::where('user_id', Auth::user()->id)->where('month', $month)->sum('commission');
            $target = Target::where('month', $month)->where('user_id', Auth::user()->id)->first();
            $target_now = $target->target;
            $target_success = $target->target_success;
            $target_result = $target_now - $target_success;
            if($target_result > 0)
            {
                $target_status = '+'.$target_result;
            }else{
                $target_status = $target_result;
            }
            if($target_result == 0){ $target_status = 0;}


            response()->json(['success' => 'Success', 'projects' => $projects, 'clients' => $clients]);

            return view('Admin.system.index_dashboard', compact(
                'clients', 'clients_done', 'clients_active', 'clients_unactive', 'projects',
                'projects_waiting', 'projects_pending', 'projects_cancel', 'projects_delay', 'projects_finish',
                'telesales_data', 'commissions', 'target_now', 'target_success', 'target_status'
            ));
        }

        //======================================================================
        if(Auth::user()->role == 'marketing')
        {
            $facebook_coustmer = FacebookCoustmerCampaign::where('user_id', Auth::user()->id)->count();
            $facebook_our = FacebookOurCampaign::where('user_id', Auth::user()->id)->count();
            $google_coustmer = GoogleCoustmerCampaign::where('user_id', Auth::user()->id)->count();
            $google_our = GoogleOurCampaign::where('user_id', Auth::user()->id)->count();
            $order_marketing = MarketingRequest::where('marketing_id', Auth::user()->id)->count();
            $telesales_marketing = Client::where('from_user_id', Auth::user()->id)->where('telesales_data', 1)->count();
            return view('Admin.system.index_dashboard', compact(
                'order_marketing', 'facebook_coustmer', 'facebook_our', 'google_coustmer', 'google_our', 'telesales_marketing'));
        }

        //======================================================================
        if(Auth::user()->role == 'hr')
        {
            $all_manage_clients = Client::where('response', 3)->count();
            $all_marketing = Client::where('response', 3)->where('position', 'marketing')->count();
            $all_programming = Client::where('response', 3)->where('position', 'programming')->count();
            $all_programming_marketing = Client::where('response', 3)->where('position', 'all')->count();
            $requests_marketing= MarketingRequest::where('hr_id', Auth::user()->id)->count();
            $requests_programming = ProgrammingProject::where('hr_id', Auth::user()->id)->count();
            return view('Admin.system.index_dashboard', compact(
                'all_manage_clients', 'all_marketing', 'all_programming', 'all_programming_marketing', 'requests_marketing', 'requests_programming',
            ));
        }

        //======================================================================
        if(Auth::user()->role == 'admin')
        {

            //=================== Admin States ==========================
            $all_users = User::where('status', 'active')->count();
            $admins = User::where('status', 'active')->where('role', 'admin')->count();
            $hr_users = User::where('status', 'active')->where('role', 'hr')->count();
            $sales_users = User::where('status', 'active')->where('role', 'sales')->count();
            $marketing_users = User::where('status', 'active')->where('role', 'marketing')->count();
            $programming_users = User::where('status', 'active')->where('role', 'programming')->count();
            //=================== HR States ==========================
            $all_manage_clients_admin = Client::where('response', 3)->count();
            $all_marketing_admin = Client::where('response', 3)->where('position', 'marketing')->count();
            $all_programming_admin = Client::where('response', 3)->where('position', 'programming')->count();
            $all_programming_marketing_admin  = Client::where('response', 3)->where('position', 'all')->count();
            $requests_marketing_admin = MarketingRequest::count();
            $requests_programming_admin = ProgrammingProject::count();
            //============================ Sales State ================
            $clients = Client::count();
            $clients_done = Client::where('response', 3)->count();
            $clients_active = Client::where('response', 1)->count();
            $clients_unactive = Client::where('response', 2)->count();

            $projects = Project::count();
            $projects_waiting = Project::where('status', 'waiting')->count();
            $projects_pending = Project::where('status', 'pending')->count();
            $projects_cancel = Project::where('status', 'cancel')->count();
            $projects_delay = Project::where('status', 'delay')->count();
            $projects_finish = Project::where('status', 'finish')->count();
            $telesales_data = Client::where('telesales_data', 1)->count();

            //============== Marketing State ========================
            $facebook_coustmer_admin = FacebookCoustmerCampaign::count();
            $facebook_our_admin = FacebookOurCampaign::count();
            $google_coustmer_admin = GoogleCoustmerCampaign::count();
            $google_our_admin = GoogleOurCampaign::count();
            $order_marketing_admin = MarketingRequest::count();
            $telesales_marketing_admin = Client::count();

            //============== Programming State ========================
            $order_programming_admin = ProgrammingRequest::count();
            $projects_all_programming_admin = ProgrammingProject::count();
            $projects_waiting_programming_admin = ProgrammingProject::where('project_status', 'waiting')->count();
            $projects_pending_programming_admin = ProgrammingProject::where('project_status', 'pending')->count();
            $projects_cancel_programming_admin = ProgrammingProject::where('project_status', 'cancel')->count();
            $projects_finish_programming_admin = ProgrammingProject::where('project_status', 'finish')->count();
            response()->json(['success' => 'Success', 'projects' => $projects, 'clients' => $clients]);

            return view('Admin.system.index_dashboard', compact(
                'order_marketing_admin', 'facebook_coustmer_admin', 'facebook_our_admin', 'google_coustmer_admin', 'google_our_admin', 'telesales_marketing_admin', 'projects',
                        'all_users', 'admins', 'hr_users', 'sales_users', 'marketing_users', 'programming_users',
                        'all_manage_clients_admin', 'all_marketing_admin', 'all_programming_admin', 'all_programming_marketing_admin', 'requests_marketing_admin', 'requests_programming_admin',
                        'clients', 'clients_done', 'clients_active', 'clients_unactive',
                        'projects_waiting', 'projects_pending', 'projects_cancel', 'projects_delay', 'projects_finish','telesales_data',
                        'order_programming_admin', 'projects_waiting_programming_admin', 'projects_pending_programming_admin', 'projects_cancel_programming_admin', 'projects_finish_programming_admin',
                        'projects_all_programming_admin'
            ));
        }


    }


    //=== Chart sales categories
    public function chart_project_category()
    {
        $web_design = Project::where('category', 1)->where('status', 'finish')->count();
        $marketing = Project::where('category', 2)->where('status', 'finish')->count();
        $graphic_design  = Project::where('category', 3)->where('status', 'finish')->count();
        $other  = Project::where('category', 4)->where('status', 'finish')->count();
        return response()->json([
                'web_design'            => $web_design,
                'marketing'             => $marketing,
                'graphic_design'        => $graphic_design,
                'other'                 => $other
            ]);
    }

    //=== Chart sales Packeges
    public function chart_project_package()
    {
        $mini_package = Project::where('package', 1)->where('status', 'finish')->count();
        $bussines_package = Project::where('package', 2)->where('status', 'finish')->count();
        $super_package  = Project::where('package', 3)->where('status', 'finish')->count();
        $cms  = Project::where('package', 4)->where('status', 'finish')->count();
        $private  = Project::where('package', 5)->where('status', 'finish')->count();

        return response()->json([
                'mini_package'            => $mini_package,
                'bussines_package'        => $bussines_package,
                'super_package'           => $super_package,
                'cms'                     => $cms,
                'private'                 => $private
            ]);
    }
}
