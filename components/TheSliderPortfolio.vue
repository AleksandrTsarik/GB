<template>
    <div class="portfolio__slider">
        <swiper
                :grabCursor="true"
                :spaceBetween="20"
                :slidesPerView="1"
                :navigation="true"
                :autoHeight="true"
                :modules="modules"
                :loop="false"
                class="protfolio-slider"
        >
            <swiper-slide v-for="(item, i) in slides" :key="i">
                <div class="protfolio-slider__wrap">
                    <div v-if="item.video" class="protfolio-slider__video iframe">
                        <iframe :src="item.video" frameborder="0"></iframe>
                    </div>
                    <div v-if="item.img" class="protfolio-slider__img">
                        <img :src="item.img" alt="...">
                    </div>
                    <div class="protfolio-slider__description protfolio-slider-description">
                        <div class="protfolio-slider-description__head">
                            <div class="protfolio-slider__name-case t-26">{{ item.title }}</div>
                        </div>
                        <div class="protfolio-slider-description__body">
                            <div class="protfolio-slider-description__item">
                                <div class="protfolio-slider-description__row">
                                    <div class="protfolio-slider-description__title t-22">Клиент:</div>
                                    <div class="protfolio-slider-description__name t-18">{{ item.customer }}</div>
                                </div>
                                <div class="protfolio-slider-description__row">
                                    <div class="protfolio-slider-description__title t-22">Задача:</div>
                                    <div class="protfolio-slider-description__name t-18">{{ item.task }}</div>
                                </div>
                            </div>
                            <div class="protfolio-slider-description__item">
                                <div class="protfolio-slider-description__text t-18">{{ item.description }}</div>
                            </div>
                        </div>
                        <div class="protfolio-slider-description__footer">
                            <div class="protfolio-slider-description__link">
                                <button class="btn btn-light" @click.prevent="$emit('modal')">хочу также</button>
                                <button class="btn btn-dark" @click.prevent="$emit('modal')">записаться</button>
                            </div>
                        </div>

                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import {ref} from 'vue';
import {Swiper, SwiperSlide, useSwiper} from 'swiper/vue';
import 'swiper/css';

import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';
import {FreeMode, Navigation, Mousewheel} from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
        useSwiper
    },

    props: {
        slides: {
            type: Array,
            default: () => []
        }
    },

    setup() {
        const swiper = useSwiper();
        return {
            swiper,
            modules: [FreeMode, Navigation, Mousewheel],
        };
    },

};
</script>

<style lang="scss">
.protfolio-slider {
  &__wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    @media(max-width: 1273px) {
      grid-template-columns: 1fr;
    }
    @media(max-width: 575px) {
      gap: 10px;
      margin-bottom: 50px;
    }
  }

  &__video {
    padding-bottom: 65%;
    height: 100%;
  }

  &__img {
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

  }

  .swiper-button-prev, .swiper-button-next {
    top: auto;
    bottom: 0;
    left: auto;
    right: 0;
  }

  .swiper-button-prev {
    right: 55px;
  }
}

.protfolio-slider-description {
  display: flex;
  flex-direction: column;

  &__head {
    margin-bottom: 40px;
    @media(max-width: 575px) {
      margin-bottom: 10px;
    }
  }

  &__body {
    display: grid;
    grid-template-columns: 0.3fr 1fr;
    gap: 90px;
    margin-bottom: 20px;
    @media(max-width: 575px) {
      grid-template-columns: 1fr;
      gap: 20px;
      margin-bottom: 30px;
    }
  }

  &__row {
    margin-bottom: 25px;
    @media(max-width: 575px) {
      margin-bottom: 10px;
    }
  }

  &__title {
    color: #E02D2D;
    margin-bottom: 5px;
  }

  &__name {
  }

  &__footer {
    margin-top: auto;

    a {
      margin-right: 25px;
      @media(max-width: 575px) {
        display: block;
        width: 100%;
        text-align: center;
        margin-bottom: 10px
      }
    }
  }
}
</style>