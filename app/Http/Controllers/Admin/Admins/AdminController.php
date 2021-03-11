<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttachmentUser;
use SweetAlert;
use App\User;
use File;
use Auth;

class AdminController extends Controller
{

    public function index()
    {

        $admins = User::paginate(10);
        return view('Admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('Admin.admins.create');
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'name'          => 'required|string',
            'email'         => 'sometimes|nullable|string|email|unique:users',
            'mobile'        => 'sometimes|nullable',
            'password'      => 'required',
            'image'         => 'sometimes|nullable|mimes:jpg,jpeg,png,svg',
            'address'       => 'sometimes|nullable',
            'date_start'    => 'sometimes|nullable',
            'number_cart'   => 'sometimes|nullable',
            'salary'        => 'sometimes|nullable',
            'role'          => 'required',
        ]);


        if(request()->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/admins/profile'), $imageName);
            $data['image'] = $imageName;
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        alert()->success(trans('admin.success-message'), 'Done');
        return redirect()->route('admins.index');


    }

    public function show($id)
    {
        $user =  User::find($id)->first();
        return view('Admin.admins.show', compact('user'));
    }

    public function edit($id)
    {
        $row = User::where('id', $id)->first();
        $attachments = AttachmentUser::where('user_id', $id)->get();
        return view('Admin.admins.edit', compact('row', 'attachments'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'name'          => 'required|string',
            'email'         => 'sometimes|nullable|string|email|unique:users,email,'.$id,
            'mobile'        => 'sometimes|nullable',
            'password'      => 'sometimes|nullable',
            'image'         => 'sometimes|nullable|mimes:jpg,jpeg,png,svg',
            'address'       => 'sometimes|nullable',
            'date_start'    => 'sometimes|nullable',
            'number_cart'   => 'sometimes|nullable',
            'salary'        => 'sometimes|nullable',
            'role'          => 'required',
        ]);


        $img = User::find($id)->first();
        if(request()->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/admins/profile'), $imageName);
            $data['image'] = $imageName;


            if($img)
            {
                $image_path = public_path('uploads/admins/profile/'.$img->image);

                if(file_exists($image_path))
                {
                    File::delete($image_path);
                }

            }

        }

        if(request()->has('password') && request()->get('password') != '')
        {
            $data['password'] = bcrypt($data['password']);
            User::findOrfail($id)->update($data);
        }else{
            unset($data['password']);
            User::findOrfail($id)->update($data);
        }


        alert()->success(trans('admin.update-message'), 'Done');
        return redirect()->route('admins.edit',  $id);
    }


    public function destroy($id)
    {
        $row = User::where('id', $id);
        $row->delete();
        alert()->error('Delete Success', 'Done');
        return back();
    }

    public function profile($id)
    {
        $row = User::where('id', $id)->first();
        return view('Admin.admins.profile', compact('row'));
    }


    public function attchments(Request $request)
    {

        if($request->hasFile('file'))
        {
            $file_input = $request->file('file');
            $file_type = $request->input('file_type');

            for($count =0; $count < count($file_input); $count++)
            {

                $data_attchments = array(
                    'file_type'        => $file_type[$count],
                    'user_id'          => $request->user_id
                );


            if($files = $file_input)
            {

                foreach($files as $file)
                {
                    $fileName = time().$file->getClientOriginalName();

                    $file->move(public_path('uploads/admins/attachments'), $fileName);


                    $data_attchments['file'] = $fileName;

                }

                $data_attchments_insert[] = $data_attchments;
            }

            }


            AttachmentUser::insert($data_attchments_insert);
        }
        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }


    public function attchments_show(Request $request, $id)
    {

        $rows = AttachmentUser::where('user_id', $id)->get();
        return view('Admin.admins.attachments', compact('rows'));
    }

    public function edit_profile(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'name'          => 'required|string',
            'email'         => 'required|string|email|unique:users,email,'.$id,
            'mobile'        => 'sometimes|nullable',
            'image'         => 'sometimes|nullable|mimes:jpg,jpeg,png,svg',
        ]);


        $img = User::find($id)->first();

        if(request()->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/admins/profile'), $imageName);
            $data['image'] = $imageName;

            if($img)
            {
                $image_path = public_path('uploads/admins/profile/'.$img->image);

                if(file_exists($image_path))
                {
                    File::delete($image_path);
                }

            }

        }


        User::findOrfail($id)->update($data);

        alert()->success(trans('admin.update-message'), 'Done');

        return back();
    }


    public function attchment_edit(Request $request, $id)
    {

      
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $file_type = $request->input('file_type');

            $fileName = time().$file->getClientOriginalName();

            $file->move(public_path('uploads/admins/attachments'), $fileName);

            $img = AttachmentUser::where('id', $id)->first();

            if($img)
            {
                $image_path = public_path('uploads/admins/attachments/'.$img->file);

                if(file_exists($image_path))
                {
                    File::delete($image_path);
                }

            }
                    
            AttachmentUser::where('id', $id)->update([
                'file'          => $fileName,
                'file_type'     => $file_type,
                'user_id'       => $request->user_id
            ]);

        }else{

            AttachmentUser::where('id', $id)->update([
                'user_id' => $request->user_id,
                'file_type' => $request->file_type
            ]);
        }
        
        alert()->success(trans('admin.update-message'), 'Done');
        return back();
    }


    public function attchment_delete($id)
    {
        $row =  AttachmentUser::find($id);

        if($row)
        {
            $image_path = public_path('uploads/admins/attachments/'.$row->file);

            if(file_exists($image_path))
            {
                File::delete($image_path);
            }

        }

        $row->delete();

        alert()->success(trans('admin.delete-message'), 'Done');
        return back();
    }

}
