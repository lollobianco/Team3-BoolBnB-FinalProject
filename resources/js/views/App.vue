<template>
    <div>
        <NavBar/>
        <main class="">
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

.form-control:focus {
    border-color: #d7526a !important;
    box-shadow: 0 0 0 0.2rem rgba(215, 82, 106, 0.5) !important;
}

</style>