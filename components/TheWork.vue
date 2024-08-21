<template>
    <div class="work-tab">
        <UITheTabs :tabs="tabs" ref="tabs">
            <slot/>
            <template v-slot:content="{ active }">
                <template v-for="(tab, i) in tabs" :key="i">
                    <template v-if="active === tab.value">
                        <div class="work-tab__content">
                            <div class="work-tab__title t-26">{{ i + 1 }}. {{ tab.title }}</div>
                            <div class="work-tab__body">
                                <div class="work-tab__text t-22">{{ tab.description }}</div>
                                <div class="work-tab__contact">
                                    <div class="work-tab__contact-block">
                                        <div class="work-tab__network network">
                                            <TheNetwork :type="'telegram'"/>
                                            <TheNetwork :type="'whatsapp'"/>
                                        </div>
                                        <div class="work-tab__phone t-18"> +7 926 253 44 65</div>
                                    </div>
                                    <div class="work-tab__more">
                                        <UITheButton :label="'ДАЛЕЕ'" class="btn-light" @click="nextTab"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </template>
                </template>
            </template>
        </UITheTabs>
    </div>
</template>

<script>
export default {
    props: {
        tabs: {
            type: Array,
            default: () => []
        }
    },

    data() {
        return {
            active: '',
        }
    },

    methods: {
        nextTab() {
            this.$refs.tabs.nextTab();
        }
    },

}
</script>

<style lang="scss">
.work-tab {
  &__title {
    margin-bottom: 20px;
  }

  &__body {

    display: grid;
    grid-template-columns: 1.3fr 1fr;
    gap: 70px;
    justify-content: space-between;
    position: relative;
    @media(max-width: 1273px) {
      grid-template-columns: 1fr;
      gap: 55px;
    }
    @media(max-width: 575px) {
      gap: 30px;
    }
  }

  &__text {
  }

  &__contact {
    @media(max-width: 1273px) {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
    }
    @media(max-width: 575px) {
      flex-direction: column;
    }
  }

  &__network {
    display: flex;
    margin-bottom: 20px;
  }

  &__more {
    margin-top: 50px;
    justify-content: flex-end;
    @media(max-width: 1273px) {
      margin-top: 0;
    }
    @media(max-width: 575px) {
      margin-top: 25px;
    }

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

  .tab {
    position: relative;
    font-size: 18px;
    text-align: center;

    &.active {
      &:before {
        color: #E02D2D;
      }
    }
  }

  .tabs {
    display: grid;
    grid-template-columns: 725px 1fr;
    gap: 50px;
    align-items: start;
    @media(max-width: 1273px) {
      grid-template-columns: 1fr;
    }

    &__header {
      display: grid;
      align-items: center;
      grid-template-columns: repeat(6, 1fr);
      counter-reset: num;
      position: relative;
      @media(max-width: 1273px) {
        margin-bottom: 50px;
      }
      @media(max-width: 767px) {
        grid-template-columns: repeat(3, 1fr);
        margin: 0 -15px -10px;
      }

      &::before {
        content: '';
        position: absolute;
        display: block;
        right: 0;
        left: 8%;
        top: -25px;
        width: 83%;
        height: 1px;
        background-color: #FFFFFF;
        @media(max-width: 1273px) {
          width: 83%;
        }
        @media(max-width: 767px) {
          left: 17%;
        }
      }

      &::after {
        content: '';
        display: block;
        position: absolute;
        right: 34px;
        top: -35px;
        width: 20px;
        height: 20px;
        background-color: #030313;
        @media(max-width: 767px) {
          width: 83%;
          height: 1px;
          background-color: #FFFFFF;
          top: auto;
          right: auto;
          left: 0;
          bottom: 60%;
        }
      }

      li {
        position: relative;
        counter-increment: num;
        display: flex;
        flex-direction: column;
        @media(max-width: 767px) {
          margin-bottom: 50px;
        }

        &::before {
          content: "0." counter(num);
          font-family: 'zing-rust', 'Arial', 'sans-serif';
          font-size: 44px;
          line-height: 100%;
          text-align: center;
        }

        &::after {
          content: '';
          display: block;
          background-color: #E02D2D;
          width: 15px;
          height: 15px;
          display: block;
          position: absolute;
          top: -32px;
          left: 50%;
          transform: translateX(-50%);
          z-index: 10;
        }
      }
    }

    &__content {
      background-color: #0C0D1F;
      padding: 35px 45px;
      margin-top: -50px;
      @media(max-width: 767px) {
        padding: 35px 30px;
      }
    }
  }
}
</style>