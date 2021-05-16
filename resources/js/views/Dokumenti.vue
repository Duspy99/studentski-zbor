<template>
  <div id="trenutni-saziv">

    <!-- Dokumenti heading -->
    <b-container id="dokumenti-landing" fluid>
      <div class="spacer" style="height: 30vh"></div>
      <b-container class="position-relative py-3 px-3">
        <h1 class="heading underline text-break">Dokumenti</h1>
        <h4 class="subheading">
          Pregledajte i preuzmite bitne dokumente za studente i ostale!
        </h4>
      </b-container>
    </b-container>

    <!-- Dokumenti ispis -->
    <b-container class="my-5">
      <div v-for="dokument in dokumenti" :key="dokument.id" class="my-4">
        <h1 class="mb-2">{{ dokument.naziv }}</h1>
        
          <div class="p mx-n3" v-if="dokument.opis">
            <div v-html="dokument.opis" class="ql-editor"></div>
          </div>
   
    

        <div v-for="datoteka in datoteke" :key="datoteka.id">
          <a class="text-break" v-if="datoteka.id_dokumenta == dokument.id" :href="'/dokument/download/'+datoteka.id">
            <b-icon-files class="mr-1"></b-icon-files>
            {{ datoteka.ime_datoteke.slice(datoteka.ime_datoteke.indexOf(".") + 1) }}
          </a>
        </div>
      </div>
    </b-container>

  </div>

</template>

<script>
import { BIcon, BIconFiles } from 'bootstrap-vue'

export default {
  name: "Dokumenti",

  components: {
    BIcon,
    BIconFiles
  },

  data() {
    return {
      dokumenti:[],
      datoteke:[],
    }
  },created(){

    axios.get('/api/dokumenti/prikazani-dokumenti')
      .then(response => {
        this.dokumenti = response.data;
      })
    axios.get('/api/dokumenti/prikazane-datoteke')
      .then(response => {
        this.datoteke = response.data;    
      })

    
  }
};
</script>

<style scoped>
#dokumenti-landing {
  position: relative;
  min-height: 60vh;
}

#dokumenti-landing:before {
  content: " ";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-image: url("https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
  background-repeat: no-repeat;
  background-position: top;
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

.bold {
  font-weight: 600;
}
</style>