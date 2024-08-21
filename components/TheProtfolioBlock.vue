<template>
    <div class="portfolio">
        <div class="portfolio__title title">Портфолио</div>
        <div class="protfolio-tab">
            <UITheTabs :tabs="tabs">
                <slot/>
                <template v-slot:content="{ active }">
                    <template v-for="tab in tabs">
                        <template v-if="tab.value === active">
                            <TheSliderPortfolio v-if="tab.type === 'slider'" :slides="tab.items"
                                                @modal="modalCallBack = true"/>
                            <Fancybox :options="optionsFancyBox" class="portfolio-list item__list" v-else>
                                <ThePortfolioItem v-for="(card, i) in tab.items" :key="i" :card="card"/>
                            </Fancybox>
                        </template>
                    </template>
                    <!--                    <template v-if="active == 'Обзоры'">-->
                    <!--                        <div class="view">-->
                    <!--                            <Fancybox :options="optionsFancyBox" class="portfolio-list item__list">-->
                    <!--                                <ThePortfolioItem v-for="(card, i) in card" :key="i" :card="card"/>-->
                    <!--                            </Fancybox>-->
                    <!--                            <div class="view__btn">-->
                    <!--                                <UITheButton :label="'смотреть еще'" class="btn-light"/>-->
                    <!--                            </div>-->
                    <!--                        </div>-->

                    <!--                    </template>-->
                </template>
            </UITheTabs>
        </div>

        <the-call-back v-if="modalCallBack" @close="closeModal"/>
    </div>

</template>

<script>
import Fancybox from '@/components/UI/FancyBoxGallery.vue'
import TheCallBack from "~/components/modal/TheCallBack.vue";

export default {
    components: {
        TheCallBack,
        Fancybox
    },

    props: {
        tabs: {
            type: Array,
            default: () => []
        }
    },

    data() {
        return {
            modalCallBack: false,
        }
    },

    methods: {
        closeModal() {
            this.modalCallBack = false
        }
    },

    setup() {
        return {
            optionsFancyBox: {
                Carousel: {
                    infinite: true,
                }
            },
        };
    },
}
</script>

<style lang="scss">
.protfolio-tab {
  .tab {
    font-size: 26px;
    color: #DBDBDB;
    @media(max-width: 767px) {
      margin-right: 15px;
    }

    &.active {
      color: #E02D2D;
    }
  }

  .tabs {

    &__header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: solid 1px #7A7A7A;
      padding-bottom: 10px;
      max-width: 80%;
      margin-left: auto;
      margin-top: -50px;
      @media(max-width: 1350px) {
        max-width: 70%;
      }
      @media(max-width: 1023px) {
        max-width: 100%;
        margin-top: 0;
        margin-top: 20px;
      }
      @media(max-width: 767px) {
        flex-wrap: wrap;
        justify-content: flex-start;
      }
    }

    &__content {
      margin-top: 50px;
    }
  }
}

.portfolio-list {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
  @media(max-width: 1023px) {
    grid-template-columns: repeat(2, 1fr)
  }
  @media(max-width: 767px) {
    grid-template-columns: 1fr;
  }

  .iframe {
    padding-bottom: auto;
    height: 100%;
  }
}

.view {
  &__btn {
    margin: 30px auto 0;
    display: flex;
    justify-content: center;

    button {
      position: relative;
      display: flex;
      align-items: center;

      &::after {
        content: '';
        display: block;
        width: 7px;
        height: 7px;
        border-right: solid 2px #E02D2D;
        border-bottom: solid 2px #E02D2D;
        transform: rotate(-45deg);
        margin-left: 10px
      }
    }
  }
}
</style>