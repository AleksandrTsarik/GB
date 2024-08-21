<template>
  <button
    :type="type"
    class="btn"
  >
    {{ label }}
    <span v-if="svg" v-html="svg"></span>
  </button>
</template>

<script>
export default {
  props: {
    label: {
      label: String,
      default: '',
      require: true
    },
    type: {
      type: String,
      dafault: ''
    },
    svg: {
      type: String,
      dafault: ''
    }
  }
}
</script>

<style lang="scss">
  .btn {
    font-size: 14px;
    font-weight: 400;
    border: solid 1px transparent;
    padding: 16px 38px;
    cursor: pointer;
    transition: 0.3s;
    display: inline-block;
    text-transform: uppercase;
    color: #fff;
    &:active {
      @media(max-width: 1023px) {
        background-color: tomato;
      }
    } 
  }
  .btn-dark {
    background-color: #E02D2D;
    color: #fff;
    border: solid 1px transparent;
    @media(min-width: 1024px) {
      &:hover {
        background-color: darken(#E02D2D, 30%);
      }
    }
  }
  .btn-light {
    border: solid 1px #E02D2D;
    color: #fff;
    background-color: #030313;
    @media(min-width: 1024px) {
      &:hover {
        background-color: darken(#E02D2D, 30%);
        border-color: darken(#E02D2D, 30%) ;
      }
    }
  }
</style>