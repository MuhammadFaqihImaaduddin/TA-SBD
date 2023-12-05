@extends('layouts.admin')

@section('title', 'Review')

@section('content')
<style>
  .star-rating {
  direction: rtl;
  font-size: 0;
}
.star-rating input {
  display: none;
}
.star-rating label {
  font-size: 24px;
  color: #ddd;
  cursor: pointer;
}
.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input:checked ~ label {
  color: gold;
}

.star-rating label i{
  font-size: 32pt !important;
}

</style>
<div class="card">
    <form action="{{ route('review.update', $review->id_review) }}" method="POST">
    @csrf
    <div class="card-header">
      <h4>Edit Review</h4>
      <div class="card-header-action">
        <a href="{{ route('review') }}" class="btn btn-info">Kembali</a>
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
        <label>Movie</label>
        <select class="form-control" name="id_movie" disabled>
          <option value="">Pilih Movie</option>
          @foreach ($movies as $movie)
          <option value="{{ $movie->id_movie }}" {{ $movie->id_movie == $review->id_movie ? 'selected' : '' }}>{{ $movie->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Review</label>
        <textarea class="form-control" name="review" rows="10">{{$review->comment}}</textarea>
      </div>
      <div class="form-group">
        <label>Rating</label>
        <div class="star-rating">
          <input id="star-5" type="radio" name="rating" value="5" {{ $review->rating == 5 ? 'checked' : '' }}>
          <label for="star-5" title="5 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
          </label>
          <input id="star-4" type="radio" name="rating" value="4" {{ $review->rating == 4 ? 'checked' : '' }}>
          <label for="star-4" title="4 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
          </label>
          <input id="star-3" type="radio" name="rating" value="3" {{ $review->rating == 3 ? 'checked' : '' }}>
          <label for="star-3" title="3 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
          </label>
          <input id="star-2" type="radio" name="rating" value="2" {{ $review->rating == 2 ? 'checked' : '' }}>
          <label for="star-2" title="2 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
          </label>
          <input id="star-1" type="radio" name="rating" value="1" {{ $review->rating == 1 ? 'checked' : '' }}>
          <label for="star-1" title="1 star">
            <i class="active fa fa-star" aria-hidden="true"></i>
          </label>
        </div>
        
      </div>
      
    </div>
    </form>
  </div>
@endsection

@section('scripts')
<script>
  document.querySelectorAll('.star-rating input').forEach(radio => {
  radio.addEventListener('change', function() {
    alert("Selected rating: " + this.value);
  });
});

</script>
@endsection