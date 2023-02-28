<template>
  <div class="container-fluid">
    <div class="row">

      <div class="col-3 bg-landscape-desktop border-end d-flex flex-column justify-content-center">


        <form action="" class="d-flex mb-5">
          <input class="form-control me-2 rounded-5 search-border" type="search" placeholder="Search" aria-label="Search"
            v-model="searched_address">
        </form>

        <div class="">

          <div class="mb-5">
            <div v-for="service in services" :key="service.id"
              class="my-2 cat action btn btn-secondary border-0 p-0 rounded-5 me-2">
              <label>
                <input type="checkbox" :value="service.name" v-model="active_services">
                <span>{{ service.name }}</span>
              </label>
            </div>
          </div>

          <div class="d-flex w-100 ">
            <div class="w-50 px-1">
              <input name="Rooms" id="" type="number" min="1" max="50" placeholder="Number of Rooms" class="form-control"
                v-model="min_rooms">
            </div>

            <div class="mb-5 w-50 px-1">
              <input name="Beds" id="" type="number" min="1" max="50" placeholder="Number of Beds" class="form-control"
                v-model="min_beds">
            </div>
          </div>

        </div>

        <div class="w-100 d-flex justify-content-around align-items-center">
          <button type="submit" class="btn-custom w-75" @click="advancedSearch()">Search</button>
          <font-awesome-icon icon="fa-solid fa-plane-departure" class="pink-color2 fs-1" />
        </div>



      </div>

      <div class="offcanvas offcanvas-start border-0" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header w-100">
          <!-- <h5 class="offcanvas-title" id="staticBackdropLabel">Search</h5> -->
          <!-- <button type="button" class="ms-auto btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
          <font-awesome-icon icon="fa-solid fa-x" type="button"
            class="ms-auto btn-custom rounded-2 btn text-white p-2 fs-4" data-bs-dismiss="offcanvas" aria-label="Close" />
        </div>
        <div class="offcanvas-body p-1">
          <div class="p-0 h-100 d-flex flex-column justify-content-center">
            <div class="">


              <form action="" class="d-flex mb-5">
                <input class="form-control me-2 rounded-5 search-border" type="search" placeholder="Search"
                  aria-label="Search" v-model="searched_address">
              </form>

              <div class="">

                <div class="mb-5">
                  <div v-for="service in services" :key="service.id"
                    class="my-2 cat action btn btn-secondary border-0 p-0 rounded-5 me-2">
                    <label>
                      <input type="checkbox" :value="service.name" v-model="active_services">
                      <span>{{ service.name }}</span>
                    </label>
                  </div>
                </div>

                <div class="d-flex w-100 ">
                  <div class="w-50 px-1">
                    <input name="Rooms" id="" type="number" min="1" max="50" placeholder="Number of Rooms"
                      class="form-control" v-model="min_rooms">
                  </div>

                  <div class="mb-5 w-50 px-1">
                    <input name="Beds" id="" type="number" min="1" max="50" placeholder="Number of Beds"
                      class="form-control" v-model="min_beds">
                  </div>
                </div>

              </div>

              <div class="w-100 d-flex justify-content-around align-items-center" data-bs-dismiss="offcanvas" aria-label="Close">
                <button type="submit" class="btn-custom w-75" @click="advancedSearch()" >Search</button>
                <font-awesome-icon icon="fa-solid fa-plane-departure" class="pink-color2 fs-1" />
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-sm-12 p-sm-4 right-side  p-lg-5 ms-auto">
        <div class="d-flex">
          <div class="row">
            <a v-for="elem in filtered_apartments" :key="elem.id" href="#"
              class="apartment-card border-0 col-lg-3 col-md-5  px-2 col-sm-12">

              <div class="card-relative">
                <font-awesome-icon icon="fa-regular fa-eye" class="fa-eye" />
                <img :src="'/storage/' + elem.cover_image" class="card-img coverimg img-fluid rounded-4" alt="cover image">
              </div>

              <div class="card-body p-0">
                <h6 class="mt-2 card-element">{{ elem.address }}</h6>
           
                <h6 class="mt-0 mb-4 card-element"> {{ elem.price }}€  a notte</h6>

              </div>
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  name: 'AdvancedSearch',
  props: {
    searched_address: {
      type: String,
      required: false
    }
  },
  data() {
    return {
      apartments: [], //Tutti gli appartamenti con i servizi
      apartment_service: '', //Solo i servizi degli appartamenti
      services: [], //Tutti i servizi

      filtered_apartments: [], //Appartamenti filtrati

      active_services: [], //Servizi che vogliamo filtrare
      min_beds: null,
      min_rooms: null,

      i: 1,
    }
  },
  mounted() {
    this.getServices();
    if (window.matchMedia("(max-width: 1300px)").matches) {
      this.openOffcanvas(); // La funzione che vuoi far partire
    }
  },
  methods: {
    getServices() {
      axios
        .get("http://127.0.0.1:8000/api/advanced-search")
        .then((res) => {

          this.apartments = res.data.apartments;
          console.log(this.apartments)
          this.services = res.data.services;

        })
    },

    advancedSearch() {
      this.filtered_apartments = this.apartments.filter(apartment => {
        // filtra per numero minimo di stanze
        if (this.min_rooms && apartment.rooms < this.min_rooms) {
          return false;
        }
        // filtra per numero minimo di letti
        if (this.min_beds && apartment.beds < this.min_beds) {
          return false;
        }
        // filtra per servizi attivi
        if (this.active_services.length > 0) {

          const apartmentServiceIds = apartment.services.map(service => service.name);

          const activeServiceIds = [];
          this.active_services.forEach(elem => {
            activeServiceIds.push(elem)
          })

          const matches = activeServiceIds.filter(id => apartmentServiceIds.includes(id));
          if (matches.length !== activeServiceIds.length) {
            return false;
          }
          console.log(matches)
        }
        // se l'appartamento ha superato tutti i filtri, lo inserisce nell'array filtrato
        return true;
      });
    },
    openOffcanvas() {
      let myOffcanvas = new bootstrap.Offcanvas(document.querySelector('#staticBackdrop'));
      myOffcanvas.show();
    }

    // searchText() {
    //   this.filtered_apartments = this.apartments.filter(apartment => {

    //     if (this.searched_address && apartment.address != this.searched_address) {
    //       return false;
    //     }
    //     return true;

    //   });
    // },

  }
}

