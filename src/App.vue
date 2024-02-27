<script setup>
import { ref, reactive, onBeforeMount } from "vue";
import { data, fn, icons } from "./data";
import Welcome from "./components/Welcome.vue";
import QuickToggle from "./components/QuickToggle.vue";
import Optimize from "./components/Optimize.vue";
import { StarFilled } from "@element-plus/icons-vue";
import Help from "./components/parts/Help.vue";

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
    <div class="optimator-header">
      <div class="menu-bar">
        <div class="logo-wrap">
          <img
            :src="optimator.plugin_url + 'public/logo/main-logo.svg'"
            alt="Optimator Main Logo"
          />
          <el-tag :type="'success'" effect="plain" round
            >v{{ optimator.plugin_version }}</el-tag
          >
        </div>
        <div class="menu-wrap">
          <div class="tabs">
            <el-text
              class="mx-1"
              :class="
                data.currentTab == 'welcome' ? 'menu-item active' : 'menu-item'
              "
              @click="
                data.currentTab = 'welcome';
                fn.setCurrentTab('welcome');
              "
              size="large"
              >{{ __("Welcome", "optimator") }}</el-text
            >
            <el-text
              class="mx-1"
              :class="
                data.currentTab == 'quick-toggle'
                  ? 'menu-item active'
                  : 'menu-item'
              "
              @click="
                data.currentTab = 'quick-toggle';
                fn.setCurrentTab('quick-toggle');
              "
              size="large"
              >{{ __("Quick Toggle", "optimator") }}</el-text
            >
            <el-text
              class="mx-1"
              :class="
                data.currentTab == 'optimize' ? 'menu-item active' : 'menu-item'
              "
              @click="
                data.currentTab = 'optimize';
                fn.setCurrentTab('optimize');
              "
              size="large"
              >{{ __("Optimize", "optimator") }}</el-text
            >
          </div>
          <div class="actions">
            <el-link type="primary">{{ __("Upgrade", "optimator") }}</el-link>
            <Help />
          </div>
        </div>
      </div>
    </div>
    <div class="optimator-content">
      <div class="content">
        <Welcome v-if="data.currentTab == 'welcome'" />
        <slot v-if="data.currentTab == 'quick-toggle'" >
          <QuickToggle v-if="data.quickToggles != null" />
        </slot>
        <Optimize v-if="data.currentTab == 'optimize'" />
      </div>
    </div>
    <div class="optimator-footer">
      <div class="footer">
        <div class="footer-rating-wrap">
          <span>{{ __("If you like optimator, Leave ", "optimator") }}</span>
          <a href="http://" target="_blank" rel="noopener noreferrer">
            <el-icon><StarFilled /></el-icon>
            <el-icon><StarFilled /></el-icon>
            <el-icon><StarFilled /> </el-icon>
            <el-icon><StarFilled /></el-icon>
            <el-icon><StarFilled /></el-icon>
            {{ __(" rating", "optimator") }}
          </a>
        </div>
        <el-divider />
        <div class="footer-menu-wrap">
          <div class="footer-menu">
            <el-link href="#" target="_blank" type="primary">{{
              __("About", "optimator")
            }}</el-link>
            <el-link href="#" target="_blank" type="primary">{{
              __("Documentation", "optimator")
            }}</el-link>
            <el-link href="#" target="_blank" type="primary">{{
              __("Content", "optimator")
            }}</el-link>
          </div>
          <div class="footer-socials">
            <a
              class="icon"
              href="http://"
              target="_blank"
              rel="noopener noreferrer"
              v-html="icons.facebook"
            ></a>
            <a
              class="icon"
              href="http://"
              target="_blank"
              rel="noopener noreferrer"
              v-html="icons.youtube"
            ></a>
            <a
              class="icon"
              href="http://"
              target="_blank"
              rel="noopener noreferrer"
              v-html="icons.x"
            ></a>
          </div>
        </div>
      </div>
    </div>
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

.optimator-header {
  .menu-bar {
    background-color: #ffffff;
    @include flex();
    padding: 0 30px;
    gap: 30px;
    box-shadow: $box_shadow;

    .logo-wrap {
      @include flex(row, flex-start);
      width: 20%;
      gap: 15px;

      img {
        width: 144px;
      }

      p {
        background-color: #f4e1de;
        border-radius: 25px;
        border: 1px solid #d2ada7;
        padding: 5px 20px;
        font-weight: bold;
      }
    }

    .menu-wrap {
      @include flex(row, space-between);
      width: 80%;

      .tabs {
        @include flex();
        gap: 30px;

        .menu-item {
          padding: 30px 0;
          cursor: pointer;

          border-bottom: 2px solid transparent;

          &:hover {
            border-bottom: 2px solid gray;
          }

          &.active {
            color: #67c23a;
            border-bottom: 2px solid #67c23a;
          }
        }
      }

      .actions {
        @include flex();
        gap: 30px;
      }
    }
  }
}

.optimator-content {
  .content {
    padding: 0 20px;
  }
}

.optimator-footer {
  background: #fff;
  box-shadow: $box_shadow;

  .footer {
    @include flex(column);
    padding: 20px 30px;
    .footer-menu-wrap {
      @include flex();
      gap: 30px;

      .footer-menu {
        @include flex();
        gap: 30px;
      }

      .footer-socials {
        @include flex();
        gap: 30px;
      }
    }
  }

  .el-divider {
    margin: 10px 0;
  }
}
</style>
