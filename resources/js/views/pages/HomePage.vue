<template>
  <div class="container-lg d-flex p-5">
    <div class="row">
      <div v-for="elem in apartments" :key="elem.id" class="card p-4 border-0 col-3">
        <img :src="elem.cover_image" class="card-img rounded-3" alt="...">
        <div class="card-body p-0">
          <!-- <h5 class="card-title">{{ elem.name }}</h5> -->
          <p class="m-0">{{ elem.address }}</p>
          <p class="m-0">{{ elem.price }}€ a notte</p>
          <!-- <p class="card-text">{{ elem.description.substring(0, 200) + "..." }}</p> -->
          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
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
    };
  },
  mounted() {
    this.getPosts();
  },
  methods: {
    getPosts() {
      axios
        .get("http://127.0.0.1:8000/api/apartments")
        .then((res) => {
          console.log(res.data);
          this.apartments = res.data;
          this.apartments = this.apartments.apartments
          //Destrutturizzazione
          // const { current_page, last_page } = res.data;
          console.log(this.apartments);
          // this.pagination = {
          //   lastPage: last_page,
          //   currentPage: current_page,
          // };
        })
      // .catch((err) => {
      //   console.log(err);
      // })
      // .then(() => {
      //   this.isLoading = false;
      // });
    },
  },
}
</script>

<style lang="scss" scoped></style>