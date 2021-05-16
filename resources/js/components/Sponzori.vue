<template>
  <div v-if="sponzori[0]" id="sponzori">
    <b-container fluid class="text-center bg-light border-top">
      <div
        class="d-flex justify-content-around flex-wrap p-3 align-content-around"
       
      >
      <div v-for="sponzor in sponzori" :key="sponzor.id">
         <div class="sponzor m-1 p-4">
          <b-img class="image" :src="'/storage/'+sponzor.path_slike" :alt="sponzor.naziv"></b-img>
        </div>
      </div>
       
      </div>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "Sponzori",
  data(){
    return{
      sponzori:[],
    }
  },created(){
     axios.get('/api/sponzori').then(response => {
       this.sponzori = response.data;
       });
  }
};
</script>

<style>
.sponzor {
  box-sizing: border-box;
  height: auto;
  border: 2px solid black;
}
.image {
  height: 100px;
  width: 200px;
}
</style>