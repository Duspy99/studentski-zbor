<template>
  <div id="app">
   
    <Header v-if="$route.name != 'ErrPage'" />

     <router-view />

    <Sponzori v-if="$route.name != 'ErrPage'"  />

    <Footer v-if="$route.name != 'ErrPage'"  />
   
  </div>
</template>

<script>
import Vue from "vue";
import  {BootstrapVue}  from "bootstrap-vue";
import Header from "./Header"
import Footer from "./Footer"
import Sponzori from "./Sponzori"

Vue.use(BootstrapVue);

export default {
  name: "App",

  metaInfo: {
    title: 'Studentski zbor - Sveučilište u Mostaru',
    meta: [
      { charset: 'utf-8' },
      { name: 'description', content: 'Dobrodošli na stranicu Studentskog zbora Sveučilišta u Mostaru. Pronađite najnovije novosti iz sporta, kulture, zabave i slično. Pregledajte trenutni saziv, preuzmite dokumente, kontaktirajte nas i puno više!' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' }
    ]
  },

  components: {
    Header, Footer, Sponzori
  }
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,400;0,600;0,800;1,200;1,400;1,600;1,800&display=swap");

#app {
  font-family: Raleway, sans-serif;
  font-weight: 400;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.accent-color {
  color: #0c4776;
}

.accent-color-bg {
  background-color: #0c4776 !important;
}
</style>