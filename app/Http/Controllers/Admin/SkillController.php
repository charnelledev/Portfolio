<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
     public function index()
    {
        $skills = Skill::with('service')->get();
        return view('admin.skills.index-skills', compact('skills'));
    }
    public function destroy(Skill $skill)
{
    $skill->delete();
    return redirect()->route('index-skills')->with('success', 'Skill supprimé avec succès.');
}
}
