<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCollorRequest;
use App\Http\Requests\UpdateCollorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.colors.index')->with([
            'colors' => Color::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCollorRequest $request)
    {
        if($request->validated()){
            Color::create([
                'name' => $request->name
            ]);
            return redirect()->route('admin.colors.index')->with('success', 'Color Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return redirect()->route('admin.colors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.colors.edit')->with([
            'color' => $color
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollorRequest $request, Color $color)
    {
        $color->update([
            'name' => $request->name        
        ]);

        return redirect()->route('admin.colors.index')->with('success', 'Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.colors.index')->with('success', 'Color Deleted Successfully');
    }
}
