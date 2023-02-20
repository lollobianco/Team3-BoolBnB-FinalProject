<template>
  <div class="container-fluid d-flex homepage">
    <div class="row">
      <div v-for="elem in apartments" :key="elem.id" 
        class="card mt-2 border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">

        <img :src="'/storage/' + elem.cover_image" class="card-img coverimg mt-3" alt="cover image">
        <div class="card-body p-0">
          <h6 class="mt-2">{{ elem.address }}</h6>
          <h6  class="mt-0"> <strong>{{ elem.price  }} € </strong> notte</h6>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  data() {
    return {
      apartments: [],
      auth_user: [],
    };
  },
  mounted() {
    this.getPosts();
    this.getUser();
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
    getUser(){
      axios
        .get("http://127.0.0.1:8000/api/auth_user")
        .then((res) => {
          console.log(res.data);
          this.auth_user = res.data;
          // this.auth_user = this.apartments.apartments
          console.log(this.auth_user);   
        })
    }
  },
}
</script>

<style lang="scss">

.coverimg {
aspect-ratio: 1/1;
object-fit: cover;
}

.homepage {
  margin-top: 1rem;
  width: 95%;
}






</style>