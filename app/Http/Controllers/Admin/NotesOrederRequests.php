<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttachmentUser;
use SweetAlert;
use App\User;
use App\Models\OrderRequestNotes;
use File;
use Auth;

class NotesOrederRequests extends Controller
{

    public function delete($id)
    {
        $row = OrderRequestNotes::where('id', $id);
        $row->delete();
        alert()->error(trans('admin.delete-message'), 'Done');
        return back();
    }








}
