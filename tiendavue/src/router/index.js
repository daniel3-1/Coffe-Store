import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProductosView from '../views/Productos/View.vue'
import ProductosCreate from '../views/Productos/Create.vue'
import ProductosEdit from '../views/Productos/Edit.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }, 
    {
      path: '/productos',
      name: 'productos',
      component: ProductosView
    },
    {
      path: '/productos/create',
      name: 'productosCreate',
      component: ProductosCreate
    },
    {
      path: '/productos/:id/edit',
      name: 'productoEdit',
      component: ProductosEdit
    },
  ]
})

export default router
