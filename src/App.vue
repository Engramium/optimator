<script setup>
import { ref, reactive } from "vue";
import Welcome from "./components/Welcome.vue";
import QuickToggle from "./components/QuickToggle.vue";
import Optimize from "./components/Optimize.vue";
import { QuestionFilled } from "@element-plus/icons-vue";

const tab = ref("welcome");
</script>
<template>
  <div class="common-layout">
    <el-container>
      <el-header>
        <div class="menu-bar">
          <div class="logo-wrap">
            <img
              :src="optimator.plugin_url + 'public/logo/main-logo.svg'"
              alt="Optimator Main Logo"
            />
            <!-- <p>v{{ optimator.plugin_version }}</p> -->
            <el-tag :type="'danger'" effect="plain" round>
              v1.0.0
            </el-tag>
          </div>
          <div class="menu-wrap">
            <div class="tabs">
              <el-text
                class="mx-1"
                :class="tab == 'welcome' ? 'menu-item active' : 'menu-item'"
                @click="tab = 'welcome'"
                size="large"
                >{{ __("Welcome", "optimator") }}</el-text
              >
              <el-text
                class="mx-1"
                :class="
                  tab == 'quick-toggle' ? 'menu-item active' : 'menu-item'
                "
                @click="tab = 'quick-toggle'"
                size="large"
                >{{ __("Quick Toggle", "optimator") }}</el-text
              >
              <el-text
                class="mx-1"
                :class="tab == 'optimize' ? 'menu-item active' : 'menu-item'"
                @click="tab = 'optimize'"
                size="large"
                >{{ __("Optimize", "optimator") }}</el-text
              >
            </div>
            <div class="actions">
              <el-link type="primary">Upgrade</el-link>
              <a class="help pointer"
                ><el-icon :size="20" color="#777777"><QuestionFilled /></el-icon
              ></a>
            </div>
          </div></div
      ></el-header>
      <el-main>
        <div class="content">
          <Welcome v-if="tab == 'welcome'" />
          <QuickToggle v-if="tab == 'quick-toggle'" />
          <Optimize v-if="tab == 'optimize'" />
        </div>
      </el-main>
      <el-footer>
        <div class="footer">Footer</div>
      </el-footer>
    </el-container>
  </div>
</template>
<style scoped lang="scss">
.el-header,
.el-footer {
  width: 100%;
}

.el-header {
  padding: unset;
}
</style>
