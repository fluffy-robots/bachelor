<template>
<div class="shopkeeper--background">
    <!-- <nav class="nav has-shadow page-control animated fadeIn">
    	<label class="label">Forhandler Oversigt</label>
    </nav> -->
	<article class="message is-primary shopkeeeper--message">
		<div class="message-header shopkeeper--message-header" style="border-radius: 0">
		<span class="icon">
		<i class="fa fa-info-circle"></i>
		</span> Anmodninger
		</div>
		<div class="message-body" style="border-radius: 0">
		<table class="table">
		<tbody>
		<tr>
		<td><img class="shopkeeper--logo-pending" src="https://static.coolshop.com/apocalypse/images/logo/coolshop@2x.png" alt=""></td>
		<td style="padding-top: 20px;">tlf: 29 87 37 23</td>
		<td style="padding-top: 20px;" class="is-icon">
		<a href="#">
		<i class="fa fa-check-circle-o"></i> Godkend
		</a>
		</td>
		<td style="padding-top: 20px;" class="is-icon">
		<a href="#">
		<i class="fa fa-times-circle-o"></i> Afvis
		</a>
		</td>
		</tr>
		</tbody>
		</table>
		</div>
	</article>



	<div class="columns" v-for="shopkeeper, index in shopkeepers">
		<div class="column is-2">
			<img class="shopkeeper--logo" v-if="index == 0" src="/images/icons/mobelsalgnylogo.png" alt="">
			<img class="shopkeeper--logo" v-if="index == 1" src="/images/icons/bodymanlogo.png" alt="">
		</div>
		<div class="column ">
			<p>{{ shopkeeper.name }}</p>
			<p>Vejnavn 123</p>
			<p>9000 Postnummer</p>
		</div>
		<!-- <div class="column is-2 has-text-centered">
			<p><strong>22</strong></p>
			<p>Produkter</p>
		</div> -->
		<div class="column">
			<p>Tlf:</p>
			<p>Mail:</p>
		</div>
		<div class="column is-2">
			<button class="button is-success" v-if="!shopkeeper.hasAccess" @click="allowAccess(shopkeeper)">Giv Adgang</button>
			<button class="button is-danger" v-else @click="denyAccess(shopkeeper)">Fjern Adgang</button>
		</div>
	</div>
</div>
</template>

<script>
    export default {
    	props: {
    		data: {
    			type: Array
    		}
    	},
    	data(){
    		return {
    			shopkeeperList: this.data
    		}
    	},
    	methods:{
    		allowAccess(shopkeeper){
    			Vue.set(shopkeeper, 'hasAccess', true);
    		},
    		denyAccess(shopkeeper){
    			Vue.set(shopkeeper, 'hasAccess', false);
    		}
    	},
    	computed: {
    		shopkeepers(){
    			let shopkeepers = this.shopkeeperList;
    			shopkeepers.forEach( (shopkeeper) => {
    				Vue.set(shopkeeper, 'hasAccess', false);
    			});
    			return shopkeepers;
    		}
    	},
        mounted() {
            console.log(Laravel.user);
        }
    }
</script>