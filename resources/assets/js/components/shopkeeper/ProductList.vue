<template>
    <div class="manufacturer-products--container">
        <nav class="nav has-shadow page-control animated fadeIn">
            <a class="button is-medium is-primary" v-if="">GEM</a>
        </nav>

        <!-- produkter som mangler -->
        <div class="columns sk-pl--must">
        	<div class="column">
        		<span class="icon">
				  <i class="fa fa-exclamation-triangle"></i>
				</span>
				Mangler
        	</div>
        	<div class="column">Navn</div>
        	<div class="column">Tags</div>
        	<div class="column">Dato</div>
        	<div class="column">Producent</div>
        	<div class="column"></div>
        </div>

        <div v-for="product in products">
	        <div class="columns sk-pl--product animated fadeIn" v-show="!isSelected(product)">
	        	<div class="column">
	        		<img class="list-image" :src="product.image" alt="Product Image" >
	        	</div>
	        	<div class="column">{{ product.name }}</div>
	        	<div class="column"><ul><li  v-for="tag in product.tags" style="display:inline; margin-right: 10px;">{{tag.name}}</li></ul></div>
	        	<div class="column">{{ product.updated_at }}</div>
	        	<div class="column">Producent</div>
	        	<div class="column">
	        		<span class="icon" @click="select(product)">
	                  <i class="fa" :class="{'fa-plus' : !isSelected(product)}"></i>
	                </span>
	            </div>
	        </div>
	        <div class="manufacturer-product--expanded animated fadeIn" v-show="isSelected(product)">
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
							<div class="column is-one-quarter" style="text-align: right; padding-right: 50px;">
							    <p><a class="button is-primary" style="margin-top: 20px; margin-bottom: 10px;">Rediger Produkt</a></p>
							   
							  </div>		
						</div>
					</div>
				</div>
			</div>
	    </div>
	    <!-- produkter som mangler slut -->


	    <!-- produkter som venter -->
         <div class="columns sk-pl--waiting">
        	<div class="column">
        		<span class="icon">
				  <i class="fa fa-clock-o"></i>
				</span>
				Venter
        	</div>
        	<div class="column">Navn</div>
        	<div class="column">Tags</div>
        	<div class="column">Dato</div>
        	<div class="column">Producent</div>
        	<div class="column"></div>
        </div>

        <div v-for="product in products">
	        <div class="columns sk-pl--product animated fadeIn" v-show="!isSelected(product)">
	        	<div class="column">
	        		<img class="list-image" :src="product.image" alt="Product Image" >
	        	</div>
	        	<div class="column">{{ product.name }}</div>
	        	<div class="column"><ul><li  v-for="tag in product.tags" style="display:inline; margin-right: 10px;">{{tag.name}}</li></ul></div>
	        	<div class="column">{{ product.updated_at }}</div>
	        	<div class="column">Producent</div>
	        	<div class="column">
	        		<span class="icon" @click="select(product)">
	                  <i class="fa" :class="{'fa-plus' : !isSelected(product)}"></i>
	                </span>
	            </div>
	        </div>
	        <div class="manufacturer-product--expanded animated fadeIn" v-show="isSelected(product)">
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
							<div class="column is-one-quarter" style="text-align: right; padding-right: 50px;">
							    <p><a class="button is-primary" style="margin-top: 20px; margin-bottom: 10px;">Rediger Produkt</a></p>
							   
							  </div>		
						</div>
					</div>
				</div>
			</div>
	    </div>

	    <!-- produkter som venter slut -->


	    <!-- produkter som er færdige -->
         <div class="columns sk-pl--go">
        	<div class="column">
        		<span class="icon">
				  <i class="fa fa-check-circle"></i>
				</span>
				Færdige
        	</div>
        	<div class="column">Navn</div>
        	<div class="column">Tags</div>
        	<div class="column">Dato</div>
        	<div class="column">Producent</div>
        	<div class="column"></div>
        </div>

		<div v-for="product in products">
	        <div class="columns sk-pl--product animated fadeIn" v-show="!isSelected(product)">
	        	<div class="column">
	        		<img class="list-image" :src="product.image" alt="Product Image" >
	        	</div>
	        	<div class="column">{{ product.name }}</div>
	        	<div class="column"><ul><li  v-for="tag in product.tags" style="display:inline; margin-right: 10px;">{{tag.name}}</li></ul></div>
	        	<div class="column">{{ product.updated_at }}</div>
	        	<div class="column">Producent</div>
	        	<div class="column">
	        		<span class="icon" @click="select(product)">
	                  <i class="fa" :class="{'fa-plus' : !isSelected(product)}"></i>
	                </span>
	            </div>
			</div>
			<div class="manufacturer-product--expanded animated fadeIn" v-show="isSelected(product)">
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
							<div class="column is-one-quarter" style="text-align: right; padding-right: 50px;">
							    <p><a class="button is-primary" style="margin-top: 20px; margin-bottom: 10px;">Rediger Produkt</a></p>
							   
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