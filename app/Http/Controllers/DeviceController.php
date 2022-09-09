<?php

namespace App\Http\Controllers;

use App\Http\Requests\Device\CreateDeviceRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Setting::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="device/whatsapp/' . $row->id . '" class="btn btn-warning" title="Permission"><i class="mdi mdi-settings"></i></a>
                        <a href="javascript:void(0)" class="btn btn-primary" title="Edit Device" data-bs-toggle="modal" data-bs-target="#modal_edit" data-id="' . $row->id . '"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="btn btn-danger" title="Hapus Device" id="btnDelete" data-id="' . $row->id . '"><i class="mdi mdi-delete-sweep"></i></a>
                        ';
                })
                ->make(true);
        }
        return view('setting.device.index');
    }

    public function store(CreateDeviceRequest $request)
    {
        try {
            //code...
            Setting::create([
                'name' => $request->name,
                'api_key' => $request->api_key,
                'url' => $request->url,
                'port' => $request->port,
                'is_active' => $request->is_active == 'on' ? 1 : 0,
            ]);
            return redirect()->back()->with('success', 'Device created successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show($id)
    {
        $device = Setting::find($id);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $device
        ]);
    }

    public function update(CreateDeviceRequest $request, $id)
    {
        try {
            //code...
            $device = Setting::find($id);
            $device->update([
                'name' => $request->name,
                'api_key' => $request->api_key,
                'url' => $request->url,
                'port' => $request->port,
                'is_active' => $request->is_active == 'on' ? 1 : 0,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $device
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $device = Setting::find($id);
            $device->delete();
            return response()->json([
                'status' => true,
                'message' => 'success',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
