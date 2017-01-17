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
					<span class="tag-container">
						<span class="create">
							<input type="text" class="tag" v-model="tagName" placeholder="Nyt Tag">
							<span class="icon" @click="addTag" :keydown.enter="addTag">
							  <i class="fa fa-plus"></i>
							</span>
						</span>
						<br>
						<div class="tag" v-for="tag in product.tags">
							<p>{{tag.name}}</p>
							<span class="icon" @click="deleteTag(tag)">
							  <i class="fa fa-times"></i>
							</span>
						</div>
					</span>
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
			<manufacturer-product-images :data="product"></manufacturer-product-images>
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
				<div class="column is-3 has-border-right">
					<div class="field-option--select">
						<label class="label">Tilføj Felt</label>
						<div class="control">
							<span class="select is-medium">
								<select name="field" v-model="selectedField">
									<option :value="field.id" v-for="field in fields">{{ field.name}}</option>
								</select>
							</span>
						</div>
					</div>
					<div class="field-options--container" v-if="selectedField == 1">
						<div class="field-option" v-for="option in fields[0].options">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox" name="dimension[]">
									{{option.name}}
								</label>
							</div>
						</div>
					</div>
					<div class="field-option--control">
						<button class="button is-primary is-medium is-pulled-right">Tilføj</button>
					</div>
				</div>
				<div class="column">
					<div class="columns">
						<div class="column">
							<div class="control is-horizontal">
								<div class="control-label">
									<label class="label"><small style="float: left;">Tekst Felt</small> Farve</label>
								</div>
								<div class="control is-grouped">
									<p class="control is-expanded">
									    <input class="input" type="text" placeholder="Farve">
									</p>
									<p class="control is-expanded">
									    <input class="input" type="email" placeholder="Grå 216, Kan fås i flere farver">
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="control is-horizontal">
								<div class="control-label">
									<label class="label"><small style="float: left;">Tekst Felt</small> Type</label>
								</div>
								<div class="control is-grouped">
									<p class="control is-expanded">
									    <input class="input" type="text" placeholder="Type">
									</p>
									<p class="control is-expanded">
									    <input class="input" type="email" placeholder="Sovesofa">
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="control is-horizontal">
								<div class="control-label">
									<label class="label"><small style="float: left;">Tekst Felt</small> Materiale</label>
								</div>
								<div class="control is-grouped">
									<p class="control is-expanded">
									    <input class="input" type="text" placeholder="Materiale">
									</p>
									<p class="control is-expanded">
									    <input class="input" type="email" placeholder="Stof, med høj slidstyrke">
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="control is-horizontal">
								<div class="control-label">
									<label class="label"><small style="float: left;">Tekst Felt</small> Fjedring</label>
								</div>
								<div class="control is-grouped">
									<p class="control is-expanded">
									    <input class="input" type="text" placeholder="Fjedring">
									</p>
									<p class="control is-expanded">
									    <input class="input" type="email" placeholder="Posefjedre">
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="control is-horizontal">
								<div class="control-label">
									<label class="label"><small style="float: left;">Tekst Felt</small> Ben</label>
								</div>
								<div class="control is-grouped">
									<p class="control is-expanded">
									    <input class="input" type="text" placeholder="Ben">
									</p>
									<p class="control is-expanded">
									    <input class="input" type="email" placeholder="Metal">
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div class="control">
								<div class="control-label">
									<label style="width: 200px" class="label"><small style="float:left;">Dimensioner</small> Dimensioner</label>
								</div>
								<div class="columns" style="padding: 15px; width: 100%;">
									<div class="column is-1">
										<div class="content">	
											<h4 style="line-height:1.5;">Højde</h4>
											<h4 style="line-height:1.5;">Længde</h4>
											<h4 style="line-height:1.5;">Bredde</h4>
										</div>
									</div>
									<div class="column ">
										<p class="control has-addons">
										    <span class="select">
										    	<select>
										        	<option>MM</option>
										        	<option selected>CM</option>
										        	<option>M</option>
										    	</select>
										    </span>
										    <input class="input is-expanded" type="text" placeholder="Værdi">
										</p>
										<p class="control has-addons">
										    <span class="select">
										    	<select>
										        	<option>MM</option>
										        	<option selected>CM</option>
										        	<option>M</option>
										    	</select>
										    </span>
										    <input class="input is-expanded" type="text" placeholder="Værdi">
										</p>
										<p class="control has-addons">
										    <span class="select">
										    	<select>
										        	<option>MM</option>
										        	<option selected>CM</option>
										        	<option>M</option>
										    	</select>
										    </span>
										    <input class="input is-expanded" type="text" placeholder="Værdi">
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="columns">
						<div class="column">
							<div style="border-bottom: 1px solid lightgrey">Preview:</div>
							<div class="preview" style="padding: 15px">
								<div><strong>Farve:</strong> ​Grå 216, kan fås i flere farver</div>
								<div><strong>Type:</strong> ​Sovesofa</div>
								<div><strong>Materiale:</strong> Stof, med høj slidstyrke</div>
								<div>​<strong>Fjedring:</strong> ​Posefjedre</div>
								<div><strong>Ben:</strong> ​Metal</div>
								<div><strong>Mål:</strong> ​Længde 200 cm x Bredde 140 cm x Højde 90 cm</div>
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
    			
    			tagName: '',
    			selectedField: 1,
    			fields: [
    				{ 
    					id: 1,
						name: 'Dimensioner',
						options: [
							{ name: 'Højde' },
							{ name: 'Længde' },
							{ name: 'Bredde' },
							{ name: 'Dybde' }
						]
    				},
    				{
    					id: 2,
    					name: 'Tekstfelt',
    					options: []
    				},
    				{
    					id: 3,
    					name: 'Farver',
    					options: []
    				},
    				{
    					id: 4,
    					name: 'Pris',
    					options: []
    				}
    			]
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
    		},
    		addTag(){
    			let vm = this;
    			if(vm.tagName != '')
    			{
	    			this.$http
	    				.post(
    						'/manufacturer/tags', 
    						{   
    							'product_id' : vm.product.id,
    							'name' : vm.tagName 
    						})
	    				.then( (response) => {
	    				vm.tagName = '';
	    				vm.product.tags = response.data;
	    			})
    			}
    		},
    		deleteTag(tag){
    			let vm = this;
    			this.$http
    				.delete('/manufacturer/tags/'+tag.id)
    				.then( (response) => {
    					vm.product.tags = vm.product.tags.filter( (item) => item.id != tag.id );
    				});
    		}
    	},
        mounted() {
        }
    }
</script>
