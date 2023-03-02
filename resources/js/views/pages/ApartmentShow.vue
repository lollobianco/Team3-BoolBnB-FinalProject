<template>
    <div class="mx-auto w-75 p-lg-5 p-sm-4 height-nav">
        <div class="">
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
                        <span v-for="service in apartments.services" :key="service.id"
                            class="badge bg-secondary text-white mb-4 me-2">
                            <i class="me-1" :class="service.icon"></i>
                            {{ service.name }}
                        </span>
                    </ul>
                </div>
                <!-- RIGHT SIDE -->
                <div class="mt-3 col-lg-4 col-sm-12 card-contact rounded-4 p-2">
                    <h3 class="text-center text-dark p-2">Sent a message to the owner</h3>
                    <div class="p-2">
                        <form action="">
                            <label class="form-label" for="Name"></label>
                            <input class="form-control" type="text" placeholder="Name" required>
                            <label class="form-label" for="Surname"></label>
                            <input class="form-control" type="text" placeholder="Surname" required>
                            <label class="form-label" for="Email"></label>
                            <input class="form-control" type="email" placeholder="Email" required>
                            <textarea class="form-control mt-4" name="message" placeholder="Message" required></textarea>
                            <button type="submit" class="btn btn-custom mt-4">Send <font-awesome-icon class="ms-2"
                                    icon="fa-solid fa-paper-plane" /></button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row p-2">
                <div class=" col-12 p-0">

                    <h2 class="mb-3">Dove si trova:</h2>

                    <div id="map" class="map rounded-4 image-cover" style="width: 100%; height: 500px;"></div>

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
            apartments: [],
            lat: '',
            long: '',
        }
    },
    mounted() {
        this.getApartments()

        setTimeout(() => {
            this.getMap()
        }, 1000); // delay time in milliseconds (1000ms = 1s)
    },
    methods: {
        getApartments() {
            axios
                .get("http://127.0.0.1:8000/api/apartments/" + this.$route.params.id)
                .then((res) => {
                    console.log('res data', res.data);
                    this.apartments = res.data;
                    console.log(this.apartments);
                    this.lat = this.apartments.lat
                    this.long = this.apartments.long
                })
        },

        // Map
        getMap() {
            console.log(this.lat, this.long)

            var latNum = this.lat
            var longNum = this.long
            console.log(latNum)
            console.log(longNum)
            var POS = [longNum, latNum]


            var map = tt.map({
                key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
                container: "map",
                center: POS,
                zoom: 3,
            })

            map.on('load', () => {
                new tt.Marker().setLngLat(POS).addTo(map)
            })
        }
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
    // height: 400px;
    background-color: rgba(190, 190, 190, 0.9);
}

.btn-custom {
    color: #fff;
    background-color: #d7526a;
    padding: 0.5rem 0.7rem;
    border: solid #d7526a 1px;
    // box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    border-radius: 50px 50px;
    transition: 1000ms;
    transform: translateY(0);
    // display: flex;
    // flex-direction: row;
    // justify-content: center;
    // align-items: center;
    cursor: pointer;
    text-transform: uppercase;
}

.btn-custom:hover {
    transition: 1000ms;
    // padding: 1rem 1rem;
    // transform: translateY(-0px);
    -moz-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -o-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1);
    background-color: #fff;
    color: #d7526a;
}

@media screen and (max-width: 991px) {

    .height-nav {
        width: 90% !important;
        margin-top: 80.66px;
        margin-bottom: 20px;
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