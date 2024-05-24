<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Functions\Helpers;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

      $projects = Project::all()->sortDesc();

      return view('admin.projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {

      $form_data = $request->all();

      $new_item = new Project();
      $new_item->name = $form_data['name'];
      $new_item->slug = Helpers::generateSlug($new_item->name, new Project());
      $new_item->creator = $form_data['creator'];
      $new_item->objective = $form_data['objective'];
      $new_item->description = $form_data['description'];

      $new_item->save();

      return redirect()->route('admin.projects.index')->with('success', 'Progetto inserito correttamente');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {

      $form_data = $request->all();

      $project->name = $form_data['name'];
      $project->slug = Helpers::generateSlug($project->name, new Project());
      $project->creator = $form_data['creator'];
      $project->objective = $form_data['objective'];
      $project->description = $form_data['description'];

      $project->update();

      return redirect()->route('admin.projects.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
      $project->delete();

      return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');
    }
}
