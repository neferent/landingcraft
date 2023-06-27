<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Id;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $id = new Id();
        $id3 = $id->generateId();
        return response($id3);
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
    public function show(Matrix $matrix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matrix $matrix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matrix $matrix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matrix $matrix)
    {
        //
    }
}
