<template>
    <main>
        <section class="section-page content-hidden">
            <div class="container">
                <div class="preview">
                    <div class="preview-video">
                        <div class="preview-video__iframe iframe">
                            <!-- <iframe :src="mainVideo"
                                    v-if="mainVideo"
                                    frameborder="0" allow="fullscreen" id="widget2" title="SHOWREEL V2"></iframe> -->
                            <iframe src="https://vk.com/video_ext.php?oid=-22822305&id=456241864&hd=2&js_api=1" width="100%" height="100%" allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0" allowfullscreen></iframe>
                            <div class="preview-video__descr">
                                <div class="preview-video__text">качественный видеопродакшн для твоих смелых идей</div>
                                <div class="preview-video__btn">
                                    <UITheButton :label="'Заказать видео'" class="btn-dark"
                                                 @click="modalCallBack = true"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="preview__btn">
                        <UITheButton :label="'Заказать видео'" class="btn-dark" @click="modalCallBack = true"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-page content-hidden" v-if="tabs.length > 0">
            <div class="container">
                <TheProtfolioBlock :tabs="tabs"/>
            </div>
        </section>

        <section class="section-page content-hidden" v-if="steps.length > 0">
            <div class="container">
                <TheWork :tabs="steps"/>
            </div>
        </section>

        <!--        <section class="section-page content-hidden">-->
        <!--            <div class="container">-->
        <!--                <TheFeedBack/>-->
        <!--            </div>-->
        <!--        </section>-->

        <the-call-back v-if="modalCallBack" @close="closeModal"/>
    </main>
</template>

<script>
import TheCallBack from '~/components/modal/TheCallBack.vue'
import api from "~/api/api.js";

export default {
    components: {TheCallBack},
    data() {
        return {
            modalCallBack: false,
            mainVideo: "",
            tabs: [],
            steps: []
        }
    },
    methods: {
        closeModal() {
            this.modalCallBack = false
        },
    },

    async mounted() {
        const info = await api();
        this.mainVideo = info.mainVideo;
        this.tabs = info.tabs.filter(el => !el.hidden);
        this.steps = info.steps;
    }

}
</script>

<style lang="scss">
.preview {
  &__btn {
    display: none;
    @media(max-width: 767px) {
      display: block;
      width: 100%;
      button {
        width: 100%;
      }
    }
  }
}

.preview-video {
  @media(max-width: 1023px) {
    margin: 0 -15px;
  }

  &__iframe {
    padding-bottom: 60%;
  }

  &__descr {
    position: absolute;
    z-index: 50;
    bottom: 70px;
    left: 0;
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    justify-content: space-between;
    align-items: end;
    width: 100%;
    @media(max-width: 767px) {
      grid-template-columns: 1fr;
      bottom: 30px;
    }
  }

  &__text {
    font-family: 'zing-rust', 'Arial', 'sans-serif';
    font-size: 58px;
    line-height: 100%;
    color: #fff;
    padding-left: 200px;
    @media(max-width: 1273px) {
      padding-left: 40px;
    }
    @media(max-width: 767px) {
      font-size: 36px;
      padding: 0 15px;
    }
  }

  &__btn {
    margin-left: auto;
    padding-right: 150px;
    @media(max-width: 1273px) {
      padding-right: 40px;
    }
    @media(max-width: 767px) {
      position: absolute;
      left: 0;
      right: 0;
      display: none;
    }
  }
}
</style>