<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $genres = Genre::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $genres = Genre::paginate(10);
        }
        return view('genres.index',['genres'=>$genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Proses Validasi

        $validateData = $request->validate([
            'name'          => 'required|max:50',
            'is_active'     => 'required|max:1'
        ]);

        // dd($validateData);
        Genre::create($validateData);

        return redirect()->route('admin.genres.index')
        ->with('message', "\"{$validateData['name']}\" genre added succesfully!");
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
    public function edit(Genre $genre)
    {
        return view('genres.edit',['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validateData = $request->validate([
            'name'          => 'required|max:50',
            'is_active'     => 'required|max:1'
        ]);

        $genre->update($validateData);

        return redirect()->route('admin.genres.index',['genre'=>$genre->id])
        ->with('message',"\"{$validateData['name']}\" Data, updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('message', "$genre->name genre deleted succesfully");
    }
}
