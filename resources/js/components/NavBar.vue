<template>
  <div class="container-fluid py-4 border-bottom border-secondary ">
      <div class="row navbar-80">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo-cont">
              <img src="../../../public/assets/Logo.svg" alt="logo">
            </div>
            <div>
              <form class="d-flex text-center" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit"><font-awesome-icon icon="fa-solid fa-magnifying-glass" /></button>
              </form>
            </div>
            <div class="dropdown">
            <button class="btn btn-light  dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <font-awesome-icon icon="fa-solid fa-bars" />
              <div class="ms-2 p-2">
                <font-awesome-icon icon="fa-solid fa-user" />
              </div>
              
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Login</a></li>
              <li><a class="dropdown-item" href="#">Register</a></li>
            </ul>
            </div>
        </div>

      </div>
  </div>
</template>

<script>
export default {
  name: "NavBar"
}
</script>

<style scoped lang="scss">
  
  .logo-cont{
    img{
      width: 150px;
    }
  }

  .navbar-80{
    width: 90%;
    margin: 0 auto;
  }

  @media screen and (max-width: 600px) and (min-width: 320px)  {
    .logo-cont{
      display: none;
    }
    .dropdown{
      display: none;
    }
    
  }

</style>