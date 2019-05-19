<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

use App\Services\Twitter;

// use App\Mail\ProjectCreated;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('can:update,project')->except(['index', 'create', 'store']);
    }

    public function index()
    {
        // $projects = auth()->user()->projects;
        // // $projects = Project::where('owner_id', auth()->id())->get();    //select * from projects where owner_id = 4

        // return view('projects.index', compact('projects'));

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        // event(new ProjectCreated($project));

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        
        return view('projects.show', compact('project'));
    }

    protected function validateProject()
    {
        return request()->validate([                                       //nilagay sa variable para kapag madaming parameters hind na paulit ulit
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255']
        ]);
    }
}
