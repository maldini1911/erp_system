<?php

namespace App\Http\Controllers\Admin\Programming;

use App\Http\Controllers\Controller;
use App\Models\ManageClient;
use Illuminate\Http\Request;
use App\models\ProgrammingRequest;
use App\models\ProjectProgrammer;
use App\Models\ProjectTask;
use SweetAlert;
use Auth;

class TasksController extends Controller
{

    public function index()
    {

        $rows = ProjectProgrammer::paginate(10);
        return view('Admin.programming.tasks.index', compact('rows'));
    }

    public function create($project, $user)
    {
        $project_id = $project;
        $user_id = $user;
        return view('Admin.programming.tasks.create', compact('project_id', 'user_id'));
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'project_id'             => 'required',
            'programmer_id'          => 'required',
            'task_name'              => 'required',
            'task_dateline'               => 'sometimes|nullable',
        ]);

        ProjectTask::create($data);
        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }

    public function show($project, $user)
    {
        $rows = ProjectTask::where('project_id', $project)->where('programmer_id', $user)->paginate(10);
        $project_id = $project;
        $user_id = $user;
        return view('Admin.programming.tasks.show', compact('rows', 'project_id', 'user_id'));
    }

    public function edit($id)
    {
        $row = ProjectTask::where('id', $id)->first();
        return view('Admin.programming.tasks.edit', compact('row'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'project_id'             => 'required',
            'programmer_id'          => 'required',
            'task_name'              => 'required',
            'task_dateline'          => 'sometimes|nullable',
            'status_task'            => 'sometimes|nullable',
            'status_check_tester'    => 'sometimes|nullable',
        ]);


        ProjectTask::where('id', $id)->update($data);
        alert()->success(trans('admin.udpate-message'), 'Done');
        return back();
    }


    public function delete($id)
    {
        $row = ProjectTask::where('id', $id);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }



    //===> Complate Task Programmer
    public function complate_task_programmer($id)
    {
        ProjectTask::where('id', $id)->update(['status_task' => 'yes']);
        alert()->success(trans('admin.update-message'), 'Done');
        return back();
    }


    //===> Complate Task Programmer
    public function complate_task_teaster($id)
    {
        ProjectTask::where('id', $id)->update(['status_check_tester' => 'yes']);
        alert()->success(trans('admin.update-message'), 'Done');
        return back();
    }



}
