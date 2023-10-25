<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Section;
use App\Models\User;
use App\Models\NanoId;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;


class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Matrix/Index', [
            'matrices' => Matrix::where('user_id', $request->user()->id)->latest()->get(),
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
     * Creates and stores a new section
     */
    public function newMatrix(Request $request): RedirectResponse
    {
        $id = new NanoId;
        $matrix = new Matrix;
        $matrix->user_id = $request->user()->id;
        $matrix->key = $id->generateNanoId();
        $matrix->name = $request->name;
        $matrix->schema = 'default';
        $matrix->sections = [];
        $matrix->save();

        return redirect('/matrix');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Matrix $matrix)
    {
        return Inertia::render('Matrix/Show', [
            'matrix' => Matrix::where('name', $request->key),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editMatrix(string $key)
    {
        return Inertia::render('Matrix/Edit', [
            'matrix' => Matrix::where('key', $key)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMatrix(Request $request, Matrix $matrix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Matrix $matrix)
    {
        $matrix = Matrix::where('key', $request->key)->first();
        $this->authorize('delete', $matrix);
        $matrix->delete();
       // return redirect()->route('matrix.index');
    }

    /** 
     * Fetch matrix based on key.
     */
    public function fetchMatrix(Request $request, Matrix $matrix) 
    {
        $matrix = Matrix::where('key', $request->key)->first();

        return $matrix;
    }

    /**
     * Fetch all matrices of a user
     */
    public function fetchAllMatrices(Request $request, Matrix $matrix)
    {
        $matrices = Matrix::where('user_id', $request->user()->id)->latest()->get();
        return $matrices;
    }
}
