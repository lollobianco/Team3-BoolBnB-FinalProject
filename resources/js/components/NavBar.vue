<template>
  <div class="container-fluid py-3 container-nav">
    <div class="row navbar-80">
      <div class="d-flex justify-content-between align-items-center">
        <div class="logo-cont">
          <a href="/">
            <img src="../../../public/assets/Logo.svg" alt="logo">
          </a>
        </div>
        <div class="m-auto">
          <form class="d-flex text-center" role="search">
            <input class="form-control me-2 rounded-5 search-border" type="search" placeholder="Search"
              aria-label="Search" v-model="searched_address">
            <button class="btn btn-login-register rounded-circle" onclick="return false" @keyup.enter="searchText()">
              <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
            </button>
            <router-link :to="`/advaced-search`" class="btn btn-login-register rounded-circle ms-2" type="submit">
              <font-awesome-icon icon="fa-solid fa-arrow-down-wide-short" />
            </router-link>
          </form>
        </div>
        <div class="dropdown">
          <button class="btn btn-light rounded-4 dropdown-toggle d-flex align-items-center" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <font-awesome-icon icon="fa-solid fa-bars" />
            <div class="ms-2 p-2">
              <font-awesome-icon icon="fa-solid fa-user" />
            </div>

          </button>
          <ul v-if="authUser == null" class="dropdown-menu rounded-4">
            <li><a class="dropdown-item" href="/login">Login</a></li>
            <li><a class="dropdown-item" href="/register">Register</a></li>
          </ul>
          <ul v-else class="dropdown-menu rounded-4">
            <li><a class="dropdown-item" href="/admin/apartments"><font-awesome-icon class="fa-solid mr-1"
                  icon="fa-solid fa-user-pen" /> Personal Area</a></li>
            <li><a class="dropdown-item" @click="logout(), reloadPage()"><font-awesome-icon class="fa-solid mr-1"
                  icon="fa-solid fa-right-from-bracket" /> Logout</a></li>
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
      authUser: window.authUser,
      searched_address: '',
      apartments: [],
    };
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

        })
    },
    logout() {
      axios.post('/logout').then(() => {
        window.localStorage.removeItem('token');
        this.$router.push('/');
      });
    },
    reloadPage() {
      window.location.reload();
    },

    searchText () {
      router.push({
        name: 'AdvancedSearch',
        props: {
          searched_address: this.searched_address
        }
      })
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
  box-shadow: 1px 7px 42px -4px rgba(0, 0, 0, 0.55);
  -webkit-box-shadow: 1px 7px 42px -4px rgba(0, 0, 0, 0.55);
  -moz-box-shadow: 1px 7px 42px -4px rgba(0, 0, 0, 0.55);
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
  border: 2px solid #d7526a !important;
}

.navbar-80 {
  width: 90%;
  margin: 0 auto;
}

.dropdown-menu {
  .fa-solid {
    color: #d7526a;
    font-size: 0.75rem;
  }
}

.dropdown-toggle {
  border: 2px solid #d7526a !important;
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