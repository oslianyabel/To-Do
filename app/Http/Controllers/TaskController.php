<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class TaskController extends Controller
{

    public function index(): View
    {
        $task = Task::all();
        //console.log($task);
        return view('index2', compact('task'));
    }

    public function create(): View
    {
        return view("create");
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            ["title" => "required",
            "description" => "required"]
        );
        Task::create($request->all());
        return redirect()->route("index")->with("success", "Nueva tarea creada!");
    }

    public function edit($id): View
    {
        $task = Task::find($id);
        return view("edit", ["task" => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route("index")->with("success", "Tarea actualizada!");
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route("index")->with("success", "Tarea eliminada!");
    }

    public function update_status($id, String $status){
        $task = Task::find($id);
        $task->update(["status"=>$status]);
        return redirect()->route("index")->with("success", "Task $status");
    }
}
