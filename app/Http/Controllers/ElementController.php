<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Module;
use App\Models\User;
use App\Models\NanoId;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Element $element)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Element $element)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Element $element)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Element $element)
    {
        //
    }

    public function createElement(Request $request)
    {
        $key = new NanoId;
        $key = $key->generateNanoId();
        $element = new Element;
        $element->user_id = $request->user()->id;
        $element->name = 'noNameTest';
        $element->key = $key;
        $element->properties = [];
        $element->save();
        return $element;
    }

    public function registerParagraphElement(Request $request, Module $module, Element $element)
    {
        $newElement = $this->createElement($request);

        $module = Module::where('key', $request->parentKey)->first();
        $elements = $module->elements;
        array_push($elements, $newElement->key);
        $module->elements = $elements;
        $module->type = 'paragraph';
        $module->save();

        return redirect()->route('matrix.edit', ['key' => $request->matrixKey]);
        
    }

    
    
    /**
     * Fetch Element by key
     */
    public function fetch(Request $request, Element $element)
    {        
        $element = Element::where('key', $request->key)->first();
        return $element;
    }
}
