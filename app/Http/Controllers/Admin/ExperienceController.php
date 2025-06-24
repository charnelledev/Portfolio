<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        // Utilise simplement all() si tu n’as pas défini de filtre personnalisé
        $experiences = Experience::all();
        return view('admin.experiences.index-experiences', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create-experiences');
    }

    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            
        ]);


        Experience::create($validatedData);
        return redirect()
            ->route('index-experiences')
            ->with('success', 'Expérience créée avec succès.');
    }

public function update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|exists:experiences,id',
        'company' => 'required|string|max:255',
        'period' => 'nullable|string|max:255',
        'position' => 'nullable|string|max:255',
    ]);

    $experience = Experience::findOrFail($request->id);
    $experience->update($validatedData);

    return redirect()->route('index-experiences')->with('success', 'Expérience mise à jour.');
}
 

   

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:experiences,id',
        ]);

        $experience = Experience::findOrFail($validatedData['id']);
        $experience->delete();

        return redirect()
            ->route('index-experiences')
            ->with('success', 'Expérience supprimée avec succès.');
    }
}
