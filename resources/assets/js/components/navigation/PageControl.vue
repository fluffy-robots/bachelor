<template>
	<nav class="nav has-shadow page-control">
	    <a class="button is-medium is-primary" v-if="">GEM</a>
	    <span class="nav-item">
            <a v-for="breadcrumb in breadcrumbs">{{breadcrumb}}</a>
        </span>


	</nav>
</template>

<style lang="sass">
	.page-control{
		padding: 0 10px;
	    display: flex;
	    align-items: center;
        position: fixed;
        top: 61px;
        width: calc( 100% - 16.6666666667%);
	}
</style>

<script>
    export default {
    	props: ['state'],
        data(){
            return {
                primaryButton: {
                    show: false,
                    text: 'Knap'
                }
            }
        },
        computed: {
            isAdmin(){
                return Helper.isAdmin();
            },
            isManufacturer() {
                return Helper.isManufacturer();
            },
            isShopkeeper() {
                return Helper.isShopkeeper();
            }
        },
        methods: {
        	// Shopkeeper Methods
        	shopkeeperProductInit(){},
        	shopkeeperProductNew(){},
        	shopkeeperProductSelect(product){},

        	shopkeeperMediaInit(data){
                console.log(data);
            },
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
        	EventHub.$on('shopkeeper-products--init', (data) => { vm.shopkeeperProductInit(data) });
        	EventHub.$on('shopkeeper-products--new', (data) => { vm.shopkeeperProductNew(data) });
        	EventHub.$on('shopkeeper-products--select', (data) => { vm.shopkeeperProductSelect(data) });

        	EventHub.$on('shopkeeper-media--init', (data) => { vm.shopkeeperMediaInit(data) });
        	EventHub.$on('shopkeeper-media--select', (data) => { vm.shopkeeperMediaSelect(data) });

			EventHub.$on('shopkeeper-manufacturer--init', (data) => { vm.shopkeeperManufacturerInit(data) });
        	EventHub.$on('shopkeeper-manufacturer--select', (data) => { vm.shopkeeperManufacturerSelect(data) });       	
			
			// Manufacturer EventHubs
        	EventHub.$on('manufacturer-products--init', (data) => { vm.manufacturerProductInit(data) });
        	EventHub.$on('manufacturer-products--new', (data) => { vm.manufacturerProductNew(data) });
        	EventHub.$on('manufacturer-products--select', (data) => { vm.manufacturerProductSelect(data) });

			EventHub.$on('manufacturer-shopkeeper--init', (data) => { vm.manufacturerShopkeeperInit(data) });
        	EventHub.$on('manufacturer-shopkeeper--select', (data) => { vm.manufacturerShopkeeperSelect(data) });       
        }
    }
</script>