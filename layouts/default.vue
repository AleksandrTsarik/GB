<template>
    <div class="page-wrap">
        <header class="header">
            <div class="container">
                <div class="header__wrap header-desktop">
                    <div class="header__item">
                        <NuxtLink to="/" class="header__logo"><img src="@/assets/img/logo.svg" alt="svg">
                            <TheSvg :type="'name'" class="header-logo__mobile"/>
                        </NuxtLink>
                    </div>
                    <div class="header__item">
                        <nav class="header-menu">
                            <ul>
                                <li v-for="(item, i) in menu" :key="i">
                                    <NuxtLink @click="handleClick" :to="item.url">{{ item.name }}</NuxtLink>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__item">
                        <div class="header__btn">
                            <UITheButton :label="'оставить заявку'" class="btn-light" @click="modalCallBack = true"/>
                        </div>
                    </div>
                </div>
                <div class="header__wrap header-mobile">
                    <div class="header__item">
                        <NuxtLink to="/" class="header__logo"><img src="@/assets/img/logo.svg" alt="svg">
                            <TheSvg :type="'name'" class="header-logo__mobile"/>
                        </NuxtLink>
                    </div>
                    <div class="header__item">
                        <div class="header__burger" @click="openMenu" :class="{'is-open' : isOpenMenu}">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="header-menu__drop" :class="{'is-open' : isOpenMenu}">
                            <nav class="header-menu__mobile">
                                <ul>
                                    <li v-for="(item, i) in menu" :key="i">
                                        <NuxtLink :to="item.url">{{ item.name }}</NuxtLink>
                                    </li>
                                </ul>
                            </nav>
                            <div class="header-menu__network network">
                                <TheNetwork :type="'whatsapp'"/>
                                <TheNetwork :type="'telegram'"/>
                            </div>
                            <div class="header__btn">
                                <UITheButton :label="'оставить заявку'" class="btn-light"
                                             @click="modalCallBack = true"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </header>

        <slot/>

        <footer class="footer" ref="targetRef">
            <div class="container">
                <div class="footer__title title">контакты</div>
                <div class="footer-contact">
                    <div
                            v-for="(item, i) in contact"
                            :key="i"
                            class="footer-contact__item"
                    >
                        <div class="footer-contact__title t-18">{{ item.name }}</div>
                        <div class="footer-contact__text t-22">{{ item.text }}</div>
                    </div>
                    <div class="footer-contact__btn">
                        <UITheButton :label="'Заказать видео'" class="btn-dark" @click="modalCallBack = true"/>
                    </div>
                </div>
                <div class="footer-video" v-if="video">
                    <div class="footer-video__iframe iframe">
                        <iframe :src="video" frameborder="0" allow="fullscreen" id="widget2"
                                title="SHOWREEL V2"></iframe>
                    </div>
                </div>
                <div class="footer-menu">
                    <div class="footer-menu__item">2024 Все права защищены</div>
                    <div class="footer-menu__item">
                        <ul class="footer-menu__menu">
                            <li v-for="(item,i) in menu" :key="i">
                                <a :href="item.anchor" v-if="item.url === url">{{ item.name }}</a>
                                <NuxtLink :to="item.url" v-else>{{ item.name }}</NuxtLink>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-menu__item">Политика конфиденциальности</div>
                </div>
            </div>
            <the-call-back v-if="modalCallBack" @close="closeModal"/>
        </footer>
    </div>
</template>

<script>
import TheCallBack from '~/components/modal/TheCallBack.vue'
import api from "~/api/api.js";

export default {
    components: {TheCallBack},
    data() {
        return {
            video: "",
            isOpenMenu: false,
            ref: null,
            modalCallBack: false,
            contact: [
                {
                    name: 'Телефон:',
                    text: '+7 926 428 80 43'
                },
                {
                    name: 'Email:',
                    text: 'brothersgurylevi@gmail.com'
                },
                {
                    name: 'Время работы:',
                    text: 'Пн-вс 09:00 - 18:00'
                },
            ],
            menu: [
                {
                    name: 'ПОРТФОЛИО',
                    url: '/portfolio',
                    anchor: "#portfolio"
                },
                {
                    name: 'О НАС',
                    url: '/about',
                    anchor: "#about"
                },
                {
                    name: 'КОНТАКТЫ',
                    url: '#footer',
                    anchor: "#contacts"
                },
            ]
        }
    },

    async mounted() {
        const info = await api();
        this.video = info.videoBottom;
    },

    methods: {
        openMenu() {
            if (!this.isOpenMenu) document.body.classList.add('menu-open')
            else document.body.classList.remove('menu-open')
            this.isOpenMenu = !this.isOpenMenu
        },
        closeModal() {
            this.modalCallBack = false;
        },
        handleClick() {
            this.$refs.targetRef.scrollIntoView({behavior: 'smooth'});
        }
    },

    computed: {
        url() {
            const route = useRoute();
            return route.path;
        }
    }
}
</script>

