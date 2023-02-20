<template>
  <div class="container-fluid py-3 container-nav">
    <div class="row navbar-80">
      <div class="d-flex justify-content-between align-items-center">
        <div class="logo-cont">
          <img src="../../../public/assets/Logo.svg" alt="logo">
        </div>
        <div>
          <form class="d-flex text-center" role="search">
            <input class="form-control me-2 rounded-5 search-border" type="search" placeholder="Search"
              aria-label="Search">
            <button class="btn btn-login-register rounded-circle" type="submit"><font-awesome-icon
                icon="fa-solid fa-magnifying-glass" /></button>
          </form>
        </div>
        <div class="dropdown">
          <button class="btn btn-light  dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <font-awesome-icon icon="fa-solid fa-bars" />
            <div class="ms-2 p-2">
              <font-awesome-icon icon="fa-solid fa-user" />
            </div>

          </button>
          <ul v-if="authUser == null" class="dropdown-menu">
            <li><a class="dropdown-item" href="/login">Login</a></li>
            <li><a class="dropdown-item" href="/register">Register</a></li>
          </ul>
          <ul v-else class="dropdown-menu">
            <li><a class="dropdown-item" href="/admin/apartments">My Apartments</a></li>
            <li><a class="dropdown-item" @click="logout(), reloadPage()">Logout</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "NavBar",
  data() {
    return {
      authUser: window.authUser
    };
  },
  created() {
    console.log(this.authUser);
  },
  methods: {
    yourMethodName() {
      console.log(this.authUser);
    },
    logout() {
      axios.post('/logout').then(() => {
        window.localStorage.removeItem('token');
        this.$router.push('/');
      });
    },
    reloadPage(){
      window.location.reload();
    }
  }
}
</script>

<style scoped lang="scss">
.logo-cont {
  img {
    width: 150px;
  }
}

.container-nav {
  border-bottom: 1px solid rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 5px 15px 1px rgba(0, 0, 0, 0.92);
  box-shadow: 0px 5px 15px 1px rgba(0, 0, 0, 0.92);
}

.form-control:focus {
  border-color: #d7526a !important;
  box-shadow: 0 0 0 0.2rem rgba(215, 82, 106, 0.5) !important;
}

.btn-login-register {
  background-color: #d7526a !important;
  color: white !important;
}

.search-border {
  border: 2px solid #d7526a;
}

.navbar-80 {
  width: 90%;
  margin: 0 auto;
}

@media screen and (max-width: 600px) and (min-width: 320px) {
  .logo-cont {
    display: none;
  }

  .dropdown {
    display: none;
  }

}
</style>