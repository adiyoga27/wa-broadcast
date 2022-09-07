<?php

namespace App\Http\Controllers;

use App\Actions\Device\ListDevicePermission;
use App\Http\Requests\Phonebook\CreatePhonebookRequest;
use App\Models\CategoryPhonebook;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PhonebookController extends Controller
{
    public function index(Request $request)
    {
        $permissionList = (new ListDevicePermission)->execute();

        $settings = Setting::whereIn('id', $permissionList)->get();

        if ($request->ajax()) {
            $data = CategoryPhonebook::whereIn('setting_id', $permissionList)->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->addColumn('device', function ($row) {
                    return $row->setting->name;
                })
                ->rawColumns(['action', 'device'])
                ->make(true);
        }
        return view('phonebook.index', compact(['settings']));
    }
    public function store(CreatePhonebookRequest $request)
    {
        CategoryPhonebook::create($request->toArray());
        return redirect()->back()->with('success', 'Phonebook created successfully.');
    }
}
