<template>
    <aside class="menu sidebar">
        <p class="menu-label" v-if="isAdmin">
            Manufacturer
        </p>
        <ul class="menu-list" v-if="isManufacturer">
            <li v-for="menuItem in manufacturerMenuItems">
                <a :class="{ 'is-active' : isActive(menuItem.route) }" :href="menuItem.route"> <span class="icon">
  <i class="fa fa-home"></i>
</span>{{ menuItem.name }}</a>
            </li>
        </ul>
        <p class="menu-label" v-if="isAdmin">
            Shopkeeper
        </p>
        <ul class="menu-list" v-if="isShopkeeper">
            <li v-for="menuItem in shopkeeperMenuItems">
                <a :class="{ 'is-active' : isActive(menuItem.route) }" :href="menuItem.route">{{ menuItem.name }}</a>
            </li>
        </ul>
    </aside>
</template>
<script>
    export default {
        data() {
            return {
                shopkeeperMenuItems: [
                    { name: 'Dashboard', route: '/home'},
                    { name: 'Products', route: '/shopkeeper/products'},
                    { name: 'Manufacturer', route: '/shopkeeper/manufacturer'},
                ],
                manufacturerMenuItems: [
                    { name: 'Dashboard', route: '/home'},
                    { name: 'Products', route: '/manufacturer/products'},
                    { name: 'Media', route: '/manufacturer/media'},
                    { name: 'Shopkeeper', route: '/manufacturer/shopkeeper'}
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