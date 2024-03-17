<script setup>
import { ref, inject } from "vue";
import { data, fn, icons } from "../data";
import Toggle from "./parts/Toggle.vue";

const quickToggles = {
  generals: {
    disable_emojis: {
      title: wp.i18n.__("Disable Emojis", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Emojis", "optimator"),
    },
    disable_embeds: {
      title: wp.i18n.__("Disable Embeds", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Embeds", "optimator"),
    },
    disable_dashicons: {
      title: wp.i18n.__("Disable Dashicons", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Dashicons", "optimator"),
    },
    disable_xml_rpc: {
      title: wp.i18n.__("Disable XML-RPC", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable XML-RPC", "optimator"),
    },
    remove_jquery_migrate: {
      title: wp.i18n.__("Remove jQuery Migrate", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Remove jQuery Migrate", "optimator"),
    },
    hide_wp_version: {
      title: wp.i18n.__("Hide WP Version", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Hide WP Version", "optimator"),
    },
    remove_wlwmanifest_link: {
      title: wp.i18n.__("Remove wlwmanifest link", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Remove wlwmanifest link", "optimator"),
    },
    remove_rsd_link: {
      title: wp.i18n.__("Remove RSD link", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Remove RSD link", "optimator"),
    },
    remove_shortlink: {
      title: wp.i18n.__("Remove Shortlink", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Remove Shortlink", "optimator"),
    },
    disable_rss_feeds: {
      title: wp.i18n.__("Disable RSS feeds", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable RSS feeds", "optimator"),
    },
    remove_rss_feed_links: {
      title: wp.i18n.__("Remove RSS feed links", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Remove RSS feed links", "optimator"),
    },
    disable_self_pingbacks: {
      title: wp.i18n.__("Disable Self Pingbacks", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Self Pingbacks", "optimator"),
    },
    disable_rest_api: {
      title: wp.i18n.__("Disable REST API", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable REST API", "optimator"),
      options: {
        default: wp.i18n.__("Default (Enabled)", "optimator"),
        disable_for_non_admins: wp.i18n.__("Disable for non-admins", "optimator"),
        disable_when_logged_out: wp.i18n.__("Disable when logged out", "optimator"),
      },
    },
    remove_rest_api_links: {
      title: wp.i18n.__("Remove REST API links", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Remove REST API links", "optimator"),
    },
    disable_google_maps: {
      title: wp.i18n.__("Disable Google Maps", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Google Maps", "optimator"),
    },
    disable_password_strength_meter: {
      title: wp.i18n.__("Disable Password Strength Meter", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Password Strength Meter", "optimator"),
    },
    disable_comments: {
      title: wp.i18n.__("Disable Comments", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Comments", "optimator"),
    },
    disable_comments_url: {
      title: wp.i18n.__("Disable Comments URL", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Comments URL", "optimator"),
    },
    add_blank_favicon: {
      title: wp.i18n.__("Add Blank Favicon", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Add Blank Favicon", "optimator"),
    },
    // disable_google_fonts: {
    //   title: wp.i18n.__("Disable Google Fonts", "optimator"),
    //   helpUrl: "#",
    //   helpText: wp.i18n.__("Disable Google Fonts", "optimator"),
    // },
    disable_global_styles: {
      title: wp.i18n.__("Disable Global Styles", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Global Styles", "optimator"),
    },
    disable_heartbeat: {
      title: wp.i18n.__("Disable Heartbeat", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Heartbeat", "optimator"),
      options: {
        default: wp.i18n.__("Default (Enabled)", "optimator"),
        disable_everywhere: wp.i18n.__("Disable Everywhere", "optimator"),
        only_allow_when_editing: wp.i18n.__("Only allow when editing", "optimator"),
      },
    },
    heartbeat_frequency: {
      title: wp.i18n.__("Heartbeat Frequency", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Heartbeat Frequency", "optimator"),
      options: {
        seconds_15: wp.i18n.__("15 Seconds", "optimator"),
        seconds_30: wp.i18n.__("30 Seconds", "optimator"),
        seconds_45: wp.i18n.__("45 Seconds", "optimator"),
        seconds_60: wp.i18n.__("60 Seconds (Default)", "optimator"),
        seconds_120: wp.i18n.__("2 Minutes", "optimator"),
        seconds_180: wp.i18n.__("3 Minutes", "optimator"),
        seconds_240: wp.i18n.__("4 Minutes", "optimator"),
        seconds_300: wp.i18n.__("5 Minutes", "optimator"),
      },
    },
    limit_post_revisions: {
      title: wp.i18n.__("Limit Post Revisions", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Limit Post Revisions", "optimator"),
      options: {
        default: wp.i18n.__("Default (Enabled)", "optimator"),
        disable: wp.i18n.__("Disable Post Revisions", "optimator"),
        revisions_1: wp.i18n.__("1 Revision", "optimator"),
        revisions_2: wp.i18n.__("2 Revisions", "optimator"),
        revisions_3: wp.i18n.__("3 Revisions", "optimator"),
        revisions_4: wp.i18n.__("4 Revisions", "optimator"),
        revisions_5: wp.i18n.__("5 Revisions", "optimator"),
        revisions_10: wp.i18n.__("10 Revisions", "optimator"),
        revisions_15: wp.i18n.__("15 Revisions", "optimator"),
        revisions_20: wp.i18n.__("20 Revisions", "optimator"),
        revisions_25: wp.i18n.__("25 Revisions", "optimator"),
        revisions_30: wp.i18n.__("30 Revisions", "optimator"),
      },
    },
    autosave_interval: {
      title: wp.i18n.__("Autosave Interval", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Autosave Interval", "optimator"),
      options: {
        disable: wp.i18n.__("Disable Autosave Interval", "optimator"),
        minutes_1: wp.i18n.__("1 Minute (Default)", "optimator"),
        minutes_2: wp.i18n.__("2 Minutes", "optimator"),
        minutes_3: wp.i18n.__("3 Minutes", "optimator"),
        minutes_4: wp.i18n.__("4 Minutes", "optimator"),
        minutes_5: wp.i18n.__("5 Minutes", "optimator"),
        minutes_10: wp.i18n.__("10 Minutes", "optimator"),
        minutes_15: wp.i18n.__("15 Minutes", "optimator"),
        minutes_20: wp.i18n.__("20 Minutes", "optimator"),
        minutes_25: wp.i18n.__("25 Minutes", "optimator"),
        minutes_30: wp.i18n.__("30 Minutes", "optimator"),
      },
    },
  },
  medias: {
    disable_thumbnail: {
      title: wp.i18n.__("Disable Thumbnail", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Thumbnail", "optimator"),
    },
    disable_medium: {
      title: wp.i18n.__("Disable Medium", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Medium", "optimator"),
    },
    disable_medium_large: {
      title: wp.i18n.__("Disable Medium Large", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Medium Large", "optimator"),
    },
    disable_large: {
      title: wp.i18n.__("Disable Large", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable Large", "optimator"),
    },
    disable_1536: {
      title: wp.i18n.__("Disable 1536x1536", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable 1536x1536", "optimator"),
    },
    disable_2048: {
      title: wp.i18n.__("Disable 2048x2048", "optimator"),
      helpUrl: "#",
      helpText: wp.i18n.__("Disable 2048x2048", "optimator"),
    },
  },
};

const toggleAll = (action, feature) => {
  if ("activate" == action) {
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

  updateToggle({
    feature: { title: `All ${fn.titleCase(feature)}` },
    status: !("activate" == action),
  });
};

const updateToggle = (content) => {
  const res = fn.fetchAdminAjax(optimator.admin_ajax, "post", {
    action: "optimator_update_quick_toggles",
    generals: data.quickToggles.generals,
    medias: data.quickToggles.medias,
    nonce: optimator.nonce,
  });

  let status = "";
  if (content.status == false || content.status == true) {
    status = content.status ? "Enabled" : "Disabled";
  } else {
    status = content.feature.options[content.status];
  }

  let msg = `${content.feature.title}: ${status}`;

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
        <el-text tag="p" size="large">{{
          __("General", "optimator")
        }}</el-text>
        <el-divider />
        <div class="btn-wrap">
          <el-button
            @click="toggleAll('activate', 'generals')"
            type="success"
            >{{ __("Activate All", "optimator") }}</el-button
          >
          <el-button
            @click="toggleAll('deactivate', 'generals')"
            type="danger"
            >{{ __("Deactivate All", "optimator") }}</el-button
          >
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
        <el-text tag="p" size="large">{{
          __("Media", "optimator")
        }}</el-text>
        <el-divider />
        <div class="btn-wrap">
          <el-button @click="toggleAll('activate', 'medias')" type="success">{{
            __("Activate All", "optimator")
          }}</el-button>
          <el-button @click="toggleAll('deactivate', 'medias')" type="danger">{{
            __("Deactivate All", "optimator")
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
              @update-toggle="updateToggle"
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