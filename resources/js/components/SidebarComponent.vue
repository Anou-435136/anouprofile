<template>
  <div id="sidebar-content">
    <div class="humburger" @click="openSidebar" >
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="overlay" v-if="show">
      <div class="sidebar">
        <h2>sidebar</h2>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <div class="close" @click="closeSidebar">
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  data() {
    return {
      show: false
    };
  },
  methods: {
    openSidebar() {
      this.show = true;
    },
    closeSidebar() {
      this.show = false;
    }
  }
};
</script>

<style scoped>
.humburger {
  width: 40px;
  height: 40px;
  position: absolute;
  top: 7px;
  left: 20px;
  cursor: pointer;
  transition: 0.4s;
}
.humburger span {
  width: 35px;
  height: 4px;
  background: white;
  position: absolute;
  display: block;
  transition: 0.4s;
}
.humburger span:nth-last-of-type(1) {
  top: 10px;
}
.humburger span:nth-last-of-type(2) {
  top: 20px;
}
.humburger span:nth-last-of-type(3) {
  top: 30px;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 50;
}
.sidebar {
  height: 80%;
  background: rgba(218, 218, 218, 0.8);
  z-index: 60;
}
.sidebar h2 {
  font-size: 30px;
  padding: 20px;
  text-align: center;
}
.close {
  width: 30px;
  height: 30px;
  position: fixed;
  top: 12px;
  left: 22px;
  cursor: pointer;
  transition: 0.4s;
}
.close span {
  width: 30px;
  height: 4px;
  background-color: black;
  display: block;
  transition: 0.4s;
  position: absolute;
}
.close span:nth-last-of-type(1) {
  top: 15px;
  transform: rotate(45deg);
}
.close span:nth-last-of-type(2) {
  top: 15px;
  transform: rotate(-45deg);
}
</style>