<script setup>
import { ref, inject } from "vue";
import { data, fn, icons } from "../data";
import Toggle from "./parts/Toggle.vue";

const quickToggles = {
  generals: [
    {
      title: "Disable Emojis",
      helpUrl: "#",
      helpText: "Disable Emojis",
    },
    {
      title: "Disable Dashicons",
      helpUrl: "#",
      helpText: "Disable Dashicons",
    },
    {
      title: "Disable Embeds",
      helpUrl: "#",
      helpText: "Disable Embeds",
    },
    {
      title: "Disable XML-RPC",
      helpUrl: "#",
      helpText: "Disable XML-RPC",
    },
    {
      title: "Remove jQuery Migrate",
      helpUrl: "#",
      helpText: "Remove jQuery Migrate",
    },
    {
      title: "Hide WP Version",
      helpUrl: "#",
      helpText: "Hide WP Version",
    },
    {
      title: "Disable Comments",
      helpUrl: "#",
      helpText: "Disable Comments",
    },
    {
      title: "Disable REST API",
      helpUrl: "#",
      helpText: "Disable REST API",
    },
  ],
  medias: [
    {
      title: "Disable Thumbnail",
      helpUrl: "#",
      helpText: "Disable Thumbnail",
    },
    {
      title: "Disable Medium",
      helpUrl: "#",
      helpText: "Disable Medium",
    },
    {
      title: "Disable Large",
      helpUrl: "#",
      helpText: "Disable Large",
    },
  ],
};

const toggleAll = (action, feature) => {
  if ("active" == action) {
    data.quickToggles[feature] = data.quickToggles[feature].map((item) => {
      item.value = true;
      return item;
    });
  } else {
    data.quickToggles[feature] = data.quickToggles[feature].map((item) => {
      item.value = false;
      return item;
    });
  }

  updateToggle();
};

const updateToggle = () => {
  const res = fn.fetchAdminAjax(optimator.admin_ajax, "post", {
    action: "quick_toggle_update",
    generals: data.quickToggles.generals,
    medias: data.quickToggles.medias,
    nonce: optimator.nonce,
  });

  res.then((response) => {
    console.log(response);
    ElNotification({
      title: "Success",
      message: "This is a success message",
      type: "success",
      offset: 50,
    });
  });
};
</script>
<template>
  <div class="quick-toggle-wrap">
    <div class="feature-wrap">
      <div class="feature-header">
        <el-text class="mx-1" tag="p" size="large">{{
          __("General", "optimator")
        }}</el-text>
        <el-divider />
        <div class="btn-wrap">
          <el-button @click="toggleAll('active', 'generals')" type="success">{{
            __("Active All", "optimator")
          }}</el-button>
          <el-button @click="toggleAll('deactive', 'generals')" type="danger">{{
            __("Deactive All", "optimator")
          }}</el-button>
        </div>
      </div>
      <div class="feature-content">
        <div class="grid">
          <div
            v-for="(general, index) in data.quickToggles.generals"
            :key="index"
            class="grid-item"
          >
            <Toggle
              @update-toggle="updateToggle()"
              :content="quickToggles.generals[index]"
              :toggle="general"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="feature-wrap">
      <div class="feature-header">
        <el-text class="mx-1" tag="p" size="large">{{
          __("Media", "optimator")
        }}</el-text>
        <el-divider />
        <div class="btn-wrap">
          <el-button @click="toggleAll('active', 'medias')" type="success">{{
            __("Active All", "optimator")
          }}</el-button>
          <el-button @click="toggleAll('deactive', 'medias')" type="danger">{{
            __("Deactive All", "optimator")
          }}</el-button>
        </div>
      </div>
      <div class="feature-content">
        <div class="grid">
          <div
            v-for="(media, index) in data.quickToggles.medias"
            :key="index"
            class="grid-item"
          >
            <Toggle :content="quickToggles.medias[index]" :toggle="media" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
@import "../scss/_variables";
@import "../scss/_mixins";
.feature-wrap {
  &:not(:first-child) {
    margin-top: 50px;
  }
  .feature-header {
    @include flex();
    margin-bottom: 30px;
    .btn-wrap {
      @include flex();
    }
  }
  .feature-content {
    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-auto-rows: 100px;
      gap: 40px;

      .grid-item {
        @include card();
        padding: 20px;
      }
    }
  }
}
</style>