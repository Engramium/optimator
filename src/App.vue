<script setup>
import { data, fn, icons } from "./data";
import Header from "./components/parts/Header.vue";
import Footer from "./components/parts/Footer.vue";
import Welcome from "./components/Welcome.vue";
import QuickToggle from "./components/QuickToggle.vue";
import Optimize from "./components/Optimize.vue";


const getQuickToggles = () => {
  const loading = ElLoading.service({
    fullscreen: true,
    lock: true,
    text: "Loading",
    background: "rgba(0, 0, 0, 0.7)",
  });

  const res = fn.fetchAdminAjax(optimator.admin_ajax, "get", {
    action: "optimator_get_quick_toggles",
    nonce: optimator.nonce,
  });

  res.then((response) => {
    if (response.status) {
      data.quickToggles = response.data;
    }
    loading.close();
  });
};

getQuickToggles();
</script>

<template>
  <div class="optimator-layout" :class="data.currentTab">
    <Header></Header>
    <div class="optimator-content">
      <div class="content">
        <Welcome v-if="data.currentTab == 'welcome'" />
        <slot v-if="data.currentTab == 'quick-toggle'">
          <QuickToggle v-if="data.quickToggles != null" />
        </slot>
        <!-- <Optimize v-if="data.currentTab == 'optimize'" /> -->
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>

<style scoped lang="scss">
@import "./scss/_variables";
@import "./scss/_mixins";

.optimator-layout {
  @include flex(column, space-between, center);
  height: 100%;
  gap: 60px;
}

.optimator-header,
.optimator-footer,
.optimator-content {
  width: 100%;
}

.optimator-content {
  .content {
    padding: 0 20px;
  }
}
</style>
