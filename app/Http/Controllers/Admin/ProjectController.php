<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{


    public function index()
    {
        $projects = Project::latest()->paginate(5);
        return view('admin.projects.index-projects', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create-projects');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);
        return redirect()->route('index-projects')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit-projects',
        compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project = Project::findOrFail($request->id);
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);
        return redirect()->route('index-projects')->with('success', 'Projet mis à jour.');
    }
public function destroy(Request $request)
{
    $project = Project::findOrFail($request->id);
    $project->delete();
    return redirect()->back()->with('success', 'Projet supprimé avec succès.');
}

    // public function destroy(Project $project)
    // {
    //     if ($project->image) {
    //         Storage::disk('public')->delete($project->image);
    //     }

    //     $project->delete();
    //     return redirect()->route('index-projects')->with('success', 'Projet supprimé.');
    // }
}
