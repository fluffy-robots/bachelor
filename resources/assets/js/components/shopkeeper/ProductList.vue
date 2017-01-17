<template>
    <div class="manufacturer-products--container">
        <nav class="nav has-shadow page-control animated fadeIn">
        	<div class="nav-left">
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
				<h3 class="manufacturer-product--name">{{product.name}}</h3>
			</div>
			<div class="nav-right">
				<a 
					class="button is-primary is-inverted is-icon"
					v-show="this.selected_products.length > 0"
				>
					<span class="icon">
						<i class="fa fa-trash"></i>
					</span>
					<span>Slet</span>
				</a>
				<a class="button is-primary is-inverted is-icon"
					v-show="this.selected_products.length > 0">
					<span class="icon">
						<i class="fa fa-file"></i>
					</span>
					<span>Eksporter</span>
				</a>
				<div class="separator"></div>
				<a 
					class="button is-primary is-inverted is-icon"
					@click="minimizeAll"
				>
					<span class="icon">
						<i class="fa fa-list"></i>
					</span>
					<span>Saml Alle</span>
				</a>
				<a 
					class="button is-primary is-inverted is-icon"
					@click="expandAll"
				>
					<span class="icon">
						<i class="fa fa-th-list"></i>
					</span>
					<span>Udvid alle</span>
				</a>
			</div>
        </nav>

        <manufacturer-product-edit :product="product" v-show="showEditForm"></manufacturer-product-edit>

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

	    <!-- produkter som mangler slut -->

		<div class="manufacturer-productlist--container" v-show="showProductList" style="
    margin-bottom: 20px">
			<div class="manufacturer-products--list-container"
				v-for="product in missing"
			>
				<div 
					class="manufacturer-products--list animated fadeIn" 
					v-show="!isExpanded(product)"
					@click="select(product)"
					:class="{ 'is-active' : isSelected(product) }"
				>
					<img class="list-image" :src="product.image.path" alt="Product Image" v-if="product.image">
					<p class="product--title">{{ product.name }}</p>
					<ul>
						<li>Tags:</li>
						<li v-for="tag in product.tags" class="list-tags">{{tag.name}}</li>
					</ul>
					<p class="product--updatet">{{ product.updated_at }}</p>
					<button 
						class="button is-primary produkt--knppen"
						@click="edit(product)"
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
					@click="select(product)"
					:class="{ 'is-active' : isSelected(product) }"
				>
					<div class="columns">
						<div class="column is-2">
							<img class="list-image" :src="product.image.path" alt="Product Image" v-if="product.image">
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
									</div>
								</div>		
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	

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


		<div class="manufacturer-productlist--container" v-show="showProductList" style="
    margin-bottom: 20px">
			<div class="manufacturer-products--list-container"
				v-for="product in waiting"
			>
				<div 
					class="manufacturer-products--list animated fadeIn" 
					v-show="!isExpanded(product)"
					@click="select(product)"
					:class="{ 'is-active' : isSelected(product) }"
				>
					<img class="list-image" :src="product.image.path" alt="Product Image" v-if="product.image">
					<p class="product--title">{{ product.name }}</p>
					<ul>
						<li>Tags:</li>
						<li v-for="tag in product.tags" class="list-tags">{{tag.name}}</li>
					</ul>
					<p class="product--updatet">{{ product.updated_at }}</p>
					<button 
						class="button is-primary produkt--knppen"
						@click="edit(product)"
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
					@click="select(product)"
					:class="{ 'is-active' : isSelected(product) }"
				>
					<div class="columns">
						<div class="column is-2">
							<img class="list-image" :src="product.image.path" alt="Product Image" v-if="product.image">
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
									</div>
								</div>		
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


		<div class="manufacturer-productlist--container" v-show="showProductList" style="
    margin-bottom: 20px">
			<div class="manufacturer-products--list-container"
				v-for="product in finished"
			>
				<div 
					class="manufacturer-products--list animated fadeIn" 
					v-show="!isExpanded(product)"
					@click="select(product)"
					:class="{ 'is-active' : isSelected(product) }"
				>
					<img class="list-image" :src="product.image.path" alt="Product Image" v-if="product.image">
					<p class="product--title">{{ product.name }}</p>
					<ul>
						<li>Tags:</li>
						<li v-for="tag in product.tags" class="list-tags">{{tag.name}}</li>
					</ul>
					<p class="product--updatet">{{ product.updated_at }}</p>
					<button 
						class="button is-primary produkt--knppen"
						@click="edit(product)"
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
					@click="select(product)"
					:class="{ 'is-active' : isSelected(product) }"
				>
					<div class="columns">
						<div class="column is-2">
							<img class="list-image" :src="product.image.path" alt="Product Image" v-if="product.image">
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
									</div>
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
        <!-- produkter som er færdige -->




