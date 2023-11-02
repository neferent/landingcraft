<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Module;
use App\Models\User;
use App\Models\NanoId;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Module/Index', [
            'modules' => Module::where('user_id', $request->user()->id)->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createModule(Request $request)
    {
        $key = new NanoId;
        $key = $key->generateNanoId();
        $module = new Module;
        $module->user_id = $request->user()->id;
        $module->name = 'none for now';
        $module->key = $key;
        $module->elements = [];
        $module->save();
        return $module;
    }

    /**
     * 
     */
    public function create(Request $request, Section $section, Module $module)
    {
        $module = $this->createModule($request);
        $section = Section::where('key', $request->key)->first();

        $modules = $section->modules;
        array_push($modules, $module->key);
        $section->modules = $modules;
        $section->save();


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = new NanoId;
        $newKey = $id->generateNanoId();
        $module = new Module;
        $module->user_id = $request->user()->id;
        $module->key = $newKey;
        $module->name = $request->name;
        $module->type = $request->type;
        $module->modules = [];
        $module->save();

        //return redirect(route('matrix.update'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        //
    }

    /**
     * Fetch Module by key
     */
    public function fetch(Request $request, Module $module)
    {        
        $module = Module::where('key', $request->key)->first();
        return $module;
    }
}
