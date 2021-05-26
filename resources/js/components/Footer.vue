<template>
  <div id="footer">
    <b-container fluid class="bg-dark pt-5 pb-1 text-light text-center">
      <b-container>
        <b-row align-h="between">
          <b-col lg="5" class="mt-1 mb-3 text-lg-left">
            <h2 class="text-uppercase"><b>Studentski Zbor</b></h2>
            <div class="d-inline-flex">
              <a href="https://www.facebook.com/studentskizbor/" target="_blank" rel="noopener noreferrer">
                <b-icon-facebook alt="Facebook" class="mr-4 h2"></b-icon-facebook>
              </a>
              <a href="https://www.instagram.com/studentskizborsum/" target="_blank" rel="noopener noreferrer">
                <b-icon-instagram alt="Instagram" class="mr-4 h2"></b-icon-instagram>
              </a>
              <a href="#footer" target="_blank" rel="noopener noreferrer">
                <b-icon-youtube alt="YouTube" class="mr-4 h2"></b-icon-youtube>
              </a>
              <a href="#footer" target="_blank" rel="noopener noreferrer">
                <b-icon-linkedin alt="LinkedIn" class="mr-4 h2"></b-icon-linkedin>
              </a>
            </div>
          </b-col>

          <b-col lg="5 text-lg-left">
            <b-row>
              <b-col md="6" class="my-md-2 mt-4">
                
                <div class="mb-2">
                  <b-link to="/"><b>NASLOVNA</b></b-link>
                </div>
                <div class="mb-2">
                  <b-link to="/novosti"><b>NOVOSTI</b></b-link>
                </div>
                <div class="mb-2">
                  <b-link to="/trenutni-saziv" class="text-uppercase"><b>{{saziv.naziv}}</b></b-link>
                </div>

              </b-col>

              <b-col md="6" class="my-md-2">
                
                <div class="mb-2">
                  <b-link to="/arhiva"><b>ARHIVA</b></b-link>
                </div>
                <div class="mb-2">
                  <b-link to="/dokumenti"><b>DOKUMENTI</b></b-link>
                </div>
                <div class="mb-2">
                  <b-link to="/kontakt"><b>KONTAKT</b></b-link>
                </div>
              </b-col>

              


              
              <b-col md="2" class="my-2">
                
              </b-col>
            </b-row>
          </b-col>
        </b-row>

        <div class="switch-logo text-center">
          <b-img-lazy src="/images/switch-logo-white.svg" height="85px"></b-img-lazy>
        </div>

        <p class="small text-muted text-center mt-4">
          Studentski Zbor 2021 © Sva prava pridržana
        </p>
      </b-container>
    </b-container>
  </div>
</template>

<script>
import { BIcon, BIconFacebook, BIconInstagram, BIconYoutube, BIconLinkedin } from 'bootstrap-vue'

export default {
  name: "Footer",
   data(){
    return{
      saziv:[]
    }
  },
  
  components: {
    BIcon,
    BIconFacebook,
    BIconInstagram,
    BIconYoutube,
    BIconLinkedin
  },
  
  created(){
      axios.get('/api/sazivi/trenutni-saziv')
      .then(response => {
        this.saziv = response.data
      });
  }
};
</script>

<style scoped>
a {
  color: #fff;
  text-decoration: none;
}

a:hover {
  color: #fff;
  text-decoration: none;
}
</style>


