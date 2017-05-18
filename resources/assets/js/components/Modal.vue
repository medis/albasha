<template>
    <div>

      <div class="modal-image">

        <!-- The Close Button -->
        <span class="modal-image-close" @click="closeModal">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-image-content" :src="image" />

        <!-- Modal Caption (Image Text) -->
        <div class="modal-image-caption"></div>
      </div>

    </div>
</template>

<script>
  export default {
      mounted() {
          this.image = this.$parent.modalImage
      },

      data() {
        return {
          image: ''
        }
      },

      methods: {
        closeModal: function() {
          Event.$emit('closeModal');
        }
      },

  }
</script>

<style lang="scss">

  .modal-image {
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
    z-index: 99999;
  }

  .modal-image-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  .modal-image-caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  .modal-image-content, .modal-image-caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }

  @keyframes zoom {
      from {transform:scale(0)}
      to {transform:scale(1)}
  }

  .modal-image-close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;

    &:hover,
    &:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
  }

  @media only screen and (max-width: 700px){
    .modal-image-content {
        width: 100%;
    }
  }

</style>