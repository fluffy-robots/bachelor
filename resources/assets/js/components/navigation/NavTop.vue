<template>
    <div class="nav-top">
        <search-bar class="nav-top--search"></search-bar>
        <div class="nav-top--buttons">
            <a class="nav-top--notification is-icon"><span class="icon"><i class="fa fa-bell"></i></span></a>
            <a class="nav-top--settings is-icon"><span class="icon"><i class="fa fa-cog"></i></span></a>
            <span class="nav-top--separator"></span>
            <a class="nav-top--logout is-icon" @click="logout"><span class="icon"><i class="fa fa-sign-out"></i></span>Logout</a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                test: 'Peter'
            };
        },
        methods: {
            logout() {
                this.$http.post('/logout', Laravel.csrfToken).then((response) => {
                    window.location.href = "/";
                }, (response) => {
                    window.location.href = "/";
                });

            }
        },
        mounted() {            
        }
    }
</script>