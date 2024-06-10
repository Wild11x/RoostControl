<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\User;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Device::all();

        // Add alert on delete button
        $title = 'Delete device!';
        $text = "Are you sure you want to delete?";
        view()->share($title, $text);

        return view('content.manage.device.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('farmer')->get();
        return view('content.manage.device.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                "id" => ['required', 'max:6'],
                "user_id" => ['required'],
                "name" => ['required'],
            ]);

            $device = new Device;
            $device->id = $request->id;
            $device->user_id = $request->user_id;
            $device->name = $request->name;
            $device->save();

            toastr()->success("Device Created Successfully");
            return redirect()->route('manage.devices.index');
        } catch (\Illuminate\Database\QueryException $e){
            toastr()->error($e->getMessage());
            return redirect()->route('manage.devices.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $device = Device::find($id);
        $users = User::role('farmer')->get();
        return view('content.manage.device.edit', compact('device', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validated = $request->validate([
                "id" => ['required', 'max:6'],
                "user_id" => ['required'],
                "name" => ['required'],
            ]);

            $device = Device::find($id);
            $device->id = $request->id ?? $device->id;
            $device->user_id = $request->user_id ?? $device->user_id;
            $device->name = $request->name ?? $device->name;
            $device->save();

            toastr()->success("Device Updated Successfully");
            return redirect()->route('manage.devices.index');
        } catch (\Illuminate\Database\QueryException $e){
            toastr()->error($e->getMessage());
            return redirect()->route('manage.devices.edit',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
