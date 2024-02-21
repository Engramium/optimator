<script setup>
import { ref } from "vue";
import {data, fn, icons} from "../../data";
import { QuestionFilled } from "@element-plus/icons-vue";

const props = defineProps(["toggle", "content"]);
const emits = defineEmits(['updateToggle']);

const toggleFeature = () => {
    emits('updateToggle');
}

</script>

<template>
  <div class="toggle-wrap">
    <div class="toggle-title">
      <el-text el-text class="mx-1" tag="p" size="large">{{
        content.title
      }}</el-text>
      <div class="help-icon">
        <el-tooltip :content="content.helpText" raw-content>
          <a class="help-icon" :href="content.helpUrl" target="_blank">
            <el-icon class="pointer" :size="20" color="#777777">
              <QuestionFilled />
            </el-icon>
          </a>
        </el-tooltip>
      </div>
    </div>
    <el-switch v-model="toggle.value" size="large" @change="toggleFeature()" />
  </div>
</template>

<style lang="scss" scoped>
@import "../../scss/_variables";
@import "../../scss/_mixins";
.toggle-wrap {
  @include flex();
  width: 100%;
  justify-content: space-between;

  .toggle-title {
    @include flex();
    gap: 10px;

    .help-icon {
      @include flex();
    }
  }
}
.link-item {
  margin: 10px 20px;
}
</style>