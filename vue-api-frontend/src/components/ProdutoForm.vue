<template>
    <div class="flex items-center justify-center gradient h-screen">
        
          <form class="w-full bg-white sm:rounded-lg p-8" @submit.prevent="handleSubmit" >
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Nome
                </label>
              </div>
              <div class="md:w-2/3">
                <input v-model="novoProduto.nome" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Nome do produto">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
                  Descrição
                </label>
              </div>
              <div class="md:w-2/3">
                <input v-model="novoProduto.descricao" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-username" type="text" placeholder="Descrição do produto">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                  Preço
                </label>
              </div>
              <div class="md:w-2/3">
                <input v-model="novoProduto.preco" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="number">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                  Categoria ID
                </label>
              </div>
              <div class="md:w-2/3">
                <select v-model="novoProduto.categoria_id" id="mySelect">
                  <option v-for="option in categorias" :key="option.id" :value="option.id">
                    {{ option.nome }}
                  </option>
                </select>
                
              </div>
            </div>

            <div class="md:flex md:items-center">
              <div class="md:w-1/3"></div>
              <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                  {{ action }}
                </button>
              </div>
            </div>
          </form>
           
    </div>
  

</template>

<script>
import axios from "axios";

export default {
    data() {
    return {
      action: this.$route.params.id ? "Editar" : "Criar",
      id: this.$route.params.id,
      novoProduto: {
        nome: "",
        descricao: "",
        preco: 0,
        categoria_id: 0,
      },
    };
  },

  methods: {
    criarProduto: async function () {
      await axios.post(
        "http://localhost:8000/api/produtos",
        this.novoProduto
      );
      alert("Produto cadastrado com sucesso!");
      this.reset();
      this.$router.push({ name: "produtos" });
    },
    editarProduto: async function () {
      await axios.put(
        "http://localhost:8000/api/produtos/"+this.id,
        this.novoProduto
      );
      alert("Produto editado com sucesso!");
      this.reset();
      this.$router.push({ name: "produtos" });
    },
    reset: function () {
      this.novoProduto.nome = "";
      this.novoProduto.descricao = "";
      this.novoProduto.preco = 0;
      this.novoProduto.categoria_id = 0;
      delete this.novoProduto.id
    },
    buscarProduto: async function () {
      const response = await axios.get("http://localhost:8000/api/produtos/"+this.id);
      this.novoProduto.nome = response.data.nome;
      this.novoProduto.descricao = response.data.descricao;
      this.novoProduto.preco = response.data.preco;
      this.novoProduto.categoria_id = response.data.categoria_id;
      this.novoProduto.id = response.data.id;
    },
    buscarCategorias: async function () {
      const response = await axios.get("http://localhost:8000/api/categorias");
      this.categorias = response.data;
    },
    handleSubmit: function () {
      if (this.id) {
        this.editarProduto();
      } else {
        this.criarProduto();
      }
    },
    
  },
  mounted() {
    console.log(this.$router)
    this.buscarCategorias();
    if (this.id) {
      this.buscarProduto();
    }
  },
};
</script>
