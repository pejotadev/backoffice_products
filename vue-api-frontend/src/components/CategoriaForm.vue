<template>
  <div>
    <h2>Nova Categoria</h2>
    <form @submit.prevent="criarCategoria">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" v-model="novaCategoria.nome" required>
      <button type="submit">Criar Categoria</button>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";

export default {
  setup() {
    const novaCategoria = ref({
      nome: "",
    });

    const criarCategoria = async () => {
      const response = await axios.post("http://localhost:8000/api/categorias", novaCategoria);
      
      alert(`Categoria '${response.data.nome}' criada com sucesso!`);

      reset();
    };

    const reset = () => {
      novaCategoria.nome = "";
    };

    return {
      novaCategoria,
      criarCategoria,
    };
  },
};
</script>
