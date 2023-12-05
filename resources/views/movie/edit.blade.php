@extends('layouts.admin')

@section('title', 'Movie')

@section('content')
<form action="{{ route('movie.update', $movie->id_movie) }}" method="POST">
<div class="card">
    @csrf
    <div class="card-header">
      <h4>Edit Movie</h4>
      <div class="card-header-action">
        <a href="{{ route('movie') }}" class="btn btn-info">Kembali</a>
        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br>
        @endforeach
      </div>
      @endif
      <div class="form-group">
        <label>Judul</label>
        <input name="title" type="text" class="form-control" value="{{ $movie->title }}">
      </div>
      <div class="form-group">
        <label>Tanggal Rilis</label>
        <input name="release_date" type="date" class="form-control" value="{{ $movie->release_date }}">
      </div>
      <div class="form-group">
        <label>Genre</label>
        <select name="id_genre" class="form-control">
          @foreach ($genres as $genre)
          <option value="{{ $genre->id_genre }}" {{ $genre->id_genre == $movie->id_genre ? 'selected' : '' }}>{{ $genre->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</form>
@endsection

@section('scripts')
@endsection