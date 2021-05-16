<template>
  <div id="header">
    <b-navbar toggleable="lg" type="dark" variant="transparent" fixed="top">
      <b-navbar-brand to="/">
        <b-img-lazy src="/images/sz-logo-crop.png" alt="Studentski zbor Sveučilišta u Mostaru logo" height="40%"></b-img-lazy>
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse" class="ml-auto"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav class="ml-auto">
          <b-nav-item
            class="text-uppercase mx-1"
            to="/"
            :active="$route.name == 'Home'"
            ><span class="text-shadow">Naslovna</span></b-nav-item
          >
          <b-nav-item
            class="text-uppercase mx-1"
            to="/novosti" 
            :active="$route.name == 'Novosti'"
            ><span class="text-shadow">Novosti</span></b-nav-item
          >
          <b-nav-item   v-if="saziv"
            class="text-uppercase mx-1"
            to="/trenutni-saziv"
            :active="$route.name == 'trenutni-saziv'"
            ><span class="text-shadow">{{saziv.naziv}}</span></b-nav-item
          >
          <b-nav-item
            class="text-uppercase mx-1"
            to="/dokumenti"
            :active="$route.name == 'Dokumenti'"
            ><span class="text-shadow">Dokumenti</span></b-nav-item
          >
           <b-nav-item
            class="text-uppercase mx-1"
            to="/arhiva"
            :active="$route.name == 'Arhiva'"
            ><span class="text-shadow">Arhiva</span></b-nav-item
          >
          <b-nav-item
            class="text-uppercase mx-1"
            to="/kontakt"
            :active="$route.name == 'Kontakt'"
            ><span class="text-shadow">Kontakt</span></b-nav-item
          >
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>


<script>
export default {
  name: "Header",
  data(){
    return{
      saziv:[]
    }
  },created(){
      axios.get('/api/sazivi/trenutni-saziv')
      .then(response => {
        this.saziv = response.data
      });
  }
};
</script>

<style scoped>
#header {
  font-weight: 600;
}

nav {
  background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0));
}

nav span {
  color: white;
}

.text-shadow {
  text-shadow: 0 0 10px #000;
}

.active {
  padding-bottom: 10px;
  border-bottom: 5px solid white;
}

@media screen and (max-width: 991px) {
  .active {
    padding-bottom: 0;
    padding-left: 20px !important;
    border-bottom: none;
    border-left: 5px solid white;
  }
}
</style>