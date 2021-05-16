<template>
<div id="Kategorije">
    <b-container id="novosti-landing" fluid>
      <div class="spacer" style="height: 30vh"></div>
      <b-container class="position-relative py-3 px-3">
        <h1 class="heading underline">Novosti</h1>
        <h4 class="subheading text-wrap">
          Kategorija: {{ routeParam }}
        </h4>
      </b-container>
    </b-container>

    <b-container>
      <b-row class="justify-content-md-center mt-2">
        <b-col md="4" lg="2" class="my-2" v-for="(category,index) of categories" :key="index">
          <router-link :to="`/novosti/${category}`" class="text-decoration-none">
            <b-button
            block
            squared
            :disabled="routeParam == category ? true : false"
            size="lg"
            variant="outline-secondary"
            :class="`${($route.params.id == category) ? 'active' : ''} text-uppercase`">
            {{category}}
          </b-button>
          </router-link>
        </b-col>
        <!-- @click="addCategory" -->
      </b-row>
    </b-container>

    <KategorijaIspis />

    <b-container class="py-5">
        <b-link to="/novosti/" class="text-dark mx-n2"
        ><h5 class="d-inline">
            <img
            src="/images/left-arrow.png"
            alt="Back"
            height="32px"
            style="margin-bottom: 5px"
            />
            <span class="bold ml-1">Natrag na novosti</span>
        </h5></b-link>
    </b-container>
</div>
</template>



<script>
import KategorijaIspis from "../components/KategorijaIspis.vue";

export default {
    name:"Kategorije",

    components: {
        KategorijaIspis,
    },
    data() {
        return {
            routeParam: undefined,
            categories: ['službeno','sport','zabava','edukacija','kultura','ostalo']
        }
    },
    watch:{
        $route(){
        let routeParamStr = this.$route.params.id;
        this.routeParam = routeParamStr.charAt(0).toUpperCase() + routeParamStr.slice(1);;
        }
    },
  mounted(){

      let routeParamStr = this.$route.params.id;

        this.routeParam = routeParamStr.charAt(0).toUpperCase() + routeParamStr.slice(1);;
  },
}
</script>

<style scoped>
#novosti-landing {
  position: relative;
  min-height: 60vh;
}

#novosti-landing:before {
  content: " ";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-image: url("https://images.pexels.com/photos/6335/man-coffee-cup-pen.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}

.heading {
  font-size: 5rem;
  font-weight: 600;
  color: #fff;
}

@media only screen and (max-width: 768px) {
  .heading {
    font-size: 3rem;
  }
}

.subheading {
  color: #fff;
  text-shadow: 0 0 15px #000;
}

.underline {
  background-image: linear-gradient(120deg, #f8a85e 0%, #c99f2d 100%);
  background-repeat: no-repeat;
  background-size: 180px 0.2em;
  background-position: 0 88%;
}

.active {
    cursor: default !important;
}

</style>