<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index(Request $request)
    {
        $services = Service::filter($request)->get();
        // var_dump($services);
          
        return view('admin.services.index-services', compact('services'));
    }

  
    // public function create()
    // {
    //     return view('admin.services.create');
    // }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Service::create($validatedData);
        return redirect()
        ->route('index-services')
        ->with('success', 'Service créé avec succès.');
    }

  
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit-services', compact('service'));
    }

   
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        

        $service = Service::findOrFail($request->id);
        $service->fill($validatedData);
        $service->save();

        return redirect()->route('index-services')->with('success', 'Service modifié avec succès.');
    }

   
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:services,id',
        ]);

        $service = Service::findOrFail($request->id);
        $service->delete();

        return redirect()->route('index-services')->with('success', 'Service supprimé avec succès.');
    }
}
