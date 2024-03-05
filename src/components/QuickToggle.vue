<script setup>
import { ref, inject } from "vue";
import { data, fn, icons } from "../data";
import Toggle from "./parts/Toggle.vue";

const quickToggles = {
  generals: {
    disable_emojis: {
      title: "Disable Emojis",
      helpUrl: "#",
      helpText: "Disable Emojis",
    },
    disable_embeds: {
      title: "Disable Embeds",
      helpUrl: "#",
      helpText: "Disable Embeds",
    },
    disable_dashicons: {
      title: "Disable Dashicons",
      helpUrl: "#",
      helpText: "Disable Dashicons",
    },
    disable_xml_rpc: {
      title: "Disable XML-RPC",
      helpUrl: "#",
      helpText: "Disable XML-RPC",
    },
    remove_jquery_migrate: {
      title: "Remove jQuery Migrate",
      helpUrl: "#",
      helpText: "Remove jQuery Migrate",
    },
    hide_wp_version: {
      title: "Hide WP Version",
      helpUrl: "#",
      helpText: "Hide WP Version",
    },
    remove_wlwmanifest_link: {
      title: "Remove wlwmanifest link",
      helpUrl: "#",
      helpText: "Remove wlwmanifest link",
    },
    remove_rsd_link: {
      title: "Remove RSD link",
      helpUrl: "#",
      helpText: "Remove RSD link",
    },
    remove_shortlink: {
      title: "Remove Shortlink",
      helpUrl: "#",
      helpText: "Remove Shortlink",
    },
    disable_rss_feeds: {
      title: "Disable RSS feeds",
      helpUrl: "#",
      helpText: "Disable RSS feeds",
    },
    remove_rss_feed_links: {
      title: "Remove RSS feed links",
      helpUrl: "#",
      helpText: "Remove RSS feed links",
    },
    disable_self_pingbacks: {
      title: "Disable self pingbacks",
      helpUrl: "#",
      helpText: "Disable self pingbacks",
    },
    disable_rest_api: {
      title: "Disable REST API",
      helpUrl: "#",
      helpText: "Disable REST API",
      options: {
        default: "Default (Enabled)",
        disable_for_non_admins: "Disable for Non-Admins",
        disable_when_logged_out: "Disable when logged out",
      },
    },
    remove_rest_api_links: {
      title: "Remove REST API links",
      helpUrl: "#",
      helpText: "Remove REST API links",
    },
    disable_google_maps: {
      title: "Disable Google Maps",
      helpUrl: "#",
      helpText: "Disable Google Maps",
    },
    disable_password_strength_meter: {
      title: "Disable password strength meter",
      helpUrl: "#",
      helpText: "Disable password strength meter",
    },
    disable_comments: {
      title: "Disable Comments",
      helpUrl: "#",
      helpText: "Disable Comments",
    },
    disable_comments_url: {
      title: "Disable Comments URL",
      helpUrl: "#",
      helpText: "Disable Comments URL",
    },
    add_blank_favicon: {
      title: "Add blank favicon",
      helpUrl: "#",
      helpText: "Add blank favicon",
    },
    disable_google_fonts: {
      title: "Disable Google Fonts",
      helpUrl: "#",
      helpText: "Disable Google Fonts",
    },
    disable_global_styles: {
      title: "Disable Global Styles",
      helpUrl: "#",
      helpText: "Disable Global Styles",
    },
    disable_heartbeat: {
      title: "Disable HeartBeat",
      helpUrl: "#",
      helpText: "Disable HeartBeat",
      options: {
        default: "Default (Enabled)",
        disable_everywhere: "Disable Everywhere",
        only_allow_when_editing: "Only Allow When Editing",
      },
    },
    heartbeat_frequency: {
      title: "Heartbeat frequency",
      helpUrl: "#",
      helpText: "Heartbeat frequency",
      options: {
        seconds_15: "15 Seconds",
        seconds_30: "30 Seconds",
        seconds_45: "45 Seconds",
        seconds_60: "60 Seconds (Default)",
        seconds_120: "2 Minutes",
        seconds_180: "3 Minutes",
        seconds_240: "4 Seconds",
        seconds_300: "5 Minutes",
      },
    },
    limit_post_revisions: {
      title: "Limit Post Revisions",
      helpUrl: "#",
      helpText: "Limit Post Revisions",
      options: {
        default: "Default (Enabled)",
        disable: "Disable Post Revisions",
        revisions_1: "1 Revision",
        revisions_2: "2 Revisions",
        revisions_3: "3 Revisions",
        revisions_4: "4 Revisions",
        revisions_5: "5 Revisions",
        revisions_10: "10 Revisions",
        revisions_15: "15 Revisions",
        revisions_20: "20 Revisions",
        revisions_25: "25 Revisions",
        revisions_30: "30 Revisions",
      },
    },
    autosave_interval: {
      title: "Autosave Interval",
      helpUrl: "#",
      helpText: "Autosave Interval",
      options: {
        disable: "Disable Autosave Interval",
        minutes_1: "1 Minute (Default)",
        minutes_2: "2 Minutes",
        minutes_3: "3 Minutes",
        minutes_4: "4 Minutes",
        minutes_5: "5 Minutes",
        minutes_10: "10 Minutes",
        minutes_15: "15 Minutes",
        minutes_20: "20 Minutes",
        minutes_25: "25 Minutes",
        minutes_30: "30 Minutes",
      },
    },
  },
  medias: {
    disable_thumbnail: {
      title: "Disable Thumbnail",
      helpUrl: "#",
      helpText: "Disable Thumbnail",
    },
    disable_medium: {
      title: "Disable Medium",
      helpUrl: "#",
      helpText: "Disable Medium",
    },
    disable_medium_large: {
      title: "Disable Medium Large",
      helpUrl: "#",
      helpText: "Disable Medium Large",
    },
    disable_large: {
      title: "Disable Large",
      helpUrl: "#",
      helpText: "Disable Large",
    },
  },
};

