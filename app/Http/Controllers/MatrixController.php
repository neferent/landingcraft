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
    public function editMatrix(Request $request, Matrix $matrix)
    {
        return Inertia::render('Matrix/Edit', [
            'matrix' => Matrix::where('key', $request->key)->first(),
        ]);

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

    public function updateSections(Request $request, Matrix $matrix, Section $section)
    {
       // $this->authorize('update', $matrix);

        // $section = new Section;
        // $section->user_id = $request->user()->id;
        // $section->key = $id->generateNanoId();
        // $section->sections = [];
        // $section->save();

        // return redirect('/matrix/edit');

        $key = new NanoId;
        $key = $key->generateNanoId();
        $section = new Section;
        $section->user_id = $request->user()->id;
        $section->key = $key;
        $section->modules = [];

        $section->save();

       $matrix = Matrix::where('key', $request->key)->first();
       $sections = $matrix->sections;
       array_push($sections, $key);
       $matrix->sections = $sections;



       $matrix->save();
       //$matrix->name = 'newName';
       //$matrix->save();

       
        //$matrix[0]->sections
        //$sections = $matrix[0]->sections;

        //$temp = $matrix[0]->sections;
        //array_push($temp, 'test');
        //$matrix[0]->sections = $temp;

        
        

       //array_push($matrix[0]->sections, 'test');


        //$matrix->update();

       // $name = $m[0]->name;

        //return $name;

        
// return $sections;
    }
}
