<script setup>
import { ref } from "vue";
import { QuestionFilled } from "@element-plus/icons-vue";
const popoverRef = ref();

const links = [
  {
    label: "Documentation Link",
    url: "#"
  },
  {
    label: "Documentation Link",
    url: "#"
  },
  {
    label: "Documentation Link",
    url: "#"
  },
  {
    label: "Documentation Link",
    url: "#"
  }
]
</script>
<template>
  <div class="">
    <el-icon
      class="pointer"
      v-popover="popoverRef"
      :size="20"
      color="#777777"
    >
      <QuestionFilled />
    </el-icon>
    <el-popover
      ref="popoverRef"
      trigger="click"
      virtual-triggering
      persistent
      :width="300"
    >
      <div v-for="(link, index) in links" :key="index" class="link-item">
        <el-link :href="link.url" :underline="false">{{ link.label }}</el-link>
      </div>
    </el-popover>
  </div>
</template>
<style lang="scss" scoped>
.link-item {
  margin: 10px 20px;
}
</style>