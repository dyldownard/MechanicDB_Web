<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    //
    public function index() {
      $vehicles = Vehicle::all()->toArray();
      return array_reverse($vehicles);
    }

    public function store(Request $request){
      $vehicle = new Vehicle([
        'make' => $request->input('make'),
        'model' => $request->input('model'),
        'year' => $request->input('year'),
        'mileage' => $request->input('mileage'),
        'type' => $request->input('type'),
        'VIN' => $request->input('VIN')
      ]);
      $vehicle->save();
    }

    public function show($vid){
        $vehicle = Vehicle::find($vid);
        return response()->json($vehicle);
    }

    public function update($vid, Request $request){
      $vehicle = Vehicle::find($vid);
      $vehicle->update($request->all());

      return response()->json('Product Updated!');
    }

    public function destroy($vid){
      $vehicle = Vehicle::find($id);
      $vehicle->delete();

      return response()->json('Product Deleted!');
    }



}
