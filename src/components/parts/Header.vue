<script setup>
import { data, fn, icons } from "../../data";
import Help from "./Help.vue";
</script>
<template>
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
            :class="
              data.currentTab == 'welcome' ? 'menu-item active' : 'menu-item'
            "
            @click="
              data.currentTab = 'welcome';
              fn.setCurrentTab('welcome');
            "
            size="large"
          >
            {{ __("Welcome", "optimator") }}
          </el-text>
          <el-text
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
          >
            {{ __("Quick Toggle", "optimator") }}
          </el-text>
          <!-- <el-text
              :class="
                data.currentTab == 'optimize' ? 'menu-item active' : 'menu-item'
              "
              @click="
                data.currentTab = 'optimize';
                fn.setCurrentTab('optimize');
              "
              size="large"
            >
              {{ __("Optimize", "optimator") }}
            </el-text> -->
        </div>
        <div class="actions">
          <!-- <el-link type="primary">{{ __("Upgrade", "optimator") }}</el-link> -->
          <Help />
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped lang='scss'>
@import "../../scss/_variables";
@import "../../scss/_mixins";

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
        width: 144px !important;
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
</style>