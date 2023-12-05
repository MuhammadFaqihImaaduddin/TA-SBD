@extends('layouts.admin')

@section('title', 'Genres')

@section('content')
<form action="{{ route('genre.update', $genre->id_genre) }}" method="POST">
@csrf
<div class="card">
    <div class="card-header">
      <h4>Edit Genre</h4>
      <div class="card-header-action">
        <a href="{{ route('genre') }}" class="btn btn-info">Kembali</a>
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
        <label>Nama</label>
        <input name="name" type="text" class="form-control" value="{{$genre->name}}">
      </div>
    </div>
  </form>
@endsection

@section('scripts')
@endsection