<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //

    public function index() {
      $tasks = Task::all()->toArray();
      return $tasks;
    }

    public function store(Request $request){
      $task = new Task([
        'make' => $request->input('make'),
        'model' => $request->input('model'),
        'year' => $request->input('year'),
        'mileage' => $request->input('mileage'),
        'type' => $request->input('type'),
        'VIN' => $request->input('VIN')
      ]);
      $task->save();
    }

    public function show($vid){
        $task = Task::where("vid","=",$vid)->get();
        return response()->json($task);
    }

    public function update($tid, Request $request){
      $task = Task::find($tid);
      $task->update($request->all());

      return response()->json('Task Updated!');
    }

    public function destroy($tid){
      $task = Task::find($tid);
      $task->delete();

      return response()->json('Task Deleted!');
    }

}
