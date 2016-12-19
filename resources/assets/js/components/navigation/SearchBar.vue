<template>
<div>
	<a class="nav-item">
	    <span class="icon">
	      <i class="fa fa-search"></i>
	    </span>
	</a>
	<input type="text" class="search-bar" placeholder="Søg" 
		:class="{ 'search-bar-border' : search }" 
		@keyup.esc="search = ''" 
		v-model="search"
	>
	<transition name="fade">
		<a class="close" @click="search = ''" v-show="search">
			<span class="icon">
			  <i class="fa fa-times"></i>
			</span>
		</a>
	</transition>
	<transition name="fade">
		<div class="search-modal has-text-left" v-show="search">
			<p class="has-text-left">Searching for: {{search}}</p>
			<a class="button is-loading" style="width: 100%;" v-show="is_loading">Loading</a>
			<div class="content">
				<h3>Produkter</h3>
				<div>
					<li>Sofabordet Katrine</li>
					<li>Sofabordet Kaj</li>
					<li>Sofabordet Kastangje</li>
				</div>
				<h3>Menu Punkter</h3>
				<div>
					<li>Produkter</li>
					<li>Noget Andet</li>
					<li>Bare Test</li>
				</div>
				<h3>Mediebank</h3>
				<div>
					<li>Det Flotte Billede.png</li>
					<li>Mere Billed.jpg</li>
					<li>Samlevejledning.pdf</li>
				</div>
			</div>
		</div>
	</transition>
</div>
</template>

<script>

	export default {

		props: {
			routes: {}
		},
		data(){
			return{
				search: '',
				is_loading: true,
			};
		},
        mounted() {
        }
    }
</script>