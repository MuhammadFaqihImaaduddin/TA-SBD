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
    <form action="{{ route('review.store') }}" method="POST">
    @csrf
    <div class="card-header">
      <h4>Tambah Review</h4>
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
        <select class="form-control" name="id_movie">
          <option value="">Pilih Movie</option>
          @foreach ($movies as $movie)
          <option value="{{ $movie->id_movie }}">{{ $movie->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Review</label>
        <textarea class="form-control" name="review" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label>Rating</label>
        <div class="star-rating">
          <input id="star-5" type="radio" name="rating" value="5">
          <label for="star-5" title="5 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-4" type="radio" name="rating" value="4">
          <label for="star-4" title="4 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-3" type="radio" name="rating" value="3">
          <label for="star-3" title="3 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-2" type="radio" name="rating" value="2">
          <label for="star-2" title="2 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-1" type="radio" name="rating" value="1">
          <label for="star-1" title="1 star"><i class="fas fa-star"></i></label>
        </div>
        
      </div>
      
    </div>
    <div class="card-footer text-right">
      <button class="btn btn-primary mr-1" type="submit">Simpan</button>
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