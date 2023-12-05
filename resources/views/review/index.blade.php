@extends('layouts.admin')

@section('title', 'Review')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="mb-3 text-right row">
            <div class="col-md-4">
                {{-- Search Bar --}}
                <form action="{{ route('review') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search review" value="{{$search}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="{{ route('review.trash') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-angle-double-up"></i> Restore Data</a>
                <a href="{{ route('review.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($reviews as $review)
    @php
        $rating = $review->rating;
        if($rating < 3){
            $color = 'card-danger';
        }else if($rating < 4){
            $color = 'card-primary';
        }else{
            $color = 'card-success';
        }
    @endphp
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card {{$color}}">
            <div class="card-header">
              <h4>{{ $review->movie_title }}</h4>
              <div class="card-header-action">
                {{ $review->rating }}
                <i class="active fa fa-star" aria-hidden="true" style="color: gold;"></i>
              </div>
            </div>
            <div class="card-body">
              <p>{{ $review->comment }}</p>
            </div>
            <div class="card-footer">
                <small>by {{ $review->user_name }}</small>
                <span class="float-right">
                    <a href="{{ route('review.show', $review->id_review) }}" class="card-link">Detail ></a>
                </span>
            </div>
          </div>
    </div>

    @endforeach
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#review').addClass('active');
    });
</script>
@endsection