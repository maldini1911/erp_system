<?php

namespace App\Http\Controllers\Admin\Telesales;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\SettingTelesales;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use Carbon\Carbon;
use SweetAlert;
use File;

class ProjectsController extends Controller
{
  public function index(){
    $data = Project::paginate(10);

    return view('Admin.telisales.projects.index',compact('data'));
  }

  public function create(Client $client){

    return view('Admin.telisales.projects.create',compact('client') );

  }

  public function store(Request $request){


    Project::create($this->validateRequest());


      if(request()->has('client_id'))
      {
          $check_commission = Commission::where('client_id', $request->client_id)->first();
          if(!$check_commission)
          {
              $month = Carbon::now()->format('Y/m');

              $commission = SettingTelesales::where('id', 1)->first();

              $price = $request->price;
              $add_commission = $commission->commission;

              $result_commission = (int)($price * $add_commission * (1/100));

                  Commission::create([
                      'commission' => $result_commission,
                      'client_id'  => $request->client_id,
                      'month'      => $month,
                      'user_id'    => Auth::user()->id
                  ]);
              }
      }

    alert()->success(trans('admin.success-message'), 'Done');
    return back();

  }

  public function show(Project $project){
    $category = '';
    $package = '';


      switch($project->category){
        case 1 :
        $category = 'Web Designing';
        break;
        case 2 :
        $category = 'Marketing';
        break;
        case 3 :
        $category = 'Graphics Design';
        break;
        case 4 :
        $category = 'Other';
        break;

      }
      switch ($project->package) {
        case 1 :
        $package = 'Mini Package';
        break;
        case 2 :
        $package = 'Bussines Package';
        break;
        case 3 :
        $package = 'Super Package';
        break;
        case 4 :
        $package = 'CMS(wordpress,joomla,etc)';
        break;
        case 5 :
        $package = 'Private';
        break;
      }

    return view('Admin.telisales.projects.show',compact('project','category','package'));

  }

  public function edit(Request $request, $id)
  {

    $project = Project::where('id', $id)->first();
    return view('Admin.telisales.projects.edit',compact('project'));

  }

  public function update(Project $project){

    $project->update($this->validateRequest());
    alert()->success(trans('admin.update-message'), 'Done');
    return back();

  }

  public function finish(Project $project){
    $project->update($this->validate_project());

    alert()->success(trans('admin.update-message'), 'Done');
    return back()->with('message','Project Status Updated Successfully');
  }

  private function validateRequest(){


  return request()->validate([

      'name'              =>  '',
      'category'          =>  '',
      'package'           =>  '',
      'recieve_date'      =>  '',
      'note'              =>  '',
      'client_id'         =>  '',
      'register_date'     =>  '',
      'price'             =>  '',
      'paid'              =>  '',
      'status'            =>  '',
      'user_id'           =>  '',
    ]);

  }

  private function validate_project(){
    return request()->validate([
      'status'=>'',
      'paid' => '',
    ]);
  }


  public function delete($id)
  {
      $row = Project::where('id', $id);
      $row->delete();
      alert()->success(trans('admin.delete-message'),'Done');
      return back();
  }

}
