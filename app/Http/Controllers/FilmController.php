<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Film;
use App\Models\Genre;
use Str;

class FilmController extends Controller
{
    public function index(){
        $films = Film::all();
        return view('films.index',['films' => $films]);
    }

    public function create(){

        //Fetch active genre
        $genres = Genre::where('is_active',1)->get();
        return view('films.create',['genres' => $genres]);
    }

    public function store(Request $request){

        //Validation Process
        $validateData = $request->validate([
            'title'         => 'required',
            'duration'      => 'required|min:0|not_in:0|max:3',
            'genre'         => 'required',
            'description'   => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'tumbnail'      => 'required',
            'tumbnail.*'    => 'image|mimes:jpg,png,jpeg,svg',
            'status'        => 'required'
        ]);

        //Image Upload
        $filename = $this->image_upload($request,$validateData,'title');

        //Fetch genre name based on film id
        $genres_name = $this->fetch_genre($validateData);

        Film::create([
            'title'         => $validateData['title'],
            'duration'      => $validateData['duration'],
            'genre'         => $genres_name,
            'description'   => $validateData['description'],
            'start_date'    => $validateData['start_date'],
            'end_date'      => $validateData['end_date'],
            'tumbnail'      => $filename,
            'status'        => $validateData['status']]);


        //insert into pivot table
        $array_data = [];

        foreach ($validateData['genre'] as $key => $value) {
            array_push($array_data,$value);
        }
        //Attach data to table
        $film = Film::with('genres')->orderBy('id','desc')->first();
        $film->genres()->attach($array_data);

        return redirect()->route('admin.films.index')
        ->with('message', "\"{$validateData['title']}\" added succesfully!");
    }

    public function edit(Film $film){
        $genres = Genre::where('is_active',1)->get();
        $genreList = Film::find($film->id)->genres;
        $genreIds = [];
        foreach ($genreList as $value) {
            array_push($genreIds,$value->id);
        };
        return view('films.edit',['film' => $film,'genres' => $genres,'genreIds' => $genreIds]);
    }

    public function update(Request $request, Film $film){

        $validateData = $request->validate([
            'title'         => 'required',
            'duration'      => 'required|min:0|not_in:0|max:3',
            'genre'         => 'required',
            'description'   => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'tumbnail'      => 'required',
            'tumbnail.*'    => 'image|mimes:jpg,png,jpeg,svg',
            'status'        => 'required'
        ]);

        //update pivot table
        $array_data = [];

        foreach ($validateData['genre'] as $key => $value) {
            array_push($array_data,$value);
        }

        //Image Upload
        $filename = $this->image_upload($request,$validateData,'title');

        //Fetch genre name based on film id
        $genres_name = $this->fetch_genre($validateData);

        $validateData['genre'] = $genres_name;
        $validateData['tumbnail'] = $filename;

        // remove old records and add new in pivot table
        // sync function requires array.
        $film->genres()->sync($array_data);

        $film->update($validateData);

        return redirect()->route('admin.films.index',['film'=>$film->id])
        ->with('message',"\"{$validateData['title']}\" Data, updated succesfully");
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('admin.films.index')->with('message', "$film->title deleted succesfully");
    }

    public function image_upload(Request $request, Array $array, String $title){
        //Image Upload
        if ($request->hasFile('tumbnail')) {
            //Slug helper so the name can be used as image name
            $slug = Str::slug($array[$title]);

            //Take the file extension
            $extFile = $request->tumbnail->getClientOriginalExtension();

            //Generate image name
            $filename = $slug . '-' . time() . "." . $extFile;

            //Upload Process, Save to "uploads" folder
            $request->tumbnail->storeAs('/uploads', $filename);

        } else{
            //if user not upload any file, insert default image
            $filename = 'default_tumbnail.jpg';
        }

        return $filename;
    }

    public function fetch_genre(Array $array)
    {
        $genres = [];
        foreach ($array['genre'] as $key => $value) {
            $genre = Genre::find($value);
            array_push($genres,$genre->name);
        }

        $genres_name = join(",",$genres);
        return $genres_name;
    }
}