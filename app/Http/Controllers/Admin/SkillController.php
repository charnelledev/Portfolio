<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
     public function index()
    {
       
        $skills = Skill::all();
        return view('admin.skills.index-skills', compact('skills'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Proficiency' => 'required|string|max:255',
            'Service_id' => 'required|exists:services,id',
        ]);

        Skill::create($request->all());

        return redirect()->route('index-skills')->with('success', 'Skill créé avec succès.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit-skills', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
           'Name' => 'required|string|max:255',
            'Proficiency' => 'required|string|max:255',
            'Service_id' => 'required|exists:services,id',
        ]);

        $skill->update($request->all());

        return redirect()->route('index-skills')->with('success', 'Skill mis à jour avec succès.');
    }

    public function destroy(Request $request)
    {
        $skill = Skill::findOrFail($request->id);
        $skill->delete();

        return redirect()->route('index-skills')->with('success', 'Skill supprimé avec succès.');
    }
}
