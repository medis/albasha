
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

// Menu collapse.
require('./src/collapse');

// Ckeditor.
require('./src/ckeditor');

//require('vuejs-paginator');
import VueResource from 'vue-resource'
import VuePaginator from 'vuejs-paginator';
Vue.use(VueResource);
//require('vue-sortable');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
Vue.component('modal', require('./components/Modal.vue'));
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
    components: {
        VPaginator: VuePaginator
    },
    data: {
        showModal: false,
        showSaveOrder: false,
        isSendingOrder: false,
        modalImage: '',
        menu: [],
        // Instagram feed.
        instagram: [],
        instagram_remote_url: '/api/instagram',
        instagram_options: {
            remote_data: 'items',
            remote_current_page: 'current_page',
            remote_last_page: 'last_page',
            remote_next_page_url: 'next_page_url',
            remote_prev_page_url: 'prev_page_url',
            next_button_text: 'Next',
            previous_button_text: 'Back'
        }
    },
    methods: {
        reorder: function() {
            var data = [];
            var context = this;
            for (var key in this.menu) {
                for (var i=0; i<this.menu[key].length; i++) {
                    data.push({id: this.menu[key][i].id, weight: i});
                }
            };
            this.isSendingOrder = true;
            axios.post('/api/food', {data: JSON.stringify(data)})
                .then(function(response) {
                    context.showSaveOrder = false;
                    context.isSendingOrder = false;
                })
                .catch(error => console.log(error));
        },

        openModal: function(image) {
            this.modalImage = image;
            this.showModal = true;
        },

        // Instagram pagination callback.
        updateResource: function(data) {
            this.instagram = data;
        }
    },

    mounted() {
        var context = this;
        axios.get('/api/food').then(function(response) {
            context.menu = response.data;
            Event.$emit('menuFetched', context.menu);
        });
    },

    created() {
        var context = this;
        Event.$on('FoodOrderChanged', function(data) {
            context.menu[data.category] = data.menu;
            context.showSaveOrder = true;
        });

        Event.$on('closeModal', () => context.showModal = false );
    }
});
