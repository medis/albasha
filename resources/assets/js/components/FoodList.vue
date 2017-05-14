<template>
  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>Thumbnail</th>
        <th>Title</th>
        <th>Price</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <draggable v-model="menu" :element="'tbody'" @change="log">
      <food v-for="food, key in menu" :key="food.id">
        <template slot="title">{{ food.title }}</template>

        <template slot="price">£{{ formatPrice(food.price) }}</template>

        <template slot="thumbnail">
          <img v-if="food.thumbnail" :src="food.thumbnail" />
          <div v-else class="empty-image"></div>
        </template>

        <template slot="created">{{ food.created_at }}</template>

        <template slot="actions">
          <ul>
            <li>
              <a :href="formatEdit(food)">Edit</a>
            </li>
            <li>
              <a href="#" @click.stop.prevent="deleteFood(key, food.id)">Delete</a>
            </li>
          </ul>
        </template>
      </food>
    </draggable>

  </table>
</template>

<script>
//https://github.com/SortableJS/Vue.Draggable
    import draggable from 'vuedraggable'

    export default {
      props: ['category'],

      components: {
          draggable,
      },

      data() {
        return {
          menu: [],
        }
      },

      methods: {

        formatPrice: function(price) {
          return parseFloat(Math.round(price * 100) / 100).toFixed(2);
        },

        formatEdit: function(food) {
          return '/food/' + food.id + '/edit';
        },

        log: function(e) {
          Event.$emit('FoodOrderChanged', {category: this.category, menu: this.menu});
        },

        deleteFood: function(key, id) {
          var context = this;
          var link = '/food/' + id;
          var message = "Are you sure you want to delete this?";
          bootbox.confirm(message, function(result){
            if (result) {
              axios.delete(link)
                .then(function(response) {
                  context.menu.splice(key, 1);
                });
            }
          });
        }
      },

      created() {
        Event.$on('menuFetched', menu => this.menu = menu[this.category]);
      }
    }
</script>
