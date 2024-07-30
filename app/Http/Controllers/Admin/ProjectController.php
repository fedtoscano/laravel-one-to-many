<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        // $projects= Project::paginate(50);
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $project = new Project();
        $types = Type::all();
        return view("admin.projects.create", compact("project", "types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data=$request->validated();
        // dump($request);

        $newProject = Project::create($data);
        return redirect("admin/projects");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        $types = Type::all()->pluck("id");
        return view("admin.projects.show", compact("project", "types"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view("admin.projects.edit", compact("project", "types"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project, EditProjectRequest $request)
    {
        //
        $data = $request->validated();
        $project->update($data);
        return redirect()->route("admin.projects.show", compact("project"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->Route("admin.projects.index");
    }
}
