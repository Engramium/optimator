<script setup>
import { ref } from "vue";
import { data, fn, icons } from "../../data";
import { QuestionFilled } from "@element-plus/icons-vue";

const props = defineProps(["modelValue", "content"]);
const emits = defineEmits(["update:modelValue", "updateToggle"]);

const toggleFeature = (event, content) => {
  emits("update:modelValue", event);
  emits("updateToggle", { feature: content, status: event });
};
</script>

<template>
  <div class="toggle-wrap">
    <div class="toggle-title">
      <el-text tag="p" size="large">{{ content.title }}</el-text>
      <div class="help-icon">
        <el-popover
          placement="bottom"
          :width="300"
          trigger="hover"
          effect="dark"
          :content="content.helpText"
        >
          <template #reference>
            <a
              v-if="content.helpUrl != '#'"
              class="help-icon"
              :href="content.helpUrl"
              target="_blank"
            >
              <el-icon class="pointer" :size="20" color="#777777">
                <QuestionFilled />
              </el-icon>
            </a>
            <el-icon v-else class="pointer" :size="20" color="#777777">
              <QuestionFilled />
            </el-icon>
          </template>
        </el-popover>
      </div>
    </div>

    <el-switch
      v-if="!content.hasOwnProperty('options')"
      :model-value="modelValue"
      size="large"
      @change="toggleFeature($event, content)"
    />

    <el-select
      v-else
      class="m-2"
      placeholder="Select"
      size="large"
      style="width: 240px"
      :model-value="modelValue"
      @change="toggleFeature($event, content)"
    >
      <el-option
        v-for="(item, key) in content.options"
        :key="key"
        :label="item"
        :value="key"
      />
    </el-select>
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