</script>

<style lang="scss" scoped>
.bg-landscape-mobile {
  display: none;
}

#staticBackdrop {
  background-image: url('../../../../public/assets/image.jpg');
  background-position: bottom;
  background-size: cover;
  min-height: 100vh;
}

.bg-landscape-desktop {
  background-image: url('../../../../public/assets/image.jpg');
  background-position: bottom;
  background-size: cover;
  min-height: calc(100vh - 94.66px);
  margin-top: 94.66px;
  position: fixed;
  box-shadow: 1px 7px 42px -4px rgba(0, 0, 0, 0.55);
  -webkit-box-shadow: 1px 7px 42px -4px rgba(0, 0, 0, 0.55);
  -moz-box-shadow: 1px 7px 42px -4px rgba(0, 0, 0, 0.55);
}

.right-side {
  margin-top: 94.66px;
}

.btn-close {
  color: white !important;
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
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.35);
}

.apartment-card:hover .card-element {
  text-shadow: 1px 1px 1px rgba(255, 56, 92, 0.35);
}

.cat {
  cursor: pointer;
}

.cat label {
  margin: 0;
  cursor: pointer;
}

.cat label span {
  text-align: center;
  padding: 5px 10px;
  display: block;
  cursor: pointer;
}

.cat label input {
  position: absolute;
  display: none;
  color: #fff !important;
}

.action input:checked+span {
  background-color: #ff385c;
  transition: 500ms;
  border-radius: 30rem;
  color: white;
}

.search-border {
  border: 2px solid #d7526a !important;
}

.btn-login-register {
  background-color: #d7526a !important;
  color: white !important;
}

.btn-custom {
  color: #fff;
  background-color: #d7526a;
  padding: 0.8rem 0.8rem;
  border: solid #d7526a 1px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
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

.pink-color2 {
  color: #d7526a !important;
}

@media screen and (max-width: 1300px) and (min-width: 320px) {

  .bg-landscape-desktop {
    display: none !important;
  }

}
</style>