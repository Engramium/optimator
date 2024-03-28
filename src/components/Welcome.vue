<script setup>
import { Right, StarFilled } from "@element-plus/icons-vue";
</script>
<template>
  <div class="welcome-wrap">
    <div class="grid">
      <div class="grid-item">
        <el-text style="align-self: flex-start" tag="h2" size="large">{{
          __("Introducing Optimator", "optimator")
        }}</el-text>
        <el-text tag="p">
          {{
            __(
              "Fast-loading websites improves the user experience, increases the website views, and can even help with WordPress SEO. Introducing Optimator, the most useful WordPress speed optimization plugin to boost WordPress performance and speed up your website.",
              "optimator"
            )
          }}
        </el-text>
        <iframe
          width="100%"
          height="380"
          src="https://www.youtube-nocookie.com/embed/Lp1IjxLUmbk?showinfo=0&autoplay=1&mute=1&rel=0&privacy=1"
          allow="autoplay"
          title="YouTube video player"
          frameborder="0"
          allowfullscreen
        ></iframe>
        <div class="btn-group">
          <el-button
            tag="a"
            href="https://engramium.com/optimator/"
            target="_blank"
            size="large"
            type="success"
            >{{ __("About Optimator", "optimator") }}</el-button
          >
          <el-button
            tag="a"
            href="https://engramium.com/"
            target="_blank"
            size="large"
            >{{ __("Visit Our Website", "optimator") }}</el-button
          >
        </div>
      </div>
      <div class="grid-item">
        <el-text style="align-self: flex-start" tag="h2" size="large">{{
          __("Join the Community", "optimator")
        }}</el-text>
        <el-text tag="p" style="align-self: flex-start">
          {{
            __(
              "Do you have a question about the plugin or what to share about your feedback? Join our growing community!",
              "optimator"
            )
          }}
        </el-text>
        <el-link
          tag="a"
          href="https://www.facebook.com/groups/engramium/"
          target="_blank"
          size="large"
          type="success"
        >
          {{ __("Join Now", "optimator")
          }}<el-icon class="el-icon--right"><Right /></el-icon>
        </el-link>
      </div>
      <div class="grid-item">
        <el-text style="align-self: flex-start" tag="h2" size="large">{{
          __("Knowledge Base", "optimator")
        }}</el-text>
        <el-text style="align-self: flex-start" tag="p">
          {{
            __(
              "Watch our Optimator Basic & Fundamental Video tutorials and more.",
              "optimator"
            )
          }}
        </el-text>
        <el-link
          tag="a"
          href="https://www.youtube.com/engramium"
          target="_blank"
          size="large"
          type="success"
        >
          {{ __("Watch Now", "optimator")
          }}<el-icon class="el-icon--right"><Right /></el-icon>
        </el-link>
      </div>
      <div class="grid-item">
        <el-text style="align-self: flex-start" tag="h2" size="large"
          >{{ __("Enjoyed Optimator?", "optimator") }}
        </el-text>
        <el-text style="align-self: flex-start" tag="p">
          {{
            __(
              "We love to hear from you, we would appreciate every single review.",
              "optimator"
            )
          }}
        </el-text>
        <el-link
          tag="a"
          href="https://wordpress.org/support/plugin/optimator/reviews/?filter=5"
          target="_blank"
          size="large"
          type="success"
        >
          {{ __("Rate Us Here", "optimator") }}
          <el-icon class="el-icon--right"><StarFilled /></el-icon>
          <el-icon><StarFilled /></el-icon>
          <el-icon><StarFilled /></el-icon>
          <el-icon><StarFilled /></el-icon>
          <el-icon><StarFilled /></el-icon>
        </el-link>
      </div>
      <div class="grid-item">
        <div class="quick-toggle">
          <el-switch disabled size="large" />
          <h2>
            <el-text size="large">{{
              __("Quick Toggle", "optimator")
            }}</el-text>
          </h2>
        </div>
        <p>
          <el-text>{{
            __(
              "Many of the Optimator's options can be applied by simply toggling them on.",
              "optimator"
            )
          }}</el-text>
        </p>
      </div>
      <div class="grid-item">
        <h2>
          <el-text size="large">{{
            __("Coming Soon...", "optimator")
          }}</el-text>
        </h2>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
@import "../scss/_variables";
@import "../scss/_mixins";
a {
  text-decoration: none;
}
.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: 200px;
  gap: 40px;

  .grid-item {
    @include card();
    padding: 30px;
    gap: 30px;

    &:nth-child(1) {
      grid-row: span 3;
    }

    .quick-toggle {
      @include flex();
      gap: 30px;
    }
  }
}
</style>