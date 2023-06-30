<?php

namespace App\Http\Controllers;

use App\Models\EditMatrix;
use App\Models\Matrix;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;


class EditMatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('EditMatrix/Index', [
            'matrix' => Matrix::where('name', 'dd')->latest()->get(),
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
        $matrix = new Matrix;
        $matrix->user_id = $request->user()->id;
        $matrix->key = $id->generateNanoId();
        $matrix->name = $request->name;
        $matrix->schema = 'default';
        $matrix->sections = [];
        $matrix->save();

        return redirect(route('matrix.index'));
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
