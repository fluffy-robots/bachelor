<template>
	<nav class="nav has-shadow page-control">
	    <a class="button is-medium is-primary">GEM</a>
	    <span class="nav-item">test > mere > test</span>


	</nav>
</template>

<style lang="sass">
	.page-control{
		padding: 0 10px;
	    display: flex;
	    align-items: center;
	}
</style>

<script>
    export default {
    	props: ['state'],
        computed: {
            isAdmin(){
                return Helper.isAdmin();
            },
            isManufacturer() {
                return Helper.isManufacturer();
            },
            isShopkeeper() {
                return Helper.isShopkeeper();
            },
        },
        methods: {
        	// Shopkeeper Methods
        	shopkeeperProductInit(){},
        	shopkeeperProductNew(){},
        	shopkeeperProductSelect(product){},

        	shopkeeperMediaInit(){},
        	shopkeeperMediaSelect(media){},

        	shopkeeperManufacturerInit(){},
        	shopkeeperManufacturerSelect(manufacturer){},

        	// Manufacturer Methods
        	manufacturerProductInit(){},
        	manufacturerProductNew(){},
        	manufacturerProductSelect(product){},

        	manufacturerShopkeeperInit(){},
        	manufacturerShopkeeperSelect(manufacturer){},
        },
        mounted() {
        	let vm = this;

        	// Shopkeeper Events
        	Event.$on('shopkeeper-products--init', vm.shopkeeperProductInit());
        	Event.$on('shopkeeper-products--new', vm.shopkeeperProductNew());
        	Event.$on('shopkeeper-products--select', vm.shopkeeperProductSelect());

        	Event.$on('shopkeeper-media--init', vm.shopkeeperMediaInit());
        	Event.$on('shopkeeper-media--select', vm.shopkeeperMediaSelect());

			Event.$on('shopkeeper-manufacturer--init', vm.shopkeeperManufacturerInit());
        	Event.$on('shopkeeper-manufacturer--select', vm.shopkeeperManufacturerSelect());       	
			
			// Manufacturer Events
        	Event.$on('manufacturer-products--init', vm.manufacturerProductInit());
        	Event.$on('manufacturer-products--new', vm.manufacturerProductNew());
        	Event.$on('manufacturer-products--select', vm.manufacturerProductSelect());

			Event.$on('manufacturer-shopkeeper--init', vm.manufacturerShopkeeperInit());
        	Event.$on('manufacturer-shopkeeper--select', vm.manufacturerShopkeeperSelect());       
        }
    }
</script>