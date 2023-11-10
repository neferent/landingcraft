<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Models\User;
use App\Models\NanoId;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SeoController extends Controller
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
        // $id = new NanoId;
        // $seo = new Seo;

        // $seo->key = $id->generateNanoId();
        // $seo->meta_title = 'null';
        // $seo->meta_description = 'null';
        // $seo->keywords = [];
        // $seo->allow_robots = false;
        // $seo->canonical = 'null';
        // $seo->og_title = 'null';
        // $seo->og_description = 'null';
        // $seo->og_image = 'null';
        // $seo->save();
        // return $seo;
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
    public function show(Seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seo $seo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seo $seo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seo $seo)
    {
        //
    }
}
