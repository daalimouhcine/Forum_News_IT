<script>
export default {
    
}
</script>

<template>
  <div class="skeleton page">
    <div class="skeleton-nav"></div>
    <div class="skeleton-swiper"></div>

    <div class="skeleton-banner"></div>
  </div>
  <div class="skeleton page">
    <div class="skeleton-nav"></div>
    <div class="skeleton-swiper"></div>

    <div class="skeleton-banner"></div>
  </div>
</template>

<style scoped>
.skeleton {
  position: relative;
  height: fit-content;
  overflow: hidden;
  padding: 15px;
  box-sizing: border-box;
  background: #fff;
} 
.skeleton-nav {
  height: 45px;
  background: #eee;
  margin-bottom: 15px;
}
.skeleton-swiper {
  height: 260px;
  background: #eee;
  margin-bottom: 15px;
}
.skeleton-tabs {
  list-style: none;
  padding: 0;
  margin: 0 -15px;
  display: flex;
  flex-wrap: wrap;
}
.skeleton-tabs-item {
  width: 25%;
  height: 55px;
  box-sizing: border-box;
  text-align: center;
  margin-bottom: 15px;
}
.skeleton-banner {
  height: 60px;
  background: #eee;
  margin-bottom: 15px;
}
.skeleton-productions {
  height: 20px;
  margin-bottom: 15px;
  background: #eee;
}

</style>