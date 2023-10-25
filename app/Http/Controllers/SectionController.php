<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
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
     * Create a new section, add section key to matrix sections array.
     */
    public function createSection(Request $request, Matrix $matrix, Section $section)
    {
        $key = new NanoId;
        $key = $key->generateNanoId();
        $section = new Section;
        $section->user_id = $request->user()->id;
        $section->name = $request->name;
        $section->key = $key;
        $section->modules = [];
        $section->save();

        $matrix = Matrix::where('key', $request->key)->first();
        $sections = $matrix->sections;
        array_push($sections, $key);
        $matrix->sections = $sections;
        $matrix->save();

        //return redirect()->route('matrix.edit', ['key' => $matrix->key]);

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

    public function createModule(Request $request)
    {
        $key = new NanoId;
        $key = $key->generateNanoId();
        $module = new Module;
        $module->user_id = $request->user()->id;
        $module->name = 'Module';
        $module->key = $key;
        $module->elements = [];
        $module->save();
        return $module;
    }

    /**
     * Register a new section, create required modules
     */
    public function registerSection(Request $request, Section $section, Module $module): RedirectResponse
    {
        $sideBySide = $request->type === 'sideBySide';        
        $newModule = $this->createModule($request);
        if($sideBySide) $newModule2 = $this->createModule($request);
        $section = Section::where('key', $request->key)->first();
        $modules = $section->modules;
        array_push($modules, $newModule->key);
        if($sideBySide) array_push($modules, $newModule2->key);
        $section->modules = $modules;
        $section->type = $request->type;
        $section->save();        
        return redirect()->route('matrix.edit', ['key' => $request->parentKey]);
    }
}
