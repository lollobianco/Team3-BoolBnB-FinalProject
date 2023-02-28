<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="img-cont">
            <h1>{{ apartments.name }}</h1>
            <p>{{ apartments.address }}</p>
            <img :src="'/storage/' + apartments.cover_image">
            <div class="cont d-flex justify-content-between align-items-center">
                <div class="left-side">
                    <ul class="list-group list-group-horizontal pt-4">
                        <li class="list-group-item">{{ apartments.accomodation }} Guests</li>
                        <li class="list-group-item">{{ apartments.rooms }} Bedrooms</li>
                        <li class="list-group-item">{{ apartments.beds }} Beds</li>
                        <li class="list-group-item">{{ apartments.bathrooms }} Bathrooms</li>
                    </ul>
                    <hr>
                </div>
                <div>MESSAGGI</div>

            </div>
            

        </div>
        
    </div>
</template>

<script>
    export default {
        name: 'ApartmentShow',
        data(){
            return {
                apartments: []
                

            }
        },
        mounted(){
            this.getApartments()
        },
        methods: {
            getApartments() {
            axios
                .get("http://127.0.0.1:8000/api/apartments/" + this.$route.params.id)
                    .then((res) => {
                        console.log('res data', res.data);
                        this.apartments = res.data;
                        console.log(this.apartments);
        })
    },
        }
    }

</script>

<style scoped lang="scss">

.left-side{
    width: 60%;
}

.img-cont2{
    width: 100px;
    

}

</style>