const toggleAll = (action, feature) => {
  if ("active" == action) {
    Object.keys(data.quickToggles[feature]).forEach((key) => {
      let item = false;
      if ("disable_rest_api" == key) {
        item = "disable_when_logged_out";
      } else if ("disable_heartbeat" == key) {
        item = "only_allow_when_editing";
      } else if ("heartbeat_frequency" == key) {
        item = "seconds_60";
      } else if ("limit_post_revisions" == key) {
        item = "disable";
      } else if ("autosave_interval" == key) {
        item = "minutes_10";
      } else {
        item = true;
      }
      data.quickToggles[feature][key] = item;
    });
  } else {
    Object.keys(data.quickToggles[feature]).forEach((key) => {
      let item = false;
      if ("disable_rest_api" == key) {
        item = "default";
      } else if ("disable_heartbeat" == key) {
        item = "default";
      } else if ("heartbeat_frequency" == key) {
        item = "seconds_60";
      } else if ("limit_post_revisions" == key) {
        item = "default";
      } else if ("autosave_interval" == key) {
        item = "minutes_1";
      } else {
        item = false;
      }
      data.quickToggles[feature][key] = item;
    });
  }

  updateToggle({feature: `All ${fn.titleCase(feature)}`, status: ("active" == action)});
};

const updateToggle = (content) => {
  const res = fn.fetchAdminAjax(optimator.admin_ajax, "post", {
    action: "optimator_update_quick_toggles",
    generals: data.quickToggles.generals,
    medias: data.quickToggles.medias,
    nonce: optimator.nonce,
  });

  let msg = `${content.feature}: ${content.status? 'Enabled': 'Disabled'}`

  res.then((response) => {
    if (response.status) {
      ElNotification({
        title: "Success",
        message: msg,
        type: "success",
        offset: 50,
      });
    } else {
      ElNotification({
        title: "Error",
        message: response.msg,
        type: "error",
        offset: 50,
      });
    }
  });
};
</script>
<template>
  <div v-if="data.quickToggles != null" class="quick-toggle-wrap">
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
            v-for="(general, index) in quickToggles.generals"
            :key="index"
            class="grid-item"
          >
            <Toggle
              @update-toggle="updateToggle"
              :content="general"
              v-model="data.quickToggles.generals[index]"
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
            v-for="(media, index) in quickToggles.medias"
            :key="index"
            class="grid-item"
          >
            <Toggle
              :content="media"
              v-model="data.quickToggles.medias[index]"
            />
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