</template>

<script>
	let emptyProduct = { id: 0, name: '', ean: '', image: {  }, files: []};
    export default {
    	props: {
    		data: {
    			type: Object
    		}
    	},
    	data(){
    		return {
    			expanded_products: [],
    			selected_products: [],
    			product: (this.data.data.length != 0) ? this.data.data[0] : emptyProduct,
    			showEditForm: false,
    			showProductList: true,
    			nextUrl: '/api/v1/products?page=2',
    			prevUrl: '',
    			total_products: this.data.total,
    			current_page: this.data.current_page,
    			last_page: this.data.last_page,
    			from: this.data.from,
    			to: this.data.to,

    			missing: this.data.data,
    			waiting: [],
    			finished: []
       		};
    	},
    	computed: {
    		products(){
    			return this.data.data;
    		}
    	},
    	methods: {
    		select(product){
    			if(this.isSelected(product))
                {
                    this.selected_products = this.selected_products.filter((item) => item.id != product.id)
                }else{
                    this.selected_products.push(product);
                }
    		},
    		expand(product){
                if(this.isExpanded(product))
                {
                    this.expanded_products = this.expanded_products.filter((expanded_product) => expanded_product.id != product.id)
                }else{
                	this.select(product);
                    this.expanded_products.push(product);
                }
            },
    		edit(product){
    			this.product = product;
    			this.showEditForm = true;
    			this.showProductList = false;
    		},
            back(){
            	this.refreshPage();
            	this.showEditForm = false;
            	this.showProductList = true;
            },
            isExpanded(product){
                return !! this.expanded_products.find((expanded_product) => expanded_product.id == product.id);
            },
            isSelected(product){
            	return !! this.selected_products.find((item) => item.id == product.id);
            },
            expandAll(){
            	this.expanded_products = this.products;
            },
            minimizeAll(){
            	this.expanded_products = [];
            },
            saveProduct(){
            	let isMissing = !! this.missing.find( (product) => product.id == this.product.id);
            	let isWaiting = !! this.waiting.find( (product) => product.id == this.product.id);
            	let isFinished = !! this.finished.find( (product) => product.id == this.product.id);
            	console.log(isMissing,isWaiting,isFinished);
            	if(isMissing){
	            	this.missing = this.missing.filter( (product) => product.id != this.product.id);
	            	this.waiting.push(this.product);
            	}else if(isWaiting){
	            	this.waiting = this.waiting.filter( (product) => product.id != this.product.id);
	            	this.finished.push(this.product);
            	}else if(isFinished){
	            	this.finished = this.finished.filter( (product) => product.id != this.product.id);
	            	this.waiting.push(this.product);
            	}
            	this.showEditForm = false;
            	this.showProductList = true;

            	// if(this.product.id == 0)
            	// {
	            // 	this.$http.post('/manufacturer/products', this.product).then( (response) => {
	            // 		Toastr.success('Produktet er Oprettet');
	            // 		this.back();
	            // 	}, (response) => {
	            // 		Toastr.error('Produktet er IKKE Oprettet');
	            // 		this.back();
	            // 	});
            	// }else{
	            // 	this.$http.patch('/manufacturer/products/'+this.product.id, this.product).then( (response) => {
	            // 		Toastr.success('Produktet er Gemt');
	            // 		this.back();
	            // 	}, (response) => {
	            // 		Toastr.error('Produktet er IKKE Gemt');
	            // 		this.back();
	            // 	});
            	// }
            },
            requestPage(url){
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
        		this.requestPage('/api/v1/products?page='+this.current_page);
            },
            nextPage(){
            	if(this.nextUrl)
            	{
	            	this.requestPage(this.nextUrl);
            	}
            },
            prevPage(){
            	if(this.prevUrl)
            	{
	            	this.requestPage(this.prevUrl);
            	}
            }
    	}
    }
</script>