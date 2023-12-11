<template>
    <div>
      <AppHeader />
      <router-view /> 
    </div>
</template>

<script>
import AppHeader from "@/components/AppHeader.vue";

export default {
  components: {
    AppHeader
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
}

html {
  font: 62.5% "segoe ui", helvetica, arial, sans-serif;
  background-color: #fff;
}

body {
  font-size: 1.6rem;
}

.gradient{
  background: linear-gradient(to bottom, #202942, #3B4E75);
}
.chip{
  border: 1px solid;
  border-radius: 10px;
  padding: 3px;
}
</style>