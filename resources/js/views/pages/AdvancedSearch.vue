<template>
  <div>

    <div class="d-flex">

      <div v-for="service in services" :key="service.id" class="cat action btn btn-secondary border-0 rounded-5 p-0 me-2 mb-4">
        <label>
          <input type="checkbox" :value="service.name" v-model="active_services">
          <span>{{ service.name }}</span>
        </label>
      </div>

      <div class="d-flex">
        <div class="mx-3">
          <div>Select Min Number of Rooms</div>
          <select name="Rooms" id="" class="w-100" v-model="min_rooms">
            <option v-for="i in 50" :key="i" :value="i">{{ i }} Rooms</option>
          </select>
        </div>

        <div>
          <div>Select Min Number of Beds</div>
          <select name="Beds" id="" class="w-100" v-model="min_beds">
            <option v-for="i in 50" :key="i" :value="i">{{ i }} Beds</option>
          </select>
        </div>
      </div>

      <button @click="advancedSearch()">
        Search
      </button>

    </div>

    <div class="container-fluid d-flex">
      <div class="row">
        <a v-for="elem in filtered_apartments" :key="elem.id" href="#"
          class="apartment-card border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">

          <div class="card-relative">
            <font-awesome-icon icon="fa-regular fa-eye" class="fa-eye" />
            <img :src="'/storage/' + elem.cover_image" class="card-img coverimg rounded-4" alt="cover image">
          </div>

          <!-- <img :src="'/storage/' + elem.cover_image" class="card-img coverimg" alt="cover image"> -->
          <div class="card-body p-0">
            <h6 class="mt-2 card-element">{{ elem.address }}</h6>
            <h6 class="mt-2 card-element">Rooms: {{ elem.rooms }}</h6>
            <h6 class="mt-2 card-element">Beds: {{ elem.beds }}</h6>
            <h6 class="mt-0 card-element"> <strong>{{ elem.price }}€ </strong> a notte</h6>

          </div>
        </a>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: 'AdvancedSearch',
  data() {
    return {
      apartments: [],
      apartment_service: '',
      services: [],

      filtered_apartments: [],

      active_services: [],
      min_beds: null,
      min_rooms: null,

      i: 1,
    }
  },
  mounted() {
    this.getServices();
  },
  methods: {
    getServices() {
      axios
        .get("http://127.0.0.1:8000/api/advanced-search")
        .then((res) => {

          this.apartments = res.data.apartments;
          this.services = res.data.services;

          // console.log(this.apartments);

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
    }
  }
}

</script>

<style lang="scss" scoped>
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
</style>