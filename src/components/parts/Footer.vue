<script setup>
import { data, fn, icons } from "../../data";
import { StarFilled } from "@element-plus/icons-vue";
</script>
<template>
  <div class="optimator-footer">
    <div class="footer">
      <div class="footer-rating-wrap">
        <span>{{ __("If you like optimator, Leave ", "optimator") }}</span>
        <a
          href="https://wordpress.org/support/plugin/optimator/reviews/?filter=5"
          target="_blank"
          rel="noopener noreferrer"
        >
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
          <el-link
            href="https://engramium.com/about"
            target="_blank"
            type="primary"
            >{{ __("About", "optimator") }}</el-link
          >
          <el-link
            href="https://engramium.com/docs/"
            target="_blank"
            type="primary"
            >{{ __("Documentation", "optimator") }}</el-link
          >
          <el-link
            href="https://engramium.com/contact/"
            target="_blank"
            type="primary"
            >{{ __("Contact", "optimator") }}</el-link
          >
        </div>
        <div class="footer-socials">
          <a
            class="icon"
            href="https://www.facebook.com/Engramium/"
            target="_blank"
            rel="noopener noreferrer"
            v-html="icons.facebook"
          ></a>
          <a
            class="icon"
            href="https://www.youtube.com/c/Engramium"
            target="_blank"
            rel="noopener noreferrer"
            v-html="icons.youtube"
          ></a>
          <a
            class="icon"
            href="https://twitter.com/engramium"
            target="_blank"
            rel="noopener noreferrer"
            v-html="icons.x"
          ></a>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped lang='scss'>
@import "../../scss/_variables";
@import "../../scss/_mixins";
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