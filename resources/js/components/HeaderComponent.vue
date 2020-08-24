<template>
  <header>
    
    <div class="flex between">
      <h1>Anou home page</h1>
      <nav class="header-nav">
        <ul>
          <li><a href="#">top</a></li>
          <li><a href="#">my profile</a></li>
          <li><a href="#">question content</a></li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  
}
</script>

<style scoped>
header {
  height: 60px;
  line-height: 60px;
  background: black;
  color: white;
}
header h1 {
  margin-left: 70px;
}
.header-nav li {
  display: inline-block;
}
.header-nav li > a {
  font-weight: bold;
  text-decoration: none;
  color: white;
  margin: 0 30px 0 30px;
}

</style>