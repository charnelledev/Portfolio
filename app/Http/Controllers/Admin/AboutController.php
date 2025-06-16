<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::latest()->first();
        return view('admin.abouts.edit-about',[
            'about'=>$about
        ]);
    }
    public function update(Request $request){
        $validation = $request->validate([
            
             "name"=>"string|max:255",
                "email"=>"string|max:255",
                "phone"=>"string",
                "address"=>"string|max:255",
                "description"=>"string",
                "summary"=>"string",
                "tagline"=>"string|max:255",
                "home_image"=>"image|mimes:jpg,png,jpeg,gif|max:2048",
                "banner_image"=>"image|mimes:jpg,png,jpeg,gif|max:2048",
                "cv"=>"file|mimes:pdf|max:5120",
        ]
      
    
    
    );
        $about = About::latest()->first();
        $about->fill($validation);

        if ($request->hasFile('home_image')){
            $oldImagepath = $about->home_image ? public_path("storage/images/{$about->home_image}") : null;

            if($oldImagepath && file_exists($oldImagepath)){
                unlink($oldImagepath);
            }
            $file = $request->file('home_image');
            $fileName = '_home_image.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/images'), $fileName);
            // dd($fileName);
            $about->home_image = $fileName;


        }
        if ($request->hasFile('banner_image')){
            $oldImagepath = $about->banner_image ? public_path("storage/images/{$about->banner_image}") : null;

            if($oldImagepath && file_exists($oldImagepath)){
                unlink($oldImagepath);
            }
            $file = $request->file('banner_image');
            $fileName = '_banner_image.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/images'), $fileName);
            // dd($fileName);
            $about->banner_image = $fileName;


        }

        $about->save();
        return redirect()->route('edit-about')->with("success", "information updated successfully");
        
    }

}
