<template>
  <div class="item" >
    <div v-if="card.video" class="item__iframe iframe">
      <a :href="card.video" data-fancybox="FancyBoxGallery"></a>
      <iframe :src="card.video" frameborder="0"></iframe>
    </div>
    <div v-else-if="card.img" class="item__img" >
      <a :href="card.img" data-fancybox="FancyBoxGallery">
        <img :src="card.img" alt="...">
      </a>
    </div>
  </div>
</template>

<script>
export default {
props: {
  card: {
    type: Object,
    default: {}
  }
},
}
</script>

<style lang="scss">
.item {
  &__iframe {
    position: relative;
    a {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      display: block;
      z-index: 1;
    }
  }
}
</style>