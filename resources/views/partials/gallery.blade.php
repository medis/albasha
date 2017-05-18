@if (isset($gallery) && !empty($gallery))

  <div id="gallery">
    <div class="container">
      <h2>Gallery</h2>

      <div class="gallery-image">
        <div class="border col-xs-3 col-sm-push-1"></div>
        <div class="image-wrapper col-sm-8 col-sm-push-2 text-center">
          {{ Html::image('images/K&F.png') }}
        </div>
        <div class="border col-xs-3 col-sm-push-8 col-xs-push-9"></div>
      </div>

      <div class="images-wrapper">
        @foreach($gallery as $image)
          <a href="#" @click.stop.prevent="openModal('{{ $image->image }}')" class="col-xs-5 col-md-3 image" style="background-image: url('{{ $image->image }}'); "></a>
        @endforeach
      </div>
    </div>
  </div>

  {{ $gallery->links() }}

@endif