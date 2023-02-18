<template>
  <div>
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
      <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="#"><img src="../../../public/assets/Logo.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic"
          aria-controls="navbarBasic" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="">
          <form class="d-flex justify-content-center">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
        <div class="collapse navbar-collapse show" id="navbarBasic">
          <ul class="navbar-nav mb-2 mb-xl-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "NavBar"
}
</script>

<style></style>