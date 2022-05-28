import {
  createRouter,
  createWebHistory
} from 'vue-router'
import RootView from '../views/RootView.vue'
import store from '@/store'

const routes = [{
    path: '/',
    component: RootView,
    redirect: '/login',
    children: [{
        path: '/home',
        name: 'home',
        component: () => import('../views/home/Index.vue')
      },
      {
        path: '/order',
        name: "order",
        component: () => import('../views/order/Index.vue'),
        children: [{
          path: '/meishi',
          name: 'meishi',
        }]
      },
      {
        path: '/cart',
        name: 'cart',
        component: () => import('../views/cart/Index.vue')
      },
      {
        path: '/meal',
        name: "Meal",
        component: () => import('../views/order/meal/Index.vue')
      },
      {
        path: '/shopcart',
        name: "Shopcart",
        component: () => import('../views/order/shopcart/Index.vue')
      },
      {
        path: '/mine',
        name: 'mine',
        component: () => import('../views/mine/Index.vue'),
        // children:[
        //   {
        //     path: '',
        //     component: () => import('../views/mine/Index.vue') ,
        //   },
        //   {
        //     path:'password',
        //     component: () => import('../views/mine/components/password.vue') ,
        //   },
        //   {
        //     name:'address',
        //     component: () => import('../views/mine/components/address.vue') ,
        //   },
        //   {
        //     path:'icon',
        //     component: () => import('../views/mine/components/icon.vue') ,
        //   },
        //   {
        //     path:'payword',
        //     component: () => import('../views/mine/components/payword.vue') ,
        //   },
        //   {
        //     path:'balance',
        //     component: () => import('../views/mine/components/balance.vue') ,
        //   },
        // ]
      },
      {
        path: '/mine/password',
        name: 'mine/password',
        component: () => import('../views/mine/components/password.vue')
      },
      {
        path: '/mine/address',
        name: 'mine/address',
        component: () => import('../views/mine/components/address.vue')
      },
      {
        path: '/mine/newaddress',
        name: 'mine/newaddress',
        component: () => import('../views/mine/components/newaddress.vue')
      },
      {
        path: '/mine/icon',
        name: 'mine/icon',
        component: () => import('../views/mine/components/icon.vue')
      },
      {
        path: '/mine/payword',
        name: 'mine/payword',
        component: () => import('../views/mine/components/payword.vue')
      },
      {
        path: '/mine/balance',
        name: 'mine/balance',
        component: () => import('../views/mine/components/balance.vue')
      },
    ]
  },

  {
    path: '/login',
    component: () => import('../views/login/Index.vue')
  },
  {
    path: '/register',
    component: () => import('../views/register/Index.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

// router.beforeEach((to, from, next) => {
//   if (to.path == '/login' || to.path == '/register' || store.state.username) {
//     next()
//   } else {
//     next('/login')
//   }
// })

export default router