<style lang="scss">
.header {
  position: relative;

  &__logo {
    display: flex;
    align-items: center;

    img {
      max-block-size: 50px;
    }
  }

  &__wrap {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    justify-content: space-between;
    align-items: center;
    padding: 30px 0;
    @media(max-width: 1023px) {
      grid-template-columns: 50px 1fr auto;
      justify-content: space-between;
      gap: 10%;
    }
    @media(max-width: 767px) {
      gap: 10px;
      padding: 10px 0;
    }
  }

  &__item {
    position: relative;

    &:first-child {

    }

    &:nth-child(2) {
      @media(max-width: 1023px) {

      }
    }

    &:last-child {
      margin-left: auto;
      white-space: nowrap;
    }

  }

  &__btn {
    @media(max-width: 767px) {
      margin-top: auto;
      width: 100%;
      button {
        width: 100%;
      }
    }
  }

  &__burger {
    width: 50px;
    height: 25px;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;

    span {
      display: block;
      height: 2px;
      width: 100%;
      background-color: #D9D9D9;
      transition: 0.3s;
    }

    &.is-open {
      span {
        position: absolute;
        left: 0;
        top: 50%;

        &:nth-child(1) {
          transform: translateY(-50%) rotate(45deg);
        }

        &:nth-child(3) {
          transform: translateY(-50%) rotate(-45deg);
        }

        &:nth-child(2) {
          opacity: 0;
          height: 0;
          visibility: visible;
        }
      }
    }
  }
}

.header-logo {
  &__mobile {
    @media(max-width: 1023px) {
      display: none;
    }
  }
}

.header-menu {
  ul {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  li {
    padding: 0 5px;
    white-space: nowrap;

    a {
      font-size: 18px;
      line-height: 24px;
      color: #fff;
      font-weight: 400;
      text-transform: uppercase;
      position: relative;
      transition: 0.3s;
      display: block;

      &:hover {
        color: #E02D2D;
      }

      &:after {
        display: block;
        content: "";
        background-color: #E02D2D;
        height: 1px;
        width: 0%;
        transition: 0.3s;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
      }

      &:hover:after, &:hover:before {
        width: 100%;
      }

    }
  }

  &__drop {
    opacity: 0;
    height: 0;
    visibility: visible;
    transition: 0.3s;
    position: fixed;
    right: 0;
    left: 0;
    bottom: 0;
    top: 75px;
    background-color: #030313;
    z-index: 9999;
    transform: translateX(150%);
    display: flex;
    flex-direction: column;

    a {
      color: #D9D9D9;
    }

    li {
      margin-bottom: 10px;
    }

    &.is-open {
      height: auto;
      opacity: 1;
      visibility: visible;
      padding: 25px;
      transform: translateX(0);
    }
  }

  &__network {
    display: flex;
    align-items: center;
    margin-top: 20px;

  }
}

.header-mobile {
  display: none;
  @media(max-width: 767px) {
    display: grid;
  }
}

.header-desktop {
  @media(max-width: 767px) {
    display: none;
  }
}

.footer {
  &__title {
    margin-bottom: 40px;
  }
}

.footer-contact {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  @media(max-width: 1023px) {
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }
  @media(max-width: 767px) {
    grid-template-columns: 1fr;
    gap: 15px;
  }

  &__btn {
    margin-left: auto;
    @media(max-width: 1023px) {
      margin-left: 0;
    }
    @media(max-width: 575px) {
      display: block;
      button {
        width: 100%;
      }
    }
  }

  &__title {
    margin-bottom: 5px;
  }

}

.footer-video {
  margin: 20px 0;
  @media(max-width: 1023px) {
    margin: 20px -15px;
  }

  &__iframe {
    padding-bottom: 60%;
  }
}

.footer-menu {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  align-items: center;
  margin-bottom: 40px;
  @media(max-width: 1023px) {
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr;
  }

  &__item {
    font-size: 14px;
    color: #DBDBDB;

    &:nth-child(1) {
      @media(max-width: 1023px) {
        order: 2;
        margin-left: auto;
      }
    }

    &:nth-child(2) {
      @media(max-width: 1023px) {
        order: 1;
        margin-bottom: 20px;
      }
    }

    &:last-child {
      margin-left: auto;
      @media(max-width: 1023px) {
        order: 3;
      }
    }
  }

  &__menu {
    display: flex;
    align-items: center;
    justify-content: space-between;

    a {
      font-size: 18px;
      line-height: 18px;
      color: #DBDBDB;
      text-transform: uppercase;
      position: relative;
      transition: 0.3s;
      display: block;

      &:hover {
        color: #E02D2D;
      }

      &:after {
        display: block;
        content: "";
        background-color: #E02D2D;
        height: 1px;
        width: 0%;
        transition: 0.3s;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
      }

      &:hover:after, &:hover:before {
        width: 100%;
      }

    }
  }
}
</style>