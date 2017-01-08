<template>
	<div class="manufacturer-product-edit--container">
	    <div class="tabs is-medium is-centered">
			<ul>
				<li 
					:class="{ 'is-active' : showBasic }"
					@click="activateTab('basic')"
				>
					<a>Generelt</a>
				</li>
				<li 
					:class="{ 'is-active' : showImages }"
					@click="activateTab('images')"
				>
					<a>Billeder</a>
				</li>
				<li 
					:class="{ 'is-active' : showVariants }"
					@click="activateTab('variants')"
				>
					<a>Varianter</a>
				</li>
				<li 
					:class="{ 'is-active' : showTechnical }"
					@click="activateTab('technical')"
				>
					<a>Tekniske Detaljer</a>
				</li>
			</ul>
	    </div>

	    <div class="manufacturer-product-edit--basic animated fadeIn" v-show="showBasic">
	    	<div class="columns">
	    		<div class="column">
	    			<label class="label">Produkt Title</label>
					<p class="control">
					  <input class="input is-medium" type="text" placeholder="Produkt Title" name="name" v-model="product.name">
					</p>
					<label class="label">EAN-Nummer</label>
					<div class="barcode">{{ product.ean }}</div>
					<p class="control">
					  <input class="input is-medium" type="text" placeholder="fx 5760466920278" name="ean" v-model="product.ean">
					</p>
	    		</div>
	    		<div class="column">
	    			<label class="label">Beskrivelse</label>
					<p class="control">
					  <textarea class="textarea" placeholder="Beskrivelse" name="description" v-model="product.description"></textarea>
					</p>
	    		</div>
	    		<div class="column">
	    			<label class="label">Tags</label>
					<p class="control">
							<span class="tag-container">
								<span class="create">
									<input type="text" class="tag" placeholder="Nyt Tag">
									<span class="icon">
									  <i class="fa fa-plus"></i>
									</span>
								</span>
								<br>
								<div class="tag" v-for="tag in product.tags">
									<p>{{tag.name}}</p>
									<span class="icon">
									  <i class="fa fa-times"></i>
									</span>
								</div>
							</span>
					</p>
					<label class="label">Forslag:</label>
					<div class="tag-container">
						<div class="tag">
							<p>Tag Name #1</p>
							<span class="icon">
							  <i class="fa fa-plus"></i>
							</span>
						</div>
						<div class="tag">
							<p>Tag Name #2</p>
							<span class="icon">
							  <i class="fa fa-plus"></i>
							</span>
						</div>
						<div class="tag">
							<p>Tag Name #3</p>
							<span class="icon">
							  <i class="fa fa-plus"></i>
							</span>
						</div>
						<div class="tag">
							<p>Tag Name #4</p>
							<span class="icon">
							  <i class="fa fa-plus"></i>
							</span>
						</div>
					</div>
	    		</div>
	    	</div>
	    	<div>
	    		<hr>
	    		<button class="button is-primary is-medium is-pulled-right" @click="activateTab('images')">Næste</button>
	    	</div>
	    </div>
	    <div class="manufacturer-product-edit--images animated fadeIn" v-show="showImages">
	    	<div class="columns">
	    		<div class="column is-8 has-border-right">
	    			<label class="label">Mapper</label>

	    			<div class="columns media--page-padding">
			            <div class="column is-2 is-gapless media--hover animated fadeIn">
			                <div class="media--map-box">
			                    <span class="icon is-medium">
			                      <i class="fa fa-folder"></i>
			                    </span>
			                    <h5>test</h5>
			                </div>
			            </div>
			            <div class="column is-2 is-gapless media--hover animated fadeIn">
			                <div class="media--map-box">
			                    <span class="icon is-medium">
			                      <i class="fa fa-folder"></i>
			                    </span>
			                    <h5>test</h5>
			                </div>
			            </div>
			            <div class="column is-2 is-gapless media--hover animated fadeIn">
			                <div class="media--map-box">
			                    <span class="icon is-medium">
			                      <i class="fa fa-folder"></i>
			                    </span>
			                    <h5>test</h5>
			                </div>
			            </div>
			            <div class="column is-2 is-gapless media--hover animated fadeIn">
			                <div class="media--map-box">
			                    <span class="icon is-medium">
			                      <i class="fa fa-folder"></i>
			                    </span>
			                    <h5>test</h5>
			                </div>
			            </div>
			            <div class="column is-2 is-gapless media--hover animated fadeIn">
			                <div class="media--map-box">
			                    <span class="icon is-medium">
			                      <i class="fa fa-folder"></i>
			                    </span>
			                    <h5>test</h5>
			                </div>
			            </div>
			        </div>
	    			<label class="label">Filer</label>
	    			<div class="columns media--page-padding">
			        	<div class="column is-2 media--text-align media--hover animated fadeIn media--active">
			        		<div class="media--file-image">
			        			<img src="/images/0/test.png" alt="File Image">
			        		</div>
			        		<div class="media--file-image-text">
			        			<h5>
			                    <span class="icon">
			                      <i class="fa media--file-icon fa-file-o"></i>
			                    </span>
			                        Test Billede #1
			                    </h5>
			        		</div>
			        	</div>
			        	<div class="column is-2 media--text-align media--hover animated fadeIn">
			        		<div class="media--file-image">
			        			<img src="/images/0/test.png" alt="File Image">
			        		</div>
			        		<div class="media--file-image-text">
			        			<h5>
			                    <span class="icon">
			                      <i class="fa media--file-icon fa-file-o"></i>
			                    </span>
			                        Test Billede #2
			                    </h5>
			        		</div>
			        	</div>
			        	<div class="column is-2 media--text-align media--hover animated fadeIn">
			        		<div class="media--file-image">
			        			<img src="/images/0/test.png" alt="File Image">
			        		</div>
			        		<div class="media--file-image-text">
			        			<h5>
			                    <span class="icon">
			                      <i class="fa media--file-icon fa-file-o"></i>
			                    </span>
			                        Test Billede #3
			                    </h5>
			        		</div>
			        	</div>
			        </div>
	    		</div>
	    		<div class="column is-4">
	    			<label class="label">Valgte Billeder:</label>
	    			<ul>
	    				<li style="width: 100px; height: 150px;">
	    					<div class="media--text-align media--hover animated fadeIn">
				        		<div class="selected-image" style="border: 1px solid lightgrey">
				        			<img 
					        			style="width: 100px; max-height: 200px;"
					        			src="/images/0/test.png" 
					        			alt="File Image"
				        			>
			                        <p>Test Billede #1</p>
				        		</div>
				        	</div>
    					</li>
	    			</ul>
	    		</div>
	    	</div>
	    	<div>
	    		<hr>
	    		<button class="button is-primary is-medium is-pulled-right" @click="activateTab('variants')">Næste</button>
	    	</div>
	    </div>
	    <div class="manufacturer-product-edit--variants animated fadeIn" v-show="showVariants">
	    	<div class="columns">
	    		<div class="column is-two-thirds variants-container has-text-centered">
	    			<div class="columns">
		    			<div class="variants-group column is-5">
		    				<div class="variant--item">
		    					<p>Variant Gruppe #1</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Gruppe #2</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Gruppe #3</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Gruppe #4</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Gruppe #5</p>
		    				</div>
		    			</div>
		    			<div class="variants-type column is-5">
		    				<div class="variant--item">
		    					<p>Variant Type #1</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #3</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item variant--selected">
		    					<p>Variant Type #4</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    				<div class="variant--item">
		    					<p>Variant Type #2</p>
		    				</div>
		    			</div>
		    			<div class="column variant-add--container">
	    					<button class="button is-medium is-primary is-inverted variants-add">Tilføj ></button>
		    			</div>
	    			</div>
	    			<hr>
	    			<button class="button is-large is-primary">Tilføj ny Variantgruppe</button>
	    		</div>
	    		<div class="column">
	    			<label class="label">Valgte Varianter:</label>
	    			<div class="variants-selected--container">
	    				<div class="variant-selected tag">
	    					<p>Variant Navn</p>
	    					<span class="icon">
	    						<i class="fa fa-times"></i>
    						</span>
	    				</div>
	    				<div class="variant-selected tag">
	    					<p>Variant Navn</p>
	    					<span class="icon">
	    						<i class="fa fa-times"></i>
    						</span>
	    				</div>
	    				<div class="variant-selected tag">
	    					<p>Variant Navn</p>
	    					<span class="icon">
	    						<i class="fa fa-times"></i>
    						</span>
	    				</div>
	    				<div class="variant-selected tag">
	    					<p>Variant Navn</p>
	    					<span class="icon">
	    						<i class="fa fa-times"></i>
    						</span>
	    				</div>
	    				<div class="variant-selected tag">
	    					<p>Variant Navn</p>
	    					<span class="icon">
	    						<i class="fa fa-times"></i>
    						</span>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    	<div>
	    		<hr>
	    		<button class="button is-primary is-medium is-pulled-right" @click="activateTab('technical')">Næste</button>
	    	</div>
	    </div>
	    <div class="manufacturer-product-edit--technical animated fadeIn" v-show="showTechnical">
			<div class="columns">
				<div class="column is-4 has-border-right">
					<div class="field-option--select">
						<label class="label">Tilføj Felt</label>
						<div class="control">
							<span class="select is-medium">
								<select name="field">
									<option value="1">Mål</option>
								</select>
							</span>
						</div>
					</div>
					<div class="field-options--container">
						<div class="field-option">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox" name="question">
									Højde
								</label>
							</div>
						</div>
						<div class="field-option">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox" name="question">
									Bredde
								</label>
							</div>
						</div>
						<div class="field-option">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox" name="question">
									Længde
								</label>
							</div>
						</div>
						<div class="field-option">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox" name="question">
									Dybde
								</label>
							</div>
						</div>
					</div>
					<div class="field-option--control">
						<button class="button is-primary is-medium is-pulled-right">Gem og Tilføj</button>
					</div>
				</div>
				<div class="column">
					
				</div>
			</div>
	    </div>

	</div>
</template>

<script>
    export default {
    	props: {
    		product: {
    			type: Object
    		},
    	},
    	data() {
    		return {
    			showBasic: true,
    			showImages: false,
    			showVariants: false,
    			showTechnical: false,
    		}
    	},
    	computed: {
    		selectedTags(){
    			return _.map(this.product.tags, 'id');
    		},
    	},
    	methods: {
    		activateTab(tab){
				this.deactivateTabs();
    			switch(tab){
    				case 'basic':
    					this.showBasic = true;
    				break;
    				case 'images':
    					this.showImages = true;
    				break;
    				case 'variants':
    					this.showVariants = true;
    				break;
    				case 'technical':
    					this.showTechnical = true;
    				break;
    				default:
    					this.showBasic = true;
    			}
    		},
    		deactivateTabs(){
				this.showBasic = false;
				this.showImages = false;
				this.showVariants = false;
				this.showTechnical = false;
    		}
    	},
        mounted() {
            
        }
    }
</script>
