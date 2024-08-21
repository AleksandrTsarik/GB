<template>
    <div class="tabs">
        <ol class="tabs__header">
            <li
                    v-for="(tab, i) in tabs"
                    :key="i"
                    class="tab"
                    :class="{ active: tab.value == activeTab }"
                    @click="activeTab = tab.value"
            >
                {{ tab.title }}
                <span class="tab-arrow"><TheSvg :type="'arrow'"/></span>
            </li>
        </ol>
        <div class="tabs__content">
            <slot name="content" :active="activeTab"/>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue'

const props = defineProps({
    tabs: {type: Array, default: [], require: true}
})
const activeTab = ref(props.tabs[0].value)

function nextTab() {
    const i = props.tabs.findIndex(el => el.value === activeTab.value);
    const nextTab = i < (props.tabs.length - 1) ? props.tabs[i + 1] : props.tabs[0];
    activeTab.value = nextTab.value;
}

defineExpose({
    nextTab
});
</script>

<style lang="scss">
.tab {
  cursor: pointer;

  &.active {
  }

}

.tabs {

}
</style>