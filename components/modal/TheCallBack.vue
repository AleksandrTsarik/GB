<template>
    <teleport to="body">
        <div class="modal modal-callback">
            <div class="modal__overlay"></div>
            <div class="modal__wrap modal-callback__wrap">
                <form action="">
                    <div class="modal__form modal-callback__form">
                        <div class="modal__close" @click="closeModal"></div>
                        <div class="modal-callback__title t-26">Заказать проект</div>
                        <div class="modal-callback__descr t-18">Чтобы заказать проект<span>...</span></div>
                        <div class="modal-callback__contact">
                            <div class="modal-callback__phone t-22">+7 926 428 80 43</div>
                            <div class="modal-callback__network network">
                                <TheNetwork :type="'whatsapp'"/>
                                <TheNetwork :type="'telegram'"/>
                            </div>
                        </div>
                        <div class="modal-callback-order">
                            <div class="modal-callback-order__title"></div>
                            <div class="modal-callback-order__list">
                                <UITheInput :type="'text'" :placeholder="'Введите ваше имя'"
                                            v-model:value="name"
                                            class="modal-callback-order__item"/>
                                <UITheInput :type="'tel'" :placeholder="'Введите ваш телефон'"
                                            v-model:value="phone"
                                            class="modal-callback-order__item"/>
                                <UITheCheckbox
                                        :label="`Я соглашаюсь с <a href='/' >политикой обработки персональных данных</a>`"
                                        class="modal-callback-order__item"/>
                                <UITheButton :label="'обратный звонок'" class="btn-dark modal-callback-order__item"
                                             @click.prevent="send"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </teleport>
</template>

<script>
export default {
    props: {
        type: String,
        default: ''
    },
    emits: ["close"],

    data() {
        return {
            name: "",
            phone: ""
        }
    },

    methods: {
        closeModal() {
            this.$emit('close', false)
        },

        send() {
            if (!this.name || !this.phone) return;

            const formData = new FormData();
            formData.append("name", this.name);
            formData.append("phone", this.phone);

            navigator.sendBeacon("http://brothersgurylevi.ru/send.php", formData);
            alert("Заявка отправлена");
            this.closeModal();
        }
    },
}
</script>

<style lang="scss">
.modal-callback {

  &__title {
    margin-bottom: 10px;
  }

  &__descr {
    margin-bottom: 30px;
  }

  &__contact {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    @media(max-width: 374px) {
      justify-content: space-between;
    }
  }

  &__phone {
    margin-right: 30px;
    white-space: nowrap;
    @media(max-width: 374px) {
      margin-right: 0;
    }
  }

  &__network {
    display: flex;
    align-items: center;

    a {
      @media(max-width: 767px) {
        width: 30px;
        height: 30px;
        margin-right: 0;
      }

      a + a {
        margin-left: 10px;
      }
    }
  }

  &__wrap {
    max-width: 660px;
    width: 100%;
    @media(max-width: 767px) {
      max-width: 90%;
      margin: 0 auto;
    }
    @media(max-width: 374px) {
      max-width: 99%;
    }
  }
}

.modal-callback-order {
  &__list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px 40px;
    @media(max-width: 767px) {
      grid-template-columns: 1fr;
    }

    .default-checkbox__text {
      color: #DBDBDB;
      font-size: 13px;

      a {
        color: #DBDBDB;
        border-bottom: solid 1px;
      }
    }

    button {
      a {
        color: red;
      }
    }
  }

  &__item {
    &:nth-child(1) {
      @media(max-width: 767px) {
        order: 1;
      }
    }

    &:nth-child(2) {
      @media(max-width: 767px) {
        order: 2;
      }

    }

    &:nth-child(3) {
      @media(max-width: 767px) {
        order: 4;
      }
    }

    &:nth-child(4) {
      @media(max-width: 767px) {
        order: 3;
      }
    }
  }
}
</style>