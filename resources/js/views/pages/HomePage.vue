<template>
  <div>

    <div class="container-fluid height-container w-100 col-lg-9 col-sm-12 p-sm-4 p-lg-5">
      <div class="row">

        <router-link v-for="sponsor in sponsored_apartments" :key="sponsor.id"
          :to="{ name: 'apartment-show', params: { id: sponsor.id } }"
          class="apartment-card border-0 col-xxl-2 col-lg-3 col-md-6 img-fluid p-2 col-sm-12">

          <div class="card-relative mx-1 mt-2">
            <font-awesome-icon icon="fa-regular fa-eye" class="fa-eye" />
            <i class="fa-solid fa-star"></i>
            <img :src="'/storage/' + sponsor.cover_image" class="card-img coverimg border border-warning border-1 rounded-4" alt="cover image">
          </div>


            <div class="card-body mx-1 mt-3">
            <h6 class="mt-4 mb-0 pb-0 card-element">{{ sponsor.name }}</h6>
            <p class="  mb-1  ">{{ sponsor.address }}</p>

            <p class=""><span class="card-element fw-bold">{{ sponsor.price }}€</span>   night</p>
          </div>

        </router-link>

        <router-link v-for="elem in unsponsored_apartments" :key="elem.id"
          :to="{ name: 'apartment-show', params: { id: elem.id } }"
          class="apartment-card border-0 col-xxl-2 col-lg-3 col-md-6 img-fluid p-2 col-sm-12">

          <div class="card-relative mx-1 mt-2">
            <font-awesome-icon icon="fa-regular fa-eye" class="fa-eye" />
            <img :src="'/storage/' + elem.cover_image" class="card-img coverimg rounded-4" alt="cover image">
          </div>


          <div class="card-body mx-1 mt-3 ">
            <h6 class="mt-4 mb-0 pb-0 card-element">{{ elem.name }}</h6>
            <p class="  mb-1  ">{{ elem.address }}</p>

            <p class=" fs-smaller"><span class="card-element fw-bold">{{ elem.price }}€</span>   night</p>
          </div>

        </router-link>

      </div>
    </div>
    <div class="bg-dark ww-100 text-white p-1 mt-5 pe-5 text-end fixed-bottom ">Made with Love ❤️ BoolBnb - Team 3 - #77  @2023</div>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  data() {
    return {
      apartments: [],
      sponsored_apartment_id: [],

      //ARRAY PER LA STAMPA
      sponsored_apartments: [],
      unsponsored_apartments: [],
      //-------------------------

      authUser: window.authUser
    };
  },
  mounted() {
    this.getPosts();
  },
  created() {
    console.log(this.authUser);
  },
  methods: {
    getPosts() {
      axios
        .get("/api/apartments")
        .then((res) => {

          this.apartments = res.data;
          this.apartments = this.apartments.apartments

          console.log(res.data.apartments_sponsors)

          res.data.apartments_sponsors.forEach(element => {

            this.sponsored_apartment_id.push(element.apartment_id);
            console.log(this.sponsored_apartment_id)

          });

          // this.sponsored_apartment_id.forEach(sponsor => {

          //   this.apartments.forEach(element => {

          //     console.log(this.apartments)


          //     console.log(element.id, sponsor)

          //     if (element.id == sponsor) {

          //       this.sponsored_apartments.push(element)

          //     } else {

          //       this.unsponsored_apartments.push(element)

          //     }
          //   })

          // })

          this.apartments.forEach(element => {
            if (this.sponsored_apartment_id.includes(element.id)) {
              this.sponsored_apartments.push(element);
            } else {
              this.unsponsored_apartments.push(element);
            }
          });


          console.log('APPARTAMENTI SPONSORIZZATI', this.sponsored_apartments);
          console.log('APPARTAMENTI NON SPONSORIZZATI', this.unsponsored_apartments);

        })
    },
  },
}
</script>

<style lang="scss" scoped>
.height-container {
  margin-top: 62.66px !important;
}

.coverimg {
  aspect-ratio: 1/1;
  object-fit: cover;
  box-shadow: 7px 7px 21px -4px rgba(0, 0, 0, 0.55);
  -webkit-box-shadow: 7px 7px 21px -4px rgba(0, 0, 0, 0.55);
  -moz-box-shadow: 7px 7px 21px -4px rgba(0, 0, 0, 0.55);
}

.apartment-card {
  background: transparent !important;
  cursor: pointer;
  text-decoration: none;
  color: black;
}

.apartment-card:hover {
  text-decoration: none;
  color: black;
}

.apartment-card:hover .coverimg {
  filter: blur(1px) brightness(0.7) contrast(0.9) grayscale(0.12);
  transition: 300ms;
}

.card-relative {
  position: relative;
}

.fa-eye {
  display: none;
  color: #ff385c;
  position: absolute;
  opacity: 0;
  font-size: 2rem;
}

.fa-star {
  color: #E8BE44;
  position: absolute;
  bottom: 9px;
  left: 7px;
  font-size: 2.2rem;
}

.apartment-card:hover .fa-eye {
  display: block;
  opacity: 1;
  transition: 300ms;
  z-index: 100;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.card-element {
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.20);
}

.apartment-card:hover .card-element {
  text-shadow: 1px 1px 1px rgba(255, 56, 92, 0.15);
}
</style>