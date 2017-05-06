@if (isset($gallery) && !empty($gallery))

  <div id="gallery">
    <div class="container">
      <h2>Gallery</h2>

      <div class="gallery-image">
        <div class="border col-sm-2 col-sm-push-3"></div>
        <div class="image-wrapper col-sm-8 col-sm-push-2 text-center">
          {{ Html::image('images/K&F.png') }}
        </div>
        <div class="border col-sm-2 col-sm-push-7"></div>
      </div>

      <div class="images-wrapper">
        @foreach($gallery as $image)
          <div class="col-md-3 image" style="background-image: url('{{ $image->image }}'); ">
          </div>
        @endforeach
      </div>
    </div>
  </div>

  {{ $gallery->links() }}

@endif