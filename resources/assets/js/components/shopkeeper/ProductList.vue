<template>
    <div class="manufacturer-products--container">
        <nav class="nav has-shadow page-control animated fadeIn">
            <a class="button is-medium is-primary" v-if="">GEM</a>
        </nav>
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
        <div v-for="product in products" class="columns sk-pl--product animated fadeIn" v-show="!isSelected(product)">
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
        <div v-for="product in products" class="columns sk-pl--product animated fadeIn" v-show="!isSelected(product)">
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
        <div v-for="product in products" class="columns sk-pl--product animated fadeIn" v-show="!isSelected(product)">
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