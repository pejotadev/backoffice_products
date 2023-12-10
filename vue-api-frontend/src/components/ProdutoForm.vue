<template>
  <div>
    <h2>Novo Produto</h2>
    <form @submit.prevent="criarProduto">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" v-model="novoProduto.nome" required>
      <label for="descricao">Descrição:</label>
      <textarea id="descricao" v-model="novoProduto.descricao" required></textarea>
      <label for="preco">Preço:</label>
      <input type="number" id="preco" v-model="novoProduto.preco" required>
      <label for="quantidade">Quantidade:</label>
      <input type="number" id="quantidade" v-model="novoProduto.quantidade" required>
      <label for="categoria_id">Categoria ID:</label>
      <input type="number" id="categoria_id" v-model="novoProduto.categoria_id" required>
      <button type="submit">Criar Produto</button>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";

export default {
  setup() {
    const novoProduto = ref({
      nome: "",
      descricao: "",
      preco: 0,
      quantidade: 0,
      categoria_id: 0,
    });

    const criarProduto = async () => {
      const response = await axios.post("http://localhost:8000/api/produtos", novoProduto);
      
      alert(`Produto '${response.data.nome}' criado com sucesso!`);

      reset();
    };

    const reset = () => {
      novoProduto.nome = "";
      novoProduto.descricao = "";
      novoProduto.preco = 0;
      novoProduto.quantidade = 0;
      novoProduto.categoria_id = 0;
    };

    return {
      novoProduto,
      criarProduto,
    };
  },
};
</script>
