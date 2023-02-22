<template>
    <div>
        <NavBar/>
        <main class="p-5">
            <router-view></router-view>        
        </main>
    </div>
</template>

<script>
import NavBar from "../components/NavBar.vue"
 
    export default {
        name:"App",
        components: {
            NavBar,
        }
    }
</script>



<style lang="scss">

@import url('https://fonts.cdnfonts.com/css/circular-std');

* {
    font-family: 'Circular Std', sans-serif;
}

</style>