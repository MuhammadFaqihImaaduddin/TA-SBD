<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $reviews = DB::table('review')
            ->join('movies', 'review.id_movie', '=', 'movies.id_movie')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->select('review.*', 'movies.title as movie_title', 'users.name as user_name')
            ->whereNull('review.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('movies.title', 'like', '%' . $search . '%');
                $query->orWhere('users.name', 'like', '%' . $search . '%');
                $query->orWhere('review.comment', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('review.index', compact('reviews', 'search'));
    }

    //create
    public function create()
    {
        $movies = DB::table('movies')->whereNull('deleted_at')->get();
        return view('review.create', compact('movies'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'id_movie' => 'required',
            'review' => 'required',
        ]);

        $review = DB::table('review')->insert([
            'id_movie' => $request->id_movie,
            'id_user' => auth()->user()->id,
            'comment' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('review');
    }

    //show
    public function show($id)
    {
        $review = DB::table('review')
            ->join('movies', 'review.id_movie', '=', 'movies.id_movie')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->join('genres', 'movies.id_genre', '=', 'genres.id_genre')
            ->select('review.*', 'movies.title as movie_title', 'users.name as user_name', 'movies.release_date as movie_release_date', 'genres.name as genre_name')
            ->where('review.id_review', $id)
            ->first();

        return view('review.show', compact('review'));
    }

    //edit
    public function edit($id)
    {
        $review = DB::table('review')->where('id_review', $id)->first();
        $movies = DB::table('movies')->whereNull('deleted_at')->get();
        return view('review.edit', compact('review', 'movies'));
    }

    //update
    public function update(Request $request, $id)
    {
        $review = DB::table('review')->where('id_review', $id)->update([
            'id_user' => auth()->user()->id,
            'comment' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('review');
    }

    //destroy
    public function destroy($id)
    {
        $review = DB::table('review')->where('id_review', $id)->update([
            'deleted_at' => Carbon::now(),
        ]);

        return redirect()->route('review');
    }

    //trash
    public function trash(Request $request)
    {
        $search = $request->search;
        $reviews = DB::table('review')
            ->join('movies', 'review.id_movie', '=', 'movies.id_movie')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->select('review.*', 'movies.title as movie_title', 'users.name as user_name')
            ->whereNotNull('review.deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('movies.title', 'like', '%' . $search . '%');
                $query->orWhere('users.name', 'like', '%' . $search . '%');
                $query->orWhere('review.comment', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('review.trash', compact('reviews', 'search'));
    }

    //restore
    public function restore($id)
    {
        $review = DB::table('review')->where('id_review', $id)->update([
            'deleted_at' => null,
        ]);

        return redirect()->route('review');
    }

    //hard delete
    public function delete($id)
    {
        try {
            $review = DB::table('review')->where('id_review', $id)->delete();
            return redirect()->route('review');
        } catch (\Throwable $th) {
            return redirect()->route('review/trash')->with('error', 'Data tidak bisa dihapus karena terkait dengan data lain');
        }
    }
}
