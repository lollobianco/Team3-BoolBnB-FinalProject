<template>
    <div class="mx-auto w-75 p-lg-5 p-sm-3 height-nav">
        <div class="img-cont">
            <h1>{{ apartments.name }}</h1>
            <p>{{ apartments.address }}</p>
            <img class="w-100 rounded-4 image-cover" style="height: 500px; object-fit: cover; object-position: center;"
                :src="'/storage/' + apartments.cover_image">
            <div class="row d-flex justify-content-between p-2">
                <!-- LEFT SIDE -->
                <div class="col-lg-8 col-sm-12 pe-lg-4 px-sm-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="list-group list-group-horizontal-lg list-group-vertical-sm w-100 pt-4">
                            <li class="list-group-item fs-6">{{ apartments.accomodation }} Guests</li>
                            <li class="list-group-item fs-6">{{ apartments.rooms }} Bedrooms</li>
                            <li class="list-group-item fs-6">{{ apartments.beds }} Beds</li>
                            <li class="list-group-item fs-6">{{ apartments.bathrooms }} Bathrooms</li>
                        </ul>
                        <!-- <div class="mt-3">
                        <img class="pic border border-danger rounded-4" :src="'/storage/' + apartments.cover_image">
                    </div> -->
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div>
                            <font-awesome-icon icon="fa-solid fa-location-dot" size="xl" />
                        </div>
                        <div class="mx-3">
                            <h5>Good position</h5>
                            <p>100% of recent guests rated the location 5-star.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <font-awesome-icon icon="fa-solid fa-key" size="lg" />
                        </div>
                        <div class="mx-3">
                            <h5>Great check-in experience</h5>
                            <p>100% of guests rated the check-in process 5 stars.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <font-awesome-icon icon="fa-solid fa-calendar-xmark" size="xl" />
                        </div>
                        <div class="mx-3">
                            <h5>Free cancellation for 48 hours.</h5>
                        </div>
                    </div>
                    <hr>
                    <!-- DESCRIPTION -->
                    <div class="mt-4">
                        <p>{{ apartments.description }}</p>
                    </div>
                    <hr>
                    <!-- SERVICES -->
                    <div class="questaclassenonesiste">
                        <h4>What you will find</h4>
                    </div>
                    <ul class="p-0">                        
                        <span v-for="service in apartments.services" :key="service.id" class="badge bg-secondary text-white mb-4 me-2">                            
                            <!-- <font-awesome-icon icon="{{service.icon }}" /> -->
                            {{ service.name }}
                        </span>
                    </ul>
                </div>
                <!-- RIGHT SIDE -->
                <div class="mt-3 col-lg-4 col-sm-12 card-contact rounded-4 p-2">
                    <h3 class="text-center text-white p-2">Sent a message to the owner</h3>
                    <div class="p-2">
                        <form action="">
                            <label class="form-label" for="Name"></label>
                            <input class="form-control" type="text" placeholder="Name">
                            <label class="form-label" for="Surname"></label>
                            <input class="form-control" type="text" placeholder="Surname">
                            <textarea class="form-control mt-4" name="message" placeholder="Message"></textarea>
                            <button type="submit" class="btn bg-danger bg-gradient text-white mt-4">Send</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ApartmentShow',
    data() {
        return {
            apartments: []


        }
    },
    mounted() {
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
// .cont1{
//     width: 65%;
//     margin: 0 auto;
// }
.height-nav {
    margin-top: 62.66px;
}

.pic {
    width: 120px;
}

.fa-location-dot {
    color: #D7526A;
}

.fa-key {
    color: #D7526A;
}

.fa-calendar-xmark {
    color: #D7526A;
}

.card-contact {
    height: 400px;
    background-color: #D7526A;
}

@media screen and (max-width: 991px) {

    .height-nav {
        width: 90% !important;
        margin-top: 86.66px;
    }

    .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: 4px !important;
        padding-left: 4px !important;
        margin-top: var(--bs-gutter-y);
    }

    .image-cover {
        height: 300px !important;
    }

}
</style>