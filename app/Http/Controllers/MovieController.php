<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovieController extends Controller
{
    //index with paginate competible with link
    public function index()
    {
        $search = request()->search;
        $movies = DB::table('movies')
            ->join('genres', 'movies.id_genre', '=', 'genres.id_genre')
            ->join('users', 'movies.id_user', '=', 'users.id')
            ->select('movies.*', 'genres.name as genre_name', 'users.name as user_name')
            ->whereNull('movies.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('movies.title', 'like', '%' . $search . '%');
                $query->orWhere('genres.name', 'like', '%' . $search . '%');
                $query->orWhere('users.name', 'like', '%' . $search . '%');
                $query->orWhere('movies.release_date', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('movie.index', compact('movies', 'search'));
    }

    //create
    public function create()
    {
        $genres = DB::table('genres')->whereNull('deleted_at')->get();
        return view('movie.create', compact('genres'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies|max:255',
            'release_date' => 'required|date',
            'id_genre' => 'required',
        ]);

        $movie = DB::table('movies')->insert([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'id_genre' => $request->id_genre,
            'id_user' => auth()->user()->id,
        ]);

        return redirect()->route('movie');
    }

    //show
    public function show($id)
    {
        $movie = DB::table('movies')
            ->join('genres', 'movies.id_genre', '=', 'genres.id_genre')
            ->join('users', 'movies.id_user', '=', 'users.id')
            ->select('movies.*', 'genres.name as genre_name', 'users.name as user_name')
            ->where('movies.id_movie', $id)
            ->first();
        return view('movie.show', compact('movie'));
    }

    //edit
    public function edit($id)
    {
        $movie = DB::table('movies')->where('id_movie', $id)->first();
        $genres = DB::table('genres')->whereNull('deleted_at')->get();
        return view('movie.edit', compact('movie', 'genres'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'release_date' => 'required|date',
            'id_genre' => 'required',
        ]);

        $movie = DB::table('movies')->where('id_movie', $id)->update([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'id_genre' => $request->id_genre,
        ]);

        return redirect()->route('movie');
    }

    //destroy with soft delete
    public function destroy($id)
    {
        $movie = DB::table('movies')->where('id_movie', $id)->update([
            'deleted_at' => Carbon::now(),
        ]);
        return redirect()->route('movie');
    }

    //trash
    public function trash()
    {
        $search = request()->search;
        $movies = DB::table('movies')
            ->join('genres', 'movies.id_genre', '=', 'genres.id_genre')
            ->join('users', 'movies.id_user', '=', 'users.id')
            ->select('movies.*', 'genres.name as genre_name', 'users.name as user_name')
            ->whereNotNull('movies.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('movies.title', 'like', '%' . $search . '%');
                $query->orWhere('genres.name', 'like', '%' . $search . '%');
                $query->orWhere('users.name', 'like', '%' . $search . '%');
                $query->orWhere('movies.release_date', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('movie.trash', compact('movies','search'));
    }

    //restore
    public function restore($id)
    {
        $movie = DB::table('movies')->where('id_movie', $id)->update([
            'deleted_at' => null,
        ]);

        return redirect()->route('movie');
    }

    //force delete
    public function delete($id)
    {
        try {
            $movie = DB::table('movies')->where('id_movie', $id)->delete();
            return redirect()->route('movie');
        } catch (\Throwable $th) {
            return redirect()->route('movie.trash')->with('error', 'Data tidak bisa dihapus karena terkait dengan data lain');
        }
    }
}
