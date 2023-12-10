<template>
  <div id="app">
    <categoria-form />
    <categoria-list />
    <produto-form />
    <produto-list />
  </div>
</template>

<script>
import CategoriaForm from "@/components/CategoriaForm.vue";
import CategoriaList from "@/components/CategoriaList.vue";
import ProdutoForm from "@/components/ProdutoForm.vue";
import ProdutoList from "@/components/ProdutoList.vue";

export default {
  components: {
    CategoriaForm,
    CategoriaList,
    ProdutoForm,
    ProdutoList,
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

form {
  margin-bottom: 20px;
}

ul {
  list-style-type: none;
  padding: 0;
}
</style>