@if (isset($gallery) && !empty($gallery))

  <div id="gallery">
    <div class="container">
      @foreach($gallery as $image)
        <div class="col-md-3 image" style="background-image: url('{{ $image->image }}'); ">
        </div>
      @endforeach
    </div>
  </div>

  {{ $gallery->links() }}

@endif