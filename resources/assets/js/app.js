
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('nav-left', require('./components/navigation/NavLeft.vue'));
Vue.component('nav-top', require('./components/navigation/NavTop.vue'));
	Vue.component('search-bar', require('./components/navigation/SearchBar.vue'));
Vue.component('page-control', require('./components/navigation/PageControl.vue'));

// Manufacturer Specific
Vue.component('manufacturer-products', require('./components/manufacturer/ProductList.vue'));
Vue.component('manufacturer-product-edit', require('./components/manufacturer/ProductEdit.vue'));
Vue.component('shopkeepers', require('./components/manufacturer/Shopkeepers.vue'));
Vue.component('media-bank', require('./components/manufacturer/MediaBank.vue'));

// Shopkeeper Specific
Vue.component('shopkeeper-products', require('./components/shopkeeper/ProductList.vue'));
Vue.component('shopkeeper-product-edit', require('./components/shopkeeper/ProductEdit.vue'));
Vue.component('manufacturers', require('./components/shopkeeper/Manufacturers.vue'));

// Fields



window.Event = new Vue();

window.Helper = {
	isAdmin() {
		return Laravel.User.role == 'admin';
	},
	isShopkeeper() {
		return Laravel.User.role == 'shopkeeper' || this.isAdmin();
	},
	isManufacturer(){
		return Laravel.User.role == 'manufacturer' || this.isAdmin();
	}
};

const app = new Vue({
    el: '#app',
    data() {
    	return {

    	}
    },
    methods: {
    	
    },
    mounted(){
    	
    }
});
