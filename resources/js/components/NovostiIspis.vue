<template>
  <div id="novostiispis">
    <b-container>
      <b-row class="py-4">
        <b-col
          lg="3"
          md="4"
          v-for="novost in novosti.data"
          :key="novost.id"
          class="my-2"
        >
          <NovostItem
            :picture="novost.path_slike"
            :title="novost.naslov"
            :category="novost.vrsta"
            :created_at="novost.created_at.split('T')[0].split('-')[2] + '.' + novost.created_at.split('T')[0].split('-')[1] + '.' + novost.created_at.split('T')[0].split('-')[0] + '.'"
            :path="`/novosti/novost/${novost.id}`"
          />
        </b-col>
      </b-row>

      <pagination class="pagination" :data="novosti" @pagination-change-page="getResults" :limit="-1" :show-disabled="true" show align="center" size="large">
        <span slot="prev-nav">&lt;</span>
        <span slot="next-nav">&gt;</span>
      </pagination>

      <div v-if="loaded">
        <p v-if="novosti.data.length" class="text-center lead">{{ novosti.current_page + " / " + novosti.last_page }}</p>
      </div>
    </b-container>
  
    
  </div>
  
</template>

<script>
import NovostItem from "../components/NovostItem.vue";

export default {
  name: "NovostiIspis",
  components: {
    NovostItem,
  },
  data() {
    return {
      novosti: {},
      loaded: false,
    };
  },

  methods:{

    getResults(page = 1) {
      axios.get('/api/pagNovosti?page=' + page)
      .then(response => {
        this.novosti = response.data;
        this.loaded = true;
        });
    },    
  },
  mounted(){
    
    this.getResults();
  },
};
</script>

<style scoped>
.bold {
  font-weight: 600;
}
</style>