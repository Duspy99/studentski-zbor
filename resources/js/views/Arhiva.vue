<template>
  <div id="arhiva">

    <!-- Arhiva heading -->
    <b-container id="dokumenti-landing" fluid>
      <div class="spacer" style="height: 30vh"></div>
      <b-container class="position-relative py-3 px-3">
        <h1 class="heading underline text-break">Arhiva</h1>
        <h4 class="subheading">Ovdje možete pregledati prethodne sazive!</h4>
      </b-container>
    </b-container>

    <b-container class="my-5" v-if="sazivi">
      <div role="navigation" class="my-3">
        <b-row id="nav-mobile" style="display: none;">
          <b-col cols="12" class="my-2" v-for="saziv of sazivi" :key="saziv.id">
            <b-button
            variant="outline-secondary"
            :class="saziv.visible ? 'btn-active' : 'btn-inactive' "
            @click="saziv.visible = !saziv.visible"
            block
            squared
            >{{saziv.naziv}}</b-button>
          </b-col>
        </b-row>
      
        <b-nav pills justified id="nav-desktop">
          <b-nav-item v-for="saziv of sazivi" :key="saziv.id"
            :active="saziv.visible"
            @click="saziv.visible = !saziv.visible"
            class="mx-2 arhiva-item"
            ><span :class="saziv.visible ? 'text-light' : 'text-dark'">{{saziv.naziv}}</span></b-nav-item
          >
        </b-nav>
        
      </div>
      </b-container>

      <br />

    <b-container class="my-5 text-center text-md-left" v-if="sazivi">
      <div v-for="(saziv, index) of sazivi" :key="index">
        <div v-if="saziv.visible == true">
          <h1 class="mb-2 mt-5 text-uppercase">{{saziv.naziv}}</h1>
          <div v-for="(stavka, i) of filterStavke(saziv.id)" :key="'a'+i">
                <h3 class="mt-3 mb-2 text-uppercase">{{stavka.naziv}}</h3>
              <h5 class="font-italic">{{stavka.sadrzaj}}</h5>
              <div v-for="(datoteka, i) of datoteke" :key="'b'+i">
                    <a class="mx-n1 text-break" v-if="datoteka.id_stavke_saziva == stavka.id" :href="'/file/download/'+datoteka.id">
                      <b-icon-files class="mr-1"></b-icon-files>
                      {{ datoteka.ime_datoteke.slice(datoteka.ime_datoteke.indexOf(".") + 1) }}
                    </a>
              </div>
          </div>
          
          <h1 class="mb-3 mt-4 text-uppercase text-break responsive-text">PREDSJEDNIŠTVO {{saziv.naziv}}A</h1>
          <div v-for="(clan, i) of filterClanovi(saziv.id)" :key="'c'+i">
            
                <p class="font-weight-bold">{{clan.ime}}</p>
                <p v-if="clan.opis" class="font-italic mt-n2">
                <b-icon-person class="mr-1"></b-icon-person>
                {{clan.opis}}</p>
                <p v-if="clan.email" class="mt-n2">
                <b-icon-envelope class="mr-1"></b-icon-envelope>
                {{clan.email}}</p>
                <p v-if="clan.telefon" class="mt-n2 mb-3 ">
                <b-icon-telephone class="mr-1"></b-icon-telephone>
                {{clan.telefon}}</p>
            
          </div>
        </div>
      </div>
    </b-container>

  </div>
</template>



<script>
import { BIcon, BIconFiles, BIconTelephone, BIconEnvelope, BIconPerson } from 'bootstrap-vue'

export default {
  name: "Arhiva",

  components: {
    BIcon,
    BIconFiles,
    BIconTelephone,
    BIconEnvelope,
    BIconPerson
  },

  data() {
    return {
      sazivi:[],
      stavke:[],
      datoteke:[],
      clanovi:[],
    };
  },

  methods: {
    displayThis: function () {
      let buttonId = this.id;

      console.log(buttonId);
    },
    filterStavke: function (sazivId) {
      return this.stavke.filter(stavka => stavka && stavka.id_saziva == sazivId)  
      },
    filterClanovi: function (sazivId) {
      return this.clanovi.filter(clan => clan && clan.id_saziva == sazivId)  
      },
  },mounted(){

    axios.get('api/sazivi').then(response => {
      this.sazivi = response.data
      for(let x of this.sazivi){
        Object.assign(x, {visible: true});
      }
      this.sazivi =JSON.parse(JSON.stringify(this.sazivi))
    })
    axios.get('api/sazivi/clanovi').then(response => {
      this.clanovi = response.data
    })

    axios.get('api/sazivi/stavke').then(response => {
      this.stavke = response.data
    })

    axios.get('api/sazivi/stavke/datoteke').then(response => {
      this.datoteke = response.data
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
  background-image: url("https://images.pexels.com/photos/6344231/pexels-photo-6344231.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
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
  border-radius: 0;
  background-color: #353535 !important;
  color: white;
}

.btn-active {
  background-color: #353535 !important;
  color: white;
}

.btn-active:focus {
  background-color: #353535;
  box-shadow: 0 0 5px rgba(0,0,0,0.5);
}

.btn-inactive:focus {
  background-color: transparent;
  color: #353535;
  box-shadow: 0 0 5px rgba(0,0,0,0.5);
}

.btn-active:active {
  background-color: #353535;
  box-shadow: 0 0 5px rgba(0,0,0,0.5);
}

.btn-inactive:active {
  background-color: transparent;
  color: #353535;
  box-shadow: 0 0 5px rgba(0,0,0,0.5);
}

.arhiva-item {
  border: 1px solid #353535;
}

@media screen and (max-width: 575px) {
  #nav-desktop {
    display: none;
  }

  #nav-mobile {
    display: block !important;
  }

  .responsive-text {
    font-size: 1.8rem;
  }
}
</style>