<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialityFormRequest;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
 
    public function index()
    {
        $specialities = Speciality::all();
        return view('admin.speciality.index', [
            'specialities' => $specialities
        ]);
    }

    public function create()
    {
        $speciality = new Speciality();
        $speciality->fill([
            'name' => 'Carbon speciality',
            'description' => 'Hello Carbon Speciality',
        ]);
        return view('admin.speciality.form', [
           'speciality' => $speciality
        ]);
    }

    public function store(SpecialityFormRequest $request)
    {
        $speciality = new Speciality();
        $speciality->name = $request->name;
        $speciality->description = $request->description;
        $speciality->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->store('images/speciality', 'public');
            $speciality->image_path = $filename;
            $speciality->save();
        }
        return redirect()->route('admin.speciality.index')->with('success', 'Specalité ajoutée');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect()->route('admin.speciality.index')->with('success', 'Specalité supprimée.');
    }
}
