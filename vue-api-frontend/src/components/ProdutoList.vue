<template>
<div class="flex items-center justify-center gradient h-screen">
  <div class="overflow-x-auto relative shadow-md sm:rounded-lg ">
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">Produto</th>
            <th scope="col" class="py-3 px-6">Categoria</th>
            <th scope="col" class="py-3 px-6">Valor</th>
            <th scope="col" class="py-3 px-6">Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr 
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          v-for="produto in produtos" :key="produto.id">
            <td class="py-4 px-6">
              {{ produto.nome }} 
              <span class="flex flex-col text-sm">{{ produto.descricao }}</span>
            </td>
            <td class="py-4 px-6">
              <div
              data-te-chip-init
              class="chip">
              {{ produto.categoria?.nome}}
            </div></td>
            <td class="py-4 px-6">R${{ formatMoney(produto.preco) }}</td>
            <td class="py-4 px-6">
              <router-link :to="{ name: 'produto', params: { id: produto.id } }" class="text-primary">Editar</router-link>
            </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
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
      produtos.value = response.data;
    };

    return {
      produtos,
      fetchProdutos,
    };
  },
  methods: {
    formatMoney(amount) {

      return amount.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2,
      });
    },
  },
};
</script>

<style scoped>

</style>