<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Milestone;
use App\User;
use App\Task;

use App\Http\Requests\TaskFormRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFormRequest $request)
    {
        $milestone = Milestone::findOrFail($request->get("milestone_id"));
        $task = new Task([
            "task_description" => $request->get("task_description"),
            "start_date" => $request->get("start_date"),
            "due_date" => $request->get("due_date"),
            "status" => 0
        ]);

        $milestone->tasks()->save($task);

        $task->users()->sync($request->get("users"));

        return redirect()->route("MilestoneTasks", [
            "id" => $milestone->milestone_id,
        ])->with("status", "New task successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->status = !$task->status;
        $task->save();

        return redirect()->route("MilestoneTasks", [
            "id" => $task->milestone->milestone_id,
        ])->with("status", "Task successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
