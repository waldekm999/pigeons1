<?php

namespace App\Http\Controllers;

use App\Models\Pigeon;
use Illuminate\Http\Request;

class PigeonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pigeons = Pigeon::latest()->paginate(5);

       return view('pigeons.index', compact('pigeons'))
           ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pigeons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ring' => 'required|integer|unique:pigeons,ring',
            'name' => 'required|string|max:255',
            'birth_year' => 'integer',
            'status' => 'required',
        ]);

        Pigeon::create($request->all());

        return redirect()->route('pigeons.index')
            ->with('success', 'Gołąb został dodany prawidłowo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pigeon  $pigeon
     * @return \Illuminate\Http\Response
     */
    public function show(Pigeon $pigeon)
    {
        return view('pigeons.show', compact('pigeon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pigeon  $pigeon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pigeon $pigeon)
    {
        return view('pigeon.edit', compact('pigeon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pigeon  $pigeon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pigeon $pigeon)
    {
        $request->validate([
            'ring' => 'required|integer|unique:pigeons,ring',
            'name' => 'required|string|max:255',
            'birth_year' => 'integer',
            'status' => 'required',
        ]);

        $pigeon->update($request->all());

        return redirect()->route('pigeons.index')
            ->with('success', 'Poprawnie zmieniono dane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pigeon  $pigeon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pigeon $pigeon)
    {
        $pigeon->delete();

        return redirect()->route('pigeons.index')
            ->with('success', 'Dane usunięto prawidłowo');
    }
}
