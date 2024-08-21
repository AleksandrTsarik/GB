<template>


    <section class="section-page content-hidden" v-if="tabs.length > 0" id="portfolio">
        <div class="container">
            <TheProtfolioBlock :tabs="tabs"/>
        </div>
    </section>

</template>

<script>
import api from "~/api/api.js";

export default {

    data() {
        return {
            tabs: []
        }
    },

    async mounted() {
        const info = await api();
        this.tabs = info.portfolio.filter(el => !el.hidden);
    }

}
</script>

<style>

</style>