<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class GenreController extends Controller
{
    public function index()
    {
        $search = request()->search;

        $genres = DB::table('genres')
            ->whereNull('deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('genre.index', compact('genres', 'search'));
    }

    //create
    public function create()
    {
        return view('genre.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);

        $genre = DB::table('genres')->insert([
            'name' => $request->name,
        ]);

        return redirect('genre');
    }

    //show
    public function show($id)
    {
        $genre = DB::table('genres')->where('id_genre', $id)->first();
        return view('genre.show', compact('genre'));
    }

    //edit
    public function edit($id)
    {
        $genre = DB::table('genres')->where('id_genre', $id)->first();
        return view('genre.edit', compact('genre'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $genre = DB::table('genres')->where('id_genre', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('genre');
    }

    //destroy
    public function destroy($id)
    {
        $genre = DB::table('genres')->where('id_genre', $id)->update([
            'deleted_at' => Carbon::now(),
        ]);

        return redirect('genre');
    }

    //trash
    public function trash()
    {
        $search = request()->search;
        $genres = DB::table('genres')
            ->whereNotNull('deleted_at')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        return view('genre.trash', compact('genres', 'search'));
    }

    //restore
    public function restore($id)
    {
        $genre = DB::table('genres')->where('id_genre', $id)->update([
            'deleted_at' => null,
        ]);

        return redirect('genre');
    }


    //force delete
    public function delete($id)
    {
        try {
            $genre = DB::table('genres')->where('id_genre', $id)->delete();
            return redirect('genre');
        } catch (\Throwable $th) {
            return redirect('genre/trash')->with('error', 'Data tidak bisa dihapus karena terkait dengan data lain');
        }
    }
}
