@extends('layouts.admin')

@section('title', 'Movies')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                {{-- Search Bar --}}
                <form action="{{ route('movie.trash') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search Movies" value="{{$search}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2">
            </div>
        </div>

        
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal Rilis</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Waktu Hapus</th>
                    <th scope="col" width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ date('d-m-Y', strtotime($movie->release_date)) }}</td>
                        <td>{{ $movie->genre_name }}</td>
                        <td>{{ $movie->deleted_at }}</td>
                        <td>
                            {{-- restore --}}
                            <form class="form-inline d-inline" action="{{ route('movie.restore', $movie->id_movie) }}" method="GET">
                                @csrf
                                <button class="btn btn-icon btn-success"><i class="fas fa-angle-double-up"></i></button>
                            </form>
                            <form class="form-inline d-inline" action="{{ route('movie.delete', $movie->id_movie) }}" method="GET">
                                @csrf
                                <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $movies->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#movie').addClass('active');
    });
</script>
@endsection
