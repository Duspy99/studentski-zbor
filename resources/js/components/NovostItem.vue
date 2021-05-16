<template>
  <div id="item">
    <div v-if="picture">
        <b-link :to="path" class="text-decoration-none">
          <img :src="'/storage/'+picture" :alt="title + ' slika'" class="novost-item-image" />
        </b-link>
    </div>
    <div v-else>
        <b-link :to="path" class="text-decoration-none">
          <img :src="'/images/404-illustration.svg'" :alt="title + ' slika'" class="novost-item-image" />
        </b-link>
    </div>
   
    <div class="text-center text-md-left d-md-flex justify-content-between mt-1">
      <div class="p item-description accent-color bold font-italic text-uppercase">
        {{ category }}
      </div>
      <div class="p item-description accent-color bold font-italic align-right text-uppercase">
        Objavljeno {{ created_at }}
      </div>
    </div>
    <b-link :to="path" class="text-center text-md-left text-decoration-none">
      <h4 class="text-dark font-weight-bold">{{ title }}</h4>
    </b-link>
  </div>
</template>

<script>
export default {
  name: "NovostItem",
  props: ["picture", "title", "category", "created_at", "path"],
};
</script>

<style scoped>
.novost-item-image {
  min-height: 250px;
  max-height: 250px;
  width: 100%;
  object-fit: cover;
}

@media screen and (max-width: 1200px) {
  .item-description {
    font-size: 0.7rem;
  }
}

@media screen and (max-width: 768px) {
  .item-description {
    font-size: 0.9rem;
  }
}
</style>