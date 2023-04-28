<template>
    <div>
      <vue-header></vue-header>
      <router-view></router-view>
    </div>
  </template>

  <script>
  import VueHeader from './components/header.vue';
  import VueFooter from './components/footer.vue';

  export default {
    components: {
      VueHeader,
      VueFooter
    }
  }
  </script>
