<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Project;
use App\Http\Requests\ProjectFormRequest;

class ProjectController extends Controller
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
        $users = User::all();
        return view('projects.create', [ 'users' => $users, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectFormRequest $request)
    {
        $project = new Project([
            'description' => $request->get("description"),
            'start_date' => $request->get("start_date"),
            'end_date' => $request->get("end_date"),
        ]);

        $project->save();

        $project->users()->sync($request->get("users"));

        return redirect("/projects/new")->with("status", "New project created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::all();
        $project = Project::findOrFail($id);
        $dueMilestones = $project->milestones->where('due_date', '<', Carbon::now());
        $milestones = $project->milestones->where('due_date', '>=', Carbon::now());
        return view('milestones.index', [
            'projects' => $projects,
            'pid' => $id,
            'dueMilestones' => $dueMilestones,
            'milestones' => $milestones,
        ]);
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
    public function update(Request $request, $id)
    {
        //
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
