<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


/**
 * 
 * 
 * Verb	URI	Action	Route Name
* GET	/photos	index	photos.index
* GET	/photos/create	create	photos.create
*POST	/photos	store	photos.store
*GET	/photos/{photo}	show	photos.show
*GET	/photos/{photo}/edit	edit	photos.edit
*PUT/PATCH	/photos/{photo}	update	photos.update
*DELETE	/photos/{photo}	destroy	photos.destroy
 */
