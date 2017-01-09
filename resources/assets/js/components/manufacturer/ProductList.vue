<template>
	<div class="manufacturer-products--container">
        <nav class="nav has-shadow page-control animated fadeIn">
        	<div class="nav-left">
	            <button 
	            	class="button is-primary is-medium"
	            	v-show="showProductList"
	            	@click="newProduct"
	        	>
	        		Nyt Produkt
	        	</button>
	            <button 
	            	class="button is-primary is-medium"
	            	v-show="showEditForm"
	            	@click="saveProduct"
	        	>
	            	Gem
	        	</button>
	            <button 
	            	class="button is-primary is-medium is-inverted manufacturer-product-edit--back-button"
	            	v-show="showEditForm"
	            	@click="back"
	        	>
	            	Annuller
	        	</button>
        	</div>
			<div class="nav-center">
				<h3 class="manufacturer-product--name">{{selectedProduct.name}}</h3>
			</div>
			<div class="nav-right">
				<a class="button is-primary is-inverted is-icon">
					<span class="icon">
						<i class="fa fa-file"></i>
					</span>
					<span>Eksporter</span>
				</a>
				<div class="separator"></div>
				<a class="button is-primary is-inverted is-icon">
					<span class="icon">
						<i class="fa fa-list"></i>
					</span>
					<span>Saml Alle</span>
				</a>
				<a class="button is-primary is-inverted is-icon">
					<span class="icon">
						<i class="fa fa-th-list"></i>
					</span>
					<span>Udvid alle</span>
				</a>
			</div>
        </nav>
        <manufacturer-product-edit :product="selectedProduct" v-show="showEditForm"></manufacturer-product-edit>
		<div class="manufacturer-productlist--container" v-show="showProductList">
			<div class="manufacturer-products--header">
				<a>Name</a>
				<a>Tags</a>
				<a>Updated At</a>
			</div>
			<div class="manufacturer-products--list-container"
				v-for="product in products"
			>
				<div 
					class="manufacturer-products--list animated fadeIn" 
					v-show="!isExpanded(product)"
					@click="expand(product)"
				>
					<img class="list-image" :src="product.image" alt="Product Image" >
					<p class="product--title">{{ product.name }}</p>
					<ul>
						<li>Tags:</li>
						<li v-for="tag in product.tags" class="list-tags">{{tag.name}}</li>
					</ul>
					<p class="product--updatet">{{ product.updated_at }}</p>
					<button 
						class="button is-primary produkt--knppen"
						@click="select(product)"
					>
						Rediger produkt
					</button>
	                <span class="icon" @click="expand(product)">
	                    <i class="fa" :class="{'fa-plus' : !isExpanded(product)}"></i>
	                </span>
				</div>
				<div 
					class="manufacturer-product--expanded animated fadeIn" 
					v-show="isExpanded(product)"
					@click="expand(product)"
				>
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
								    <span class="icon product--e-icon" @click="expand(product)" style="float:right;">
					                  <i class="fa" :class="{'fa-minus' : isExpanded(product)}"></i>
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
									<div class="product-controls--expanded">
								    	<button 
								    		class="button is-primary"
							    			@click="select(product)"
						    			>
							    			Rediger Produkt
						    			</button>
								    	<button class="button is-info">Adgangskontrol</button>   
									</div>
								  </div>		
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="manufacturer-product--pagination">
				<nav>
					<a 
						class="is-primary" 
						@click="prevPage()" 
						:class="{ 'disabled-link' : this.current_page == 1 }"
					> 
						<< Tilbage <<
					</a>
		            <p>Side: {{current_page}} af {{last_page}}  </p>  
		            <a 
		            	class="is-primary" 
		            	@click="nextPage()"
						:class="{ 'disabled-link' : this.current_page == this.last_page }"
	            	>
	            		>> Næste >>		
            		</a>
				</nav>
	            <p>{{from}}-{{to}} af {{total_products}}</p>
			</div>
		</div>
	</div>

</template>

<script>
    export default {
    	props: {
    		data: {
    			type: Object
    		}
    	},
    	data(){
    		return {
    			products: this.data.data,
    			expanded_products: [],
    			selectedProduct: { name: '' },
    			showEditForm: false,
    			showProductList: true,
    			nextUrl: '/api/v1/products?page=2',
    			prevUrl: '',
    			total_products: this.data.total,
    			current_page: this.data.current_page,
    			last_page: this.data.last_page,
    			from: this.data.from,
    			to: this.data.to,
       		};
    	},
    	methods: {
    		select(product){
    			this.selectedProduct = product;
    			this.showEditForm = true;
    			this.showProductList = false;
    		},
    		expand(product){
                if(this.isExpanded(product))
                {
                    this.expanded_products = this.expanded_products.filter((expanded_product) => expanded_product.id != product.id)
                }else{
                    this.expanded_products.push(product);
                }
            },
            back(){
            	this.refreshPage();
            	this.showEditForm = false;
            	this.showProductList = true;
            },
            isExpanded(product){
                return !! this.expanded_products.find((expanded_product) => expanded_product.id == product.id);
            },
            newProduct(){
            	this.selectedProduct = { id: 0, name: 'Nyt Produkt', ean: ''};
            	this.showEditForm = true;
            	this.showProductList = false;
            },
            saveProduct(){
            	if(this.selectedProduct.id == 0)
            	{
	            	this.$http.post('/manufacturer/products', this.selectedProduct).then( (response) => {
	            		Toastr.success('Produktet er Oprettet');
	            		this.back();
	            	}, (response) => {
	            		Toastr.error('Produktet er IKKE Oprettet');
	            		this.back();
	            	});
            	}else{
	            	this.$http.patch('/manufacturer/products/'+this.selectedProduct.id, this.selectedProduct).then( (response) => {
	            		Toastr.success('Produktet er Gemt');
	            		this.back();
	            	}, (response) => {
	            		Toastr.error('Produktet er IKKE Gemt');
	            		this.back();
	            	});
            	}
            },
            ajaxCallPage(url){
            	this.$http.get(url).then((response) => {
            		// success
            		this.nextUrl = response.body.next_page_url;
            		this.prevUrl = response.body.prev_page_url;
            		this.products = response.body.data;
            		this.total_products = response.body.total;
            		this.current_page = response.body.current_page;
            		this.last_page = response.body.last_page;
            		this.from = response.body.from;
            		this.to = response.body.to;
            	},(response) => {
            		// error
            		console.log(response);
            	});
            },
            refreshPage(){
        		this.ajaxCallPage('/api/v1/products?page='+this.current_page);
            },
            nextPage(){
            	if(this.nextUrl)
            	{
	            	this.ajaxCallPage(this.nextUrl);
            	}
            },
            prevPage(){
            	if(this.prevUrl)
            	{
	            	this.ajaxCallPage(this.prevUrl);
            	}
            }
    	}
    }
</script>