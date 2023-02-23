<template>
  <div class="container-fluid d-flex">
    <div class="row">
      <a v-for="elem in apartments" :key="elem.id" href="#"
        class="apartment-card border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">

        <div class="card-relative">
          <font-awesome-icon icon="fa-regular fa-eye" class="fa-eye" />
          <img :src="'/storage/' + elem.cover_image" class="card-img coverimg rounded-4" alt="cover image">
        </div>

        <!-- <img :src="'/storage/' + elem.cover_image" class="card-img coverimg" alt="cover image"> -->
        <div class="card-body p-0">
          <h6 class="mt-2 card-element">{{ elem.address }}</h6>
          <h6 class="mt-0 card-element"> <strong>{{ elem.price }}€ </strong> a notte</h6>

        </div>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  data() {
    return {
      apartments: [],
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
        .get("http://127.0.0.1:8000/api/apartments")
        .then((res) => {
          console.log(res.data);
          this.apartments = res.data;
          this.apartments = this.apartments.apartments
          console.log(this.apartments);
        })
    },
  },
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

.apartment-card  {
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
</style>