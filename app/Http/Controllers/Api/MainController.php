<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\ConfigHeater;
use App\Models\ConfigLamp;
use App\Models\DataSensor;

class MainController extends Controller
{
   // [Get] configuration from actuator
   public function get_config($deviceId)
   {
       $device = Device::find($deviceId);
       $configHeater = ConfigHeater::where('device_id', $deviceId)->first();
       $configLamp = ConfigLamp::where('device_id',$deviceId)->first();
       return response()->json([
           "status" => "Success",
           "message" => "Config fetch successfuly",
           "data" => [
               "device" => $device,
               "heater" => $configHeater,
               "lamp" => $configLamp
           ]
       ], 200);
   }

   // [POST] data from sensor
   public function post_data(Request $request, $deviceId)
   {
       try {
           $validated = $request->validate([
               'temperature' => ['decimal:1'],
               'humidity' => ['decimal:1'],
               'light_intensity' => ['decimal:1']
           ]);
           $dataSensor = DataSensor::create([
               'device_id' => $deviceId,
               'temperature' => $request->temperature,
               'humidity' => $request->humidity,
               'light_intensity' => $request->light_intensity,
           ]);
           return response()->json([
               "status" => "Success",
               "message" => "Data successfuly created",
           ], 201);
       } catch (\Exception $e){
           return response()->json([
               "status" => "Error",
               "message" => "Data error",
               "error" => $e->getMessage(),
           ], 400);
       }
   }
}
