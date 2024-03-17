<script setup>
import { ref } from "vue";
import { QuestionFilled, Document } from "@element-plus/icons-vue";
const popoverRef = ref();

const links = [
  {
    label: "Documentation",
    url: "https://www.engramium.com/docs/optimator",
    icon: Document
  }
];
</script>
<template>
  <div class="">
    <el-icon class="pointer" v-popover="popoverRef" :size="20" color="#777777">
      <QuestionFilled />
    </el-icon>
    <el-popover
      ref="popoverRef"
      trigger="click"
      virtual-triggering
      persistent
      :width="300"
    >
      <el-text tag="b" class="title" size="large">{{ __('Get Help', 'optimator') }}</el-text>
      <div v-for="(link, index) in links" :key="index" class="link-item">
        <el-link :href="link.url" :underline="false" target="_blank"><el-icon style="margin-right: 8px"><component :is="link.icon"></component></el-icon>{{ link.label }}</el-link>
      </div>
    </el-popover>
  </div>
</template>
<style lang="scss" scoped>
.title {
  margin: 10px 20px;
}
.link-item {
  margin: 10px 20px;
}
</style>