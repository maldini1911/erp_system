<?php

namespace App\Http\Controllers\Admin\Programming;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ProgrammingProject;
use App\models\ProjectProgrammer;
use SweetAlert;
use App\User;
use File;
use Auth;


class ProjectsProgrammersController extends Controller
{

    public function index($id)
    {

        $rows = ProjectProgrammer::paginate(10);
        $project_id = $id;

        return view('Admin.programming.programmers.index', compact('rows', 'project_id'));
    }

    public function create($id)
    {
        $programers  = User::where('role', 'programming')->get();
        $project_id = $id;
        return view('Admin.programming.programmers.create', compact('programers', 'project_id'));
    }


    public function store(Request $request)
    {

        if(request()->has('user_id'))
        {

            $programmer = $request->user_id;

            for($count = 0; $count < count($programmer); $count++)
            {

                $programmers = array(
                    'user_id'       => $programmer[$count],
                    'project_id'    => $request->project_id
                );

                $insert_programmers[] = $programmers;
            }

            ProjectProgrammer::insert($insert_programmers);
        }

        alert()->success(trans('admin.success-message'), 'Done');
        return back();


    }


    public function edit($id)
    {

        $programers = User::where('role', 'programming')->get();
        $row = ProjectProgrammer::where('id', $id)->first();

        return view('Admin.programming.programmers.edit', compact('row', 'programers'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'user_id' => 'required',
        ]);

        ProjectProgrammer::findOrfail($id)->update($data);

        alert()->success(trans('admin.update-message'), 'Done');
        return back();
    }


    public function delete($id)
    {
        $row = ProjectProgrammer::where('id', $id);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }


}
