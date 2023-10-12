<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use App\Models\NanoId;
use App\Models\Module;
use App\Controllers\ModuleController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Section/Index', [
            'sections' => Section::where('user_id', $request->user()->id)->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $id = new NanoId;
        $newKey = $id->generateNanoId();
        $section = new Section;
        $section->user_id = $request->user()->id;
        $section->key = $newKey;
        $section->name = $request->name;
        $section->type = 'null';
        $section->modules = [];
        $section->save();

        return redirect('/matrix');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $section = Section::where('key', $request->key)->first();
        $this->authorize('update', $section);
                $validated = $request->validate([
            'type' => 'string|max:32',
        ]);

       $section->update($validated);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }

    /**
     * Fetch Section by key
     */
    public function fetch(Request $request, Section $section)
    {        
        $section = Section::where('key', $request->key)->first();
        return $section;
    }

    /**
     * Create a new module, add module key to section modules array.
     */
    public function updateModules(Request $request, Section $section, Module $module): RedirectResponse
    {
        $key = new NanoId;
        $key = $key->generateNanoId();
        $module = new Module;
        $module->user_id = $request->user()->id;
        // $module->name = $request->name;
        $module->name = 'noName';
        $module->key = $key;
        $module->elements = [];
        $module->save();

        $section = Section::where('key', $request->key)->first();
        $modules = $section->modules;
        array_push($modules, $key);
        $section->modules = $modules;
        $section->save();

        return redirect()->route('section.edit', ['key' => $section->key]);







    }
}
