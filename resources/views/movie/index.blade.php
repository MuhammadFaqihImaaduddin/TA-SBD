@extends('layouts.admin')

@section('title', 'Movie')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                {{-- Search Bar --}}
                <form action="{{ route('movie') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search movie" value="{{$search}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="{{ route('movie.trash') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-angle-double-up"></i> Restore Data</a>
                <a href="{{ route('movie.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Rilis</th>
                <th scope="col">Genre</th>
                <th scope="col">Diupdate terakhir Oleh</th>
                <th scope="col" width='10%'>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ date('d-m-Y', strtotime($movie->release_date)) }}</td>
                <td>{{ $movie->genre_name }}</td>
                <td>{{ $movie->user_name }}</td>
                <td>
                    <a href="{{ route('movie.edit', $movie->id_movie) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                    <form action="{{ route('movie.destroy', $movie->id_movie) }}" method="GET" class="d-inline">
                        @csrf
                        <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $movies->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#movie').addClass('active');
    });
</script>
@endsection