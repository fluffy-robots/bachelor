<template>
	<div class="manufacturer-products--container">
		<div class="manufacturer-products--header">
			<a>Name</a>
			<a>Tags</a>
			<a>Updated At</a>
		</div>
		<div class="manufacturer-products--list-container"
			v-for="product in products"
		>
			<div class="manufacturer-products--list" v-show="!isSelected(product)">
			<img class="list-image" :src="product.image" alt="Product Image" >
				<p class="product--title">{{ product.name }}</p>
				<ul>
					<li>Tags:</li>
					<li v-for="tag in product.tags" class="list-tags">{{tag.name}}</li>
				</ul>
				<p class="product--updatet">{{ product.updated_at }}</p>
				<a class="button is-primary produkt--knppen">Rediger produkt</a>
                <span class="icon" @click="select(product)">
                  <i class="fa" :class="{'fa-plus' : !isSelected(product)}"></i>
                </span>
			</div>
			<div class="manufacturer-product--expanded" v-show="isSelected(product)">
				<div class="columns">
					<div class="column is-2">
						<img class="list-image" :src="product.image" alt="Product Image" >
					</div>
					<div class="column is-10">
						<div class="columns product--e-header">
							<div class="column is-one-quarter">
							    <h5><strong>{{ product.name }}</strong></h5>
							  </div>
							  <div class="column">
							    <span class="icon product--e-icon" @click="select(product)" style="float:right;">
				                  <i class="fa" :class="{'fa-minus' : isSelected(product)}"></i>
				                </span>
				                <p class="product--e-upldated">{{ product.updated_at }}</p>
							</div>		
						</div>
						<div class="columns">
							<div class="column is-one-quarter">
							    <p><strong>EAN:</strong> {{ product.ean }}</p>
							  </div>
							  <div class="column">
							  <p><strong>Beskrivelse:</strong></p>
							    <p>{{ product.description }}</p>
							</div>
							<div class="column is-one-quarter">
							    <p><a class="button is-primary">Primary</a></p>
							    <p><a class="button is-info">Info</a></p>
							  </div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
    	props: {
    		products: {
    			type: Array
    		},
    	},
    	data(){
    		return {
    			expanded_products: []
       		};
    	},
    	methods: {
    		select(product){
                if(this.isSelected(product))
                {
                    this.expanded_products = this.expanded_products.filter((expanded_product) => expanded_product.id != product.id)
                }else{
                    this.expanded_products.push(product);
                }
            },
            isSelected(product){
                return !! this.expanded_products.find((expanded_product) => expanded_product.id == product.id);
            }
    	}
    }
</script>