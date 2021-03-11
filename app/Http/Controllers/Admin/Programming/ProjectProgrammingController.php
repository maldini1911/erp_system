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


class ProjectProgrammingController extends Controller
{

    public function index()
    {

        $rows = ProgrammingProject::paginate(10);
        return view('Admin.programming.projects.index', compact('rows'));
    }

    public function create()
    {
        $programers  = User::where('role', 'programming')->get();
        return view('Admin.programming.projects.create', compact('programers'));
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'project_name'          => 'required',
            'client_id'             => 'sometimes|nullable',
            'project_type'          => 'required',
            'project_price'         => 'sometimes|nullable',
            'amount_paid'           => 'sometimes|nullable',
            'remaining_amount'      => 'sometimes|nullable',
            'start_resgister'       => 'sometimes|nullable',
            'finish_resgister'      => 'sometimes|nullable',
            'date_start'            => 'sometimes|nullable',
            'date_line'             => 'sometimes|nullable',
            'project_level'         => 'sometimes|nullable',
            'project_status'        => 'sometimes|nullable',
            'project_url_demo'      => 'sometimes|nullable',
            'project_url_domin'     => 'sometimes|nullable',
            'project_ftp'           => 'sometimes|nullable',
            'project_upload'        => 'sometimes|nullable|mimes:zip',
            'count_programmers'     => 'sometimes|nullable',
        ]);

        $data['user_id'] = Auth::user()->id;

        if(request()->hasFile('project_upload'))
        {
            $file = $request->file('project_upload');
            $imageName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/programming/projects'), $imageName);
            $data['project_upload'] = $imageName;
        }


        $id_project = ProgrammingProject::insertGetId($data);


        if(request()->has('programmers'))
        {

            $programmer = $request->programmers;

            for($count = 0; $count < count($programmer); $count++)
            {

                $programmers = array(
                    'user_id'       => $programmer[$count],
                    'project_id'    => $id_project
                );

                $insert_programmers[] = $programmers;
            }

            ProjectProgrammer::insert($insert_programmers);

        }
        alert()->success(trans('admin.success-message'), 'Done');
        return redirect('admin/programming/projects');


    }

    public function show($id)
    {
        $row = ProgrammingProject::find($id)->first();
        return view('Admin.programming.projects.show', compact('row'));
    }

    public function edit($id)
    {
        $row = ProgrammingProject::where('id', $id)->first();

        return view('Admin.programming.projects.edit', compact('row'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'project_name'          => 'required',
            'client_id'             => 'sometimes|nullable',
            'project_type'          => 'required',
            'project_price'         => 'sometimes|nullable',
            'amount_paid'           => 'sometimes|nullable',
            'remaining_amount'      => 'sometimes|nullable',
            'start_resgister'       => 'sometimes|nullable',
            'finish_resgister'      => 'sometimes|nullable',
            'date_start'            => 'sometimes|nullable',
            'date_line'             => 'sometimes|nullable',
            'project_level'         => 'sometimes|nullable',
            'project_status'        => 'sometimes|nullable',
            'project_url_demo'      => 'sometimes|nullable',
            'project_url_domin'     => 'sometimes|nullable',
            'project_ftp'           => 'sometimes|nullable',
            'project_upload'        => 'sometimes|nullable|mimes:zip',
        ]);

        $data['user_id'] = Auth::user()->id;

        if(request()->hasFile('project_upload'))
        {
            $file = $request->file('project_upload');
            $folderName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/programming/projects'), $folderName);
            $data['project_upload'] = $folderName;
            $folder = ProgrammingProject::where("id", $id)->first();
            $folder_path = public_path('uploads/programming/projects/'.$folder ->project_upload);
            if(file_exists($folder_path))
            {
                File::delete($folder_path);
            }
        }

        ProgrammingProject::findOrfail($id)->update($data);

        alert()->success(trans('admin.update-message'), 'Done');
        return redirect('admin/programming/projects/'.$id.'/edit');
    }


    public function delete($id)
    {
        $row = ProgrammingProject::where('id', $id);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }


    public function preview_project($id)
    {
        $row = ProgrammingProject::where('id', $id)->first();

        return view('Admin.programming.projects.preview', compact('row'));
    }


}
