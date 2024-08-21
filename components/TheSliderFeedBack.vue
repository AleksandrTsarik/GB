<template>
  <div class="feedback">
    <div class="feedback-info">
      <div class="feedback-info__title title">отзывы наших клиентов</div>
      <div class="feedback-info__descr">
        <div class="feedback-info__text">lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsum</div>
        <div class="feedback-info__nav">
          <button class="feedback-info-prev swiper-button-prev"></button>
          <button class="feedback-info-next swiper-button-next"></button>
        </div>
      </div>
      
    </div>
    <div class="feedback__slider">
      <swiper
          :grabCursor="true"
          :spaceBetween="20"
          :navigation="navigation"
          :breakpoints="{ 320:{ slidesPerView: 1 }, 768:{ slidesPerView: 2 }, 1023: { slidesPerView: 3 } }"
          :modules="modules"
          :loop="false"
          class="feedback-slider"
        >
          <swiper-slide v-for="(item, i) in slide" :key="i">
            <div class="feedback-slider__top">
              <div class="feedback-slider__img">
                <img :src="item.img" alt="">
              </div>
              <div class="feedback-slider__name">{{ item.name }}</div>
            </div>
            <div class="feedback-slider__mid">
              <div class="feedback-slider__text">{{ item.text }}</div>
            </div>
            <div class="feedback-slider__bottom">
              <TheSvg :type="'quote'" />
            </div>
          </swiper-slide>
        </swiper>
    </div>
  </div>
</template>

<script>
  import { ref } from 'vue';
  import { Swiper, SwiperSlide, useSwiper } from 'swiper/vue';
  import 'swiper/css';

  import 'swiper/css/free-mode';
  import 'swiper/css/navigation';
  import 'swiper/css/thumbs';
  import { FreeMode, Navigation, Mousewheel } from 'swiper/modules';

  export default {
    components: {
      Swiper,
      SwiperSlide,
      useSwiper
    },
    data() {
      return {
        slide: [],
        navigation: {
          nextEl: '.feedback-info-next',
          prevEl: '.feedback-info-prev'
        }
      }
    },
    setup() {
      const swiper = useSwiper();
      return {
        swiper,
        modules: [FreeMode, Navigation,  Mousewheel],
      };
    },

    async mounted() {
    const slides = [];
    slides.push(
      {
        id: 0,
        img: (await import("@/assets/img/feedback.jpeg")).default,
        name: 'Андрей Сапунов',
        text: 'Напишите нам, озвучьте свою идею, свои задумки, а мы постараемся воплотить их в жизнь! ',
      },
      {
        id: 1,
        img: (await import("@/assets/img/feedback.jpeg")).default,
        name: 'Андрей Сапунов',
        text: 'Напишите нам, озвучьте свою идею, свои задумки, а мы постараемся воплотить их в жизнь! ',
      },
      {
        id: 2,
        img: (await import("@/assets/img/feedback.jpeg")).default,
        name: 'Андрей Сапунов',
        text: 'Напишите нам, озвучьте свою идею, свои задумки, а мы постараемся воплотить их в жизнь! ',
      },
      {
        id: 3,
        img: (await import("@/assets/img/feedback.jpeg")).default,
        name: 'Андрей Сапунов',
        text: 'Напишите нам, озвучьте свою идею, свои задумки, а мы постараемся воплотить их в жизнь! ',
      },
      {
        id: 4,
        img: (await import("@/assets/img/feedback.jpeg")).default,
        name: 'Андрей Сапунов',
        text: 'Напишите нам, озвучьте свою идею, свои задумки, а мы постараемся воплотить их в жизнь! ',
      },
      {
        id: 5,
        img: (await import("@/assets/img/feedback.jpeg")).default,
        name: 'Андрей Сапунов',
        text: 'Напишите нам, озвучьте свою идею, свои задумки, а мы постараемся воплотить их в жизнь! ',
      }

    );
    this.slide = slides;
  },
};
</script>

<style lang="scss">
.feedback {
  display: grid;
  grid-template-columns: 0.4fr 1fr;
  gap: 20px;
  @media(max-width: 1023px) {
    grid-template-columns: 1fr;
  }
  &__slider {
    overflow: hidden;
  }
}
.feedback-slider {
  .swiper-slide {
    background-color: #0C0D1F;
  }
  &__top {
    display: flex;
    align-items: center;
    position: relative;
    &::after {
      content: '';
      display: block;
      width: calc(100% - 64px);
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      background-color: #E02D2D;
      z-index: 0;
    }
  }
  &__img {
    position: relative;
    z-index: 10;
    padding: 20px;
    img {
      width: 84px;
      height: 84px;
    }
  }
  &__mid {
    padding: 25px 25px 0;
  }
  &__bottom {
    padding: 20px 25px 25px;
  }
  &__name {
    position: relative;
    z-index: 10;
  }
}
.feedback-info {
  display: flex;
  flex-direction: column;
  &__descr {
    height: 100%;
    display: flex;
    flex-direction: column;
    @media(max-width: 1023px) {
      flex-direction: row;
      justify-content: space-between;
      height: auto;
      align-items: center;
    }
    @media(max-width: 575px) {
      flex-direction: column;
      align-items: end;
    }
  }
  &__title {
    margin-bottom: 15px;
  }
  &__text {
    @media(max-width: 1023px) {
      padding-right: 120px;
    }
    @media(max-width: 575px) {
      margin-bottom: 20px;
      padding-right: 0;
    }
  }
  &__nav {
    margin-top: auto;
    position: relative;
    height: 50px;
    
  }
}
.feedback-info-prev, .feedback-info-next {
  top: auto;
  bottom: 0;
  transform: translate(0,0);
  left: 0;
  @media(max-width: 1023px) {
    left: auto;
    right: 55px;
  }
}
.feedback-info-next  {
  left: 55px;
  @media(max-width: 1023px) {
    left: auto;
    right: 0;
  }
}
</style>