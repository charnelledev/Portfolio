<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\media;
use Database\Seeders\MediaSeeder;
use Illuminate\Http\Request;


class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::latest()->get();
        return view('admin.medias.index-medias', compact('medias'));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'link' => 'required|url|max:255|active_url',
                'icon' => 'required|string|max:255',


            ],
            [
                'link.required' => 'le lien est obligatoire',
                'link.url' => 'le lien doit etre une url valide (ex:https://...)',
                'link.active_url' => 'le lien doit pointer vers un site actif',
                'link.max' => 'le lien ne doit pas depasser :max caractere',
                'link.required' => 'le code de l\'icon est obligatoire',
                'link.max' => 'le code icon ne doit pas depasser :max caracteres',
            ]
        );
        Media::create($validateData);
        return redirect()
            ->route('index-media')
            ->with('sucess', 'reseau social ajouter avec success');
    }
    //  public function destroy()
    // {
    //     $product = Media::findOrFail();
    //     $product->delete();
    //     return redirect()->route('index-media')
    //         ->with('errot', 'media deleted successfully.');
    // }
    public function destroy(Request $request)
    {
        $media = Media::findOrFail($request->id); 
        $media->delete();

        return redirect()->route('index-media')->with('success', 'Média supprimé');
    }
}
