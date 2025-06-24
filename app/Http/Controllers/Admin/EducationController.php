<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('admin.educations.index-educations', compact('educations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'institution' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        Education::create($validatedData);

        return redirect()->route('index-educations')->with('success', 'Éducation ajoutée avec succès.');
    }

    public function edit($id)
    {
        $educations = Education::findOrFail($id);
        return response()->json($educations); // Pour récupérer les données dans une modale JS
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:educations,id',
            'institution' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        $education = Education::findOrFail($request->id);
        $education->update($validatedData);

        return redirect()->route('index-educations')->with('success', 'Éducation mise à jour avec succès.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:educations,id',
        ]);

        $education = Education::findOrFail($request->id);
        $education->delete();

        return redirect()->route('index-educations')->with('success', 'Éducation supprimée avec succès.');
    }
}


