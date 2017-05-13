
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Datetime picker library.
require('./vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min');

// Custom JS.
require('./src/datepicker');

// Confirmation modal.
require('./src/confirm');

//require('vue-sortable');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
//Vue.component('modal', require('./components/Modal.vue'));
Vue.component('food', require('./components/Food.vue'));
Vue.component('food-list', require('./components/FoodList.vue'));

// import Sortable from 'sortablejs';

// Vue.directive('sortable', {
//   inserted: function (el, binding) {
//     new Sortable(el, binding.value || {})
//   }
// })

const app = new Vue({
    el: '#app',
    data: {
        showModal: false,
        menu: []
    },
    methods: {
        // reorder ({oldIndex, newIndex}) {
        //     const movedItem = this.items.splice(oldIndex, 1)[0]
        //     this.items.splice(newIndex, 0, movedItem)
        // }
    },

    mounted() {
        var children = this.$children;
        axios.get('/api/food').then(function(response) {
            this.menu = response.data;
            for (var i=0; i<children.length; i++) {
                children[i].updateMenu(this.menu);
            }
        });
    }
});
