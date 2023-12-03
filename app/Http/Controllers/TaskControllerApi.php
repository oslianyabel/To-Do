<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class TaskControllerApi extends Controller
{
    public function index(){
        $task = Task::all();
        return response()->json($task);
    }

    public function store(Request $request){
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->status = $request->status;
        $task->save();
        $data = [
            "message" => "task created successfully",
            "data" => $task
        ];
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->status = $request->status;
        $task->save();
        $data = [
            "message" => "task updated successfully",
            "data" => $task
        ];
        return response()->json($data);
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        $data = [
            "message" => "task deleted successfully",
            "data" => $task
        ];
        return response()->json($data);
    }

    public function update_status($id, $status){
        $task = Task::find($id);
        $task->status = $status;
        $task.save();
        $data = [
            "message" => "status change successfully",
            "data" => $task
        ];
        return response()->json($data);
    }
}
