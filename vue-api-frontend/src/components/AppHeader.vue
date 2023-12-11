<template>
  <header> 
    <nav class="flex justify-between">
      <h1>
        <a class="logo" href="#">Único Drop<span class="text-primary">.</span></a>
      </h1> 
      <ul> 
        <li>
          <router-link to="/">Produtos</router-link>
        </li> 
        <li>
          <router-link to="/categorias">Categorias</router-link>
        </li> 
        <li>
          <router-link to="/produto">Novo Produto</router-link>
        </li>
      </ul> 
    </nav>
  </header>
</template>

<script>
</script>

<style>
header {
  background-color: #202942;
  color: #fff;
  padding: 0.75rem;
}

nav {
  margin-top: 0.75rem;
}

nav li {
  display: inline-block;
  margin-right: 1rem;
}

.logo {
  color: #f8f9fc;
  font-weight: 700;
  font-size: 24px;
  padding: 3px 0;
  letter-spacing: 1px;
}

.text-primary {
  color: #2d88f1 !important;
}
</style>