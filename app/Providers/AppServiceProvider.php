<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // Using Closure based composers
      view()->composer('Admin.system.index_dashboard', function ($view) {
        $clients = \DB::table('clients')->count();
        $view->clients = $clients;

        $target = \DB::table('setting_telesales')->where('id',1)->get();
        $view->target=$target;

        $done_clients = \DB::table('clients')->where('response',3)->count();
        $view->done_clients = $done_clients;

        $total_projects = \DB::table('projects')->count();
        $view->total_projects = $total_projects;

        $finished_projects = \DB::table('projects')->where('status', 'finish')->get();
        $finished_projects_count = \DB::table('projects')->where('status', 'finish')->count();
        $total_price = 0 ;
        $comm_val = 0;
        foreach($target as $target_val){
          $commission = $target_val->commission;
          $comm_val = $commission;
        }
        $comm_val = $commission;

        foreach($finished_projects as $finished_project){
          $price =   ($comm_val/100) *  $finished_project->price;
          $total_price += $price;
        }
        $view->total_price = $total_price;
        $view->finished_projects_count = $finished_projects_count;
      });


      view()->composer('home', function ($view) {

        $total_projects = \DB::table('projects')->count();
        $view->total_projects = $total_projects;

        $finished_projects_count = \DB::table('projects')->where('status', 'finish')->count();
        $view->finished_projects_count = $finished_projects_count;
        
        $done_clients = \DB::table('clients')->where('response',3)->count();
        $view->done_clients = $done_clients;

      });
    }
}
