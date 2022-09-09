<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Events\MovieSaved;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movies.index', [
            'movie' => new Movie,
            'categories' => Category::pluck('name', 'id'),
            'movies' => Movie::with('Category')->latest()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        $movie = new Movie($request->validated());
        $this->authorize('create', $movie);
        $movie->img = $request->file('img')->store('image');
        $movie->save();

        MovieSaved::dispatch($movie);

        return redirect()->route('movies.index')->with('status', 'Pelicula registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.update', [
            'movie' => $movie,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    /**j
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Movie $movie, CreateMovieRequest $request)
    {
        $this->authorize('create', $movie);
        if($request->hasFile('img')){
            Storage::delete($movie->img);
            $movie->fill($request->validated());
            $movie->img = $request->file('img')->store('image');
            $movie->save();
            moviesaved::dispatch($movie);
        }else{
            $movie->update(array_filter($request->validated()));
        }
        return redirect()->route('movies.index')->with('status', 'Datos actulizados con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $this->authorize('delete', $movie);
        Storage::delete($movie->img);
        $movie->delete();
        return redirect()->route('movies.index')->with('status', 'Pelicula eliminada con éxito');
    }
}
