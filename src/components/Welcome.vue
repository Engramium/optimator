<script setup>
</script>
<template>
  <div class="welcome-wrap">
    <div class="grid">
      <div class="grid-item">
        <h2>
          <el-text class="mx-1" size="large">{{ __('Introducing Optimator', 'optimator') }}</el-text>
        </h2>
        <p>
          <el-text class="mx-1"
            > {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolor provident soluta ad omnis sit nostrum aperiam deleniti iste dolorum ducimus sunt nesciunt, illum perferendis quasi itaque amet deserunt similique?', 'optimator') }} </el-text
          >
        </p>
        <iframe
          width="100%"
          height="400"
          src="https://www.youtube.com/embed/M7lc1UVf-VE?si=msqzIdSl0SZ3dmU-"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen
        ></iframe>
      </div>
      <div class="grid-item">
        <div v-for="o in 3" :key="o" class="text item">
          {{ "List item " + o }}
        </div>
      </div>
      <div class="grid-item">
        <div v-for="o in 3" :key="o" class="text item">
          {{ "List item " + o }}
        </div>
      </div>
      <div class="grid-item">
        <div v-for="o in 3" :key="o" class="text item">
          {{ "List item " + o }}
        </div>
      </div>
      <div class="grid-item">
        <div class="quick-toggle">
          <el-switch disabled size="large" />
          <h2><el-text class="mx-1" size="large">{{ i18 }} Quick Toggle</el-text></h2>
        </div>
        <p>
          <el-text class="mx-1"
            >Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum
            dolor provident soluta ad omnis sit nostrum aperiam deleniti iste
            dolorum ducimus sunt nesciunt, illum perferendis quasi itaque amet
            deserunt similique?</el-text
          >
        </p>
      </div>
      <div class="grid-item">
        <h2>
          <el-text class="mx-1" size="large">Coming Soon...</el-text>
        </h2>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
@import "../scss/_variables";
@import "../scss/_mixins";
.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: 180px;
  gap: 40px;

  .grid-item {
    padding: 20px;
    @include flex(column, center, flex-start);
    gap: 30px;

    border-radius: 4px;
    border: 1px solid #e4e7ed;
    background-color: #ffffff;
    overflow: hidden;
    color: #303133;
    transition: 0.3s;
    box-shadow: $box_shadow;

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