<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
     public function index()
    {
        $testimonials = Testimonial::latest()->paginate(5);
        return view('admin.testimonials.index-testimonials', compact('testimonials'));
    }
     public function create()
    {
        return view('admin.testimonials.create-testimonials');
    }
     
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|max:2048',
            'name' => 'required|string',
            'function' => 'required|string',
            'testimony' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('testimonials', 'public');
        }

        Testimonial::create([
                 'photo' => $path,
            'name' => $request->name,
            'function' => $request->function,
            'testimony' => $request->testimony,
            'rating' => $request->rating,
       
        ]);

        return back()->with('success', 'Testimonial created successfully.');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string',
            'function' => 'required|string',
            'testimony' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'photo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('testimonials', 'public');
            $testimonial->photo = $path;
        }

        $testimonial->update($request->only('name', 'function', 'testimony', 'rating'));

        return back()->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted.');
    }
}
