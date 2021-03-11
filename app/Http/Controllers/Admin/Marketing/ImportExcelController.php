<?php

namespace App\Http\Controllers\Admin\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TeleSalesDataImport;
use Maatwebsite\Excel\Facades\Excel;
use SweetAlert;
use App\User;

class ImportExcelController extends Controller
{
    public function importTelesalesData(Request $request)
    {
        $this->validate(request(), [
            'telesales_data' => 'required|mimes:xlsx'
        ]);

        $users = User::where('role', 'sales')->get();

        Excel::import(new TeleSalesDataImport($users), $request->file('telesales_data'));

        alert()->success(trans('admin.success-message'), 'Done');
        return back();
    }
}
