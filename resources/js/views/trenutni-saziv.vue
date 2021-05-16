<template >
  <div id="trenutni-saziv" v-if="trenutni_saziv">

    <!-- Xxi saziv heading -->
    <b-container id="dokumenti-landing" fluid>
      <div class="spacer" style="height: 30vh"></div>
      <b-container class="position-relative py-3 px-3">
        <h1 class="heading underline text-break">{{ trenutni_saziv.naziv }}</h1>
        <h4 class="subheading">Pregledajte najnoviji saziv!</h4>
      </b-container>
    </b-container>

    <b-container class="my-5 text-center text-md-left" v-if="stavke">
      <b-row>
        <b-col cols="12" lg="7" xl="8" class="my-3">
          <div v-for="stavka in stavke" :key="stavka.id">
            <h2 class="text-uppercase mt-3">{{stavka.naziv}}</h2>
              <h5 class="font-italic" v-if="stavka.sadrzaj">{{stavka.sadrzaj}}</h5>
              <div v-for="datoteka in datoteke" :key="datoteka.id">
                <div v-if="stavka.id == datoteka.id_stavke_saziva">
                  <a :href="'/file/download/'+datoteka.id" class="text-break">
                    <b-icon-files class="mr-1"></b-icon-files>
                    {{ datoteka.ime_datoteke.slice(datoteka.ime_datoteke.indexOf(".") + 1) }}</a>
                </div>
              </div>
          </div>
        </b-col>

        <b-col cols="12" lg="5" xl="4" class="my-3">
          <div v-if="clanovi[0]">
            <h2 class="mb-2 mt-3 text-uppercase">Predsjedništvo saziva</h2>
            <div v-for="(clan, i) in clanovi" :key="i">
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
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import { BIcon, BIconFiles, BIconTelephone, BIconEnvelope, BIconPerson } from 'bootstrap-vue'

export default {
  name: "trenutni-saziv",

  components: {
    BIcon,
    BIconFiles,
    BIconTelephone,
    BIconEnvelope,
    BIconPerson
  },

  data() {
    return {
      trenutni_saziv:[],
      stavke:[],
      opisi:[],
      datoteke:[],
      clanovi:[]
    };
  },
  
  mounted(){
    
     axios.get('/api/sazivi/trenutni-saziv')
      .then(response => {
        this.trenutni_saziv = response.data
        axios.get('/api/sazivi/'+this.trenutni_saziv.id+'/stavke')
              .then(response => {
                this.stavke = response.data

                axios.get('/api/sazivi/'+this.trenutni_saziv.id+'/stavke/'+this.trenutni_saziv.id+'/sveDatoteke')
                .then(response => {
                  this.datoteke = response.data
                });
              }).catch(error => {
                this.$router.push({ path: '/404' });
            });
          axios.get('/api/sazivi/'+this.trenutni_saziv.id+'/clanovi').then(response => {
          this.clanovi = response.data
    })
      })
  },
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
  background-image: url("https://images.pexels.com/photos/48148/document-agreement-documents-sign-48148.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
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