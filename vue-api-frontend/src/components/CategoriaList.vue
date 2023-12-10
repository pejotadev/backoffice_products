<template>
  <div>
    <h2>Categorias</h2>
    <ul>
      <li v-for="categoria in categorias" :key="categoria.id">
        {{ categoria.nome }}
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";

export default {
  setup() {
    const categorias = ref([]);

    onMounted(() => {
      fetchCategorias();
    });

    const fetchCategorias = async () => {
      const response = await axios.get("http://localhost:8000/api/categorias");
      categorias.value = response.data;
    };

    return {
      categorias,
      fetchCategorias,
    };
  },
};
</script>
