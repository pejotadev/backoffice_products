<template>
  <div>
    <h2>Produtos</h2>
    <ul>
      <li v-for="produto in produtos" :key="produto.id">
        {{ produto.nome }}
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";

export default {
  setup() {
    const produtos = ref([]);

    onMounted(() => {
      fetchProdutos();
    });

    const fetchProdutos = async () => {
      const response = await axios.get("http://localhost:8000/api/produtos");
      produtos = response.data;
    };

    return {
      produtos,
      fetchProdutos,
    };
  },
};
</script>
