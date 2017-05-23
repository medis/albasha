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
      <div class="col-xs-5 col-md-3" v-for="item in instagram">
        <a href="#" @click.stop.prevent="openModal( item.images.standard_resolution.url )"  class="image" v-bind:style="{ backgroundImage: 'url(' + item.images.low_resolution.url + ')' }"></a>
      </div>
    </div>
  </div>

  <div class="pagination-wrapper">
    <v-paginator :options="instagram_options" :resource_url="instagram_remote_url" @update="updateResource" :pages="1"></v-paginator>
  </div>

</div>