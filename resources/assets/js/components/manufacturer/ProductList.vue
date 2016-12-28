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
				<p>{{ product.name }}</p>
				<ul>
					<li v-for="tag in product.tags" class="list-tags">{{tag.name}}</li>
				</ul>
				<p>{{ product.updated_at }}</p>
                <span class="icon" @click="select(product)">
                  <i class="fa" :class="{'fa-plus' : !isSelected(product)}"></i>
                </span>
			</div>
			<div class="manufacturer-product--expanded" v-show="isSelected(product)">
				<img class="list-image" :src="product.image" alt="Product Image" >
				<span class="list-info">
					<span class="list-header">
						<p class="list-name">{{ product.name }} fgearge</p>
					</span>
					<span class="list-content">
						<span class="columns">
							<span class="column">
								<p class="list-ean">{{ product.ean }} feageargrae</p>
								<p class="list-tags">
									<ul>
										<li
											v-for="tag in product.tags"
										>
											{{tag.name}} ssss
										</li>
									</ul>
								</p>
							</span>
							<span class="column">
								<p class="list-description">{{ product.description }}</p>
							</span>
						</span>
					</span>
					<span class="icon" @click="select(product)">
	                  <i class="fa" :class="{'fa-minus' : isSelected(product)}"></i>
	                </span>
				</span>
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