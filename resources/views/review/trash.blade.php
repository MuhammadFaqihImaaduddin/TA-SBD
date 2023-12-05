@extends('layouts.admin')

@section('title', 'Reviews')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                {{-- Search Bar --}}
                <form action="{{ route('review.trash') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search Reviews" value="{{$search}}">
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
                    <th scope="col">Comment</th>
                    <th scope="col">Rating</th>
                    <th scope="col">User</th>
                    <th scope="col">Waktu Hapus</th>
                    <th scope="col" width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->movie_title }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->user_name }}</td>
                        <td>{{ $review->deleted_at }}</td>
                        <td>
                            {{-- restore --}}
                            <form class="form-inline d-inline" action="{{ route('review.restore', $review->id_review) }}" method="GET">
                                @csrf
                                <button class="btn btn-icon btn-success"><i class="fas fa-angle-double-up"></i></button>
                            </form>
                            <form class="form-inline d-inline" action="{{ route('review.delete', $review->id_review) }}" method="GET">
                                @csrf
                                <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $reviews->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#review').addClass('active');
    });
</script>
@endsection
