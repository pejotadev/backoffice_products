import { createRouter, createWebHistory } from 'vue-router'

import ProdutosList from '../components/ProdutoList.vue'

const routes = [

  { path: '/', name:'produtos', component: ProdutosList },
  {
    path: '/categorias',
    name: 'categorias',
    /* lazy loading */
    component: () => import('../components/CategoriaList.vue')
  },
  {
    path: '/produto/:id',
    name: 'produto',
    /* lazy loading */
    component: () => import('../components/ProdutoForm.vue')
  },
  {
    path: '/categoria/:id',
    name: 'categoria',
    /* lazy loading */
    component: () => import('../components/CategoriaForm.vue')
  },
  {
    path: '/produto',
    name: 'cadastrar-produto',
    /* lazy loading */
    component: () => import('../components/ProdutoForm.vue')
  },
  {
    path: '/categoria',
    name: 'cadastrar-categoria',
    /* lazy loading */
    component: () => import('../components/CategoriaForm.vue')
  }

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
