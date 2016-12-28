<template>
    <aside class="menu sidebar">
        <p class="menu-label" v-if="isAdmin">
            Manufacturer
        </p>
        <ul class="menu-list" v-if="isManufacturer">
            <li v-for="menuItem in manufacturerMenuItems">
                <a :class="{ 'is-active' : isActive(menuItem.route) }" :href="menuItem.route"> 
                    <span class="icon">
                        <i class="fa" :class="menuItem.icon"></i>
                    </span>
                    {{ menuItem.name }}
                </a>
            </li>
        </ul>
        <p class="menu-label" v-if="isAdmin">
            Shopkeeper
        </p>
        <ul class="menu-list" v-if="isShopkeeper">
            <li v-for="menuItem in shopkeeperMenuItems">
                <a :class="{ 'is-active' : isActive(menuItem.route) }" :href="menuItem.route">
                    <span class="icon">
                        <i class="fa" :class="menuItem.icon"></i>
                    </span>
                    {{ menuItem.name }}
                </a>
            </li>
        </ul>
    </aside>
</template>
<script>
    export default {
        data() {
            return {
                shopkeeperMenuItems: [
                    { name: 'Dashboard', route: '/home', icon: 'fa-user'},
                    { name: 'Products', route: '/shopkeeper/products', icon: 'fa-cog'},
                    { name: 'Manufacturer', route: '/shopkeeper/manufacturer', icon: 'fa-adjust'},
                ],
                manufacturerMenuItems: [
                    { name: 'Dashboard', route: '/home', icon: 'fa-user'},
                    { name: 'Products', route: '/manufacturer/products', icon: 'fa-cog'},
                    { name: 'Media', route: '/manufacturer/media', icon: 'fa-home'},
                    { name: 'Shopkeeper', route: '/manufacturer/shopkeeper', icon: 'fa-home'}
                ]
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
            isActive(route){
                return '/'+Laravel.route == route;
            }
        },
        mounted() {
            console.log(Laravel.route);
        }
    }
</script>