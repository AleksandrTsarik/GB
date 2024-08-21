<template>
  <Swiper
    class="slider-swiper"
    :modules="modules"
    :loop="options.loop"
    :navigation="options.navigation"
    :slidesPerView="options.slidesPerView"
    :slidesPerGroup="options.slidesPerGroup"
    :centeredSlides="options.centeredSlides"
    :spaceBetween="options.spaceBetween"
    :pagination="options.pagination"
    :breakpoints="options.breakpoints"
    :effect="options.effect"
    :mousewheel="options.mousewheel"
    :autoHeight="options.autoHeight"
  >
    <SwiperSlide
      v-for="(slide, i) in slider"
      :key="i"></SwiperSlide>
    <SwiperControls />
  </Swiper>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';

import 'swiper/css/effect-coverflow';
import 'swiper/css/effect-fade';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

import { Pagination, Navigation, Mousewheel, EffectCoverflow, EffectFade } from 'swiper/modules';
export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    slider: {type: Array, default: [], require: false},
    options: {type: Object, default: {}, require: false}
  },
  mounted() {
    console.log(this.options)
  },
  setup() {
      return {
        modules: [ Pagination, Navigation, Mousewheel, EffectCoverflow, EffectFade]
      };
    },
}

</script>

<style lang="scss">

</style>