<template>
  <div id="novost">
    <b-container  v-if="novost.path_slike" id="novost-single-landing" :style="`background-image: url('${'/storage/'+novost.path_slike}');`" fluid>
      <div class="spacer" style="height: 40vh"></div>
      <b-container class="position-relative py-3 px-3">

        <h4
          class="subheading text-wrap underline text-uppercase bold font-italic"
        >
        {{novost.vrsta}}
        </h4>
      </b-container>
    </b-container>

    <b-container id="novost-single-landing-nopic" class="bg-dark py-5" fluid v-else>
      <b-container>
        <br><br>
        <h4 class="subheading text-wrap underline text-uppercase bold font-italic position-absolute mt-1">
          {{novost.vrsta}}
        </h4>
      </b-container>
    </b-container>

    <b-container class="my-5">
      <div class="p" style="font-size: 2rem">
        <h1 style="font-size: 4rem">
         {{novost.naslov}}
        </h1>

        <h5 class="text-uppercase font-italic text-muted my-3" v-if="novost.created_at">
          Objavljeno {{ novost.created_at.split('T')[0].split('-')[2] + '.' + novost.created_at.split('T')[0].split('-')[1] + '.' + novost.created_at.split('T')[0].split('-')[0] + '.' }}
        </h5>
        
        
          <div class="h4 mx-n3">
            <div v-html="novost.sadrzaj" class="ql-editor"></div>
          </div>
         
      
      </div>

      <div v-if="galerija" id="galerija" class="mt-3 mb-5 mx-n3">

        <b-container fluid>
          <b-row class="my-3">
            <b-col xs="12" sm="6" md="4" lg="3" v-for="(src, index) in galerija" :key="index" class="pic my-3" @click="() => {showImg(index)}">
              <b-img-lazy :src="'/storage/'+src.path_slike" class="image"></b-img-lazy>
            </b-col>
          </b-row>
        </b-container>


        <vue-easy-lightbox
          :visible="visible"
          :imgs="niz"
          :index="index"
          @hide="handleHide"
        ></vue-easy-lightbox>

      </div>

        <b-link to="/novosti" class="text-dark"
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

export default {
  props:['id'],
  name: "Novost",
  data() {
    return {
        novost:[],
        galerija:[],
        novostSadrzaj:"",
        niz:[],
        visible:false,
        index:0
    };
  },created(){
     axios.get('/api/novosti/novost/'+this.$route.params.id)
     .then(response => {
       this.novost = response.data;
       });

        axios.get('/api/novosti-galerija/'+this.$route.params.id)
     .then(response => {
       this.galerija = response.data;


       for(let x of this.galerija){
         this.niz.push('/storage/'+x.path_slike)
       }
 
       });
     
  },methods: {
    showImg (index) {
      this.index = index
      this.visible = true
    },
    handleHide () {
      this.visible = false
    }
  },
};

//
</script>

<style scoped>
#novost-single-landing {
  position: relative;
  min-height: 60vh;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}

#novost-single-landing:before {
  content: " ";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-repeat: no-repeat;
  background-position: bottom;
  background-size: fill !important;
}

.subheading {
  color: #fff;
  text-shadow: 0 0 15px #000;
  font-size: 4rem;
}

.underline {
  background-image: linear-gradient(120deg, #f8a85e 0%, #c99f2d 100%);
  background-repeat: no-repeat;
  background-size: 100px 0.4em;
  background-position: 0 108%;
}

.bold {
  font-weight: 600;
}

.image {
  object-fit: cover;
  width: 100%;
  height: 300px;
}
</style>

