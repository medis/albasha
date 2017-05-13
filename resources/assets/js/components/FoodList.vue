<template>
  <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Created</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
  <draggable v-model="menu" :element="'tbody'">
      <food v-for="food in menu" :key="food.id">
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
              <a :href="formatDelete(food)" data-confirm="Are you sure you want to delete this?">Delete</a>
            </li>
          </ul>
        </template>
      </food>
  </draggable>

  </table>
</template>

<script>
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

        updateMenu: function(menu) {
          console.log(menu);
          this.menu = menu[this.category];
        },

        formatPrice: function(price) {
          return parseFloat(Math.round(price * 100) / 100).toFixed(2);
        },

        formatEdit: function(food) {
          return '/food/' + food.id + '/edit';
        },

        formatDelete: function(food) {
          return '/food/' + food.id;
        }

      },
    }
</script>
