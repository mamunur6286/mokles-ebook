import Vue from 'vue'
import Router from 'vue-router'
import store from '../store/store'

const Page404 = () => import('@/views/pages/Page404.vue')
const Page500 = () => import('@/views/pages/Page500.vue')
const Login = () => import('@/views/pages/Login.vue')
const Register = () => import('@/views/pages/Register.vue')

Vue.use(Router)

const routes = [
  {
    path: '/',
    redirect: '/dashboard',
    name: 'Home',
    component: () => import('@containers/TheContainer.vue'),
    children: [
      {
        path: 'dashboard',
        name: 'Dashboard',
        component: () => import('@/views/Dashboard.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'authors',
        name: 'Authors',
        component: () => import('@/views/settings/author/List.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'authors/create',
        name: 'AuthorsCreate',
        component: () => import('@/views/settings/author/Form.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'categories',
        name: 'Categories',
        component: () => import('@/views/settings/category/List.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'categories/create',
        name: 'CategoriesCreate',
        component: () => import('@/views/settings/category/Form.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'lessons',
        name: 'Lessons',
        component: () => import('@/views/settings/lesson/List.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'lessons/create',
        name: 'LessonsCreate',
        component: () => import('@/views/settings/lesson/Form.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'series',
        name: 'Series',
        component: () => import('@/views/settings/series/List.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'series/create',
        name: 'SeriesCreate',
        component: () => import('@/views/settings/series/Form.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'books',
        name: 'Books',
        component: () => import('@/views/book/List.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'books/create',
        name: 'BooksCreate',
        component: () => import('@/views/book/Form.vue'),
        meta: { requiresAuth: true }
      },
      {
        path: 'settings',
        name: 'Settings',
        component: () => import('@/views/settings/GeneralSetting.vue'),
        meta: { requiresAuth: true }
      }
    ]
  },

  /**
   * Auth & Error Pages
   */
  {
    path: '/pages',
    redirect: '/pages/404',
    name: 'Pages',
    component: { render(c) { return c('router-view') } },
    children: [
      { path: '404', name: 'Page404', component: Page404, meta: { requiresAuth: false } },
      { path: '500', name: 'Page500', component: Page500, meta: { requiresAuth: false } },
      { path: 'login', name: 'Login', component: Login, meta: { requiresAuth: false } },
      { path: 'register', name: 'Register', component: Register, meta: { requiresAuth: false } }
    ]
  }
]

const router = new Router({
  linkActiveClass: 'active',
  scrollBehavior: () => ({ y: 0 }),
  routes,
  mode: 'history',
  base: '/admin/'
})

router.beforeEach((to, from, next) => {
  store.dispatch('mutedLoad', { loading: true })
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (store.getters.isLoggedIn) {
      next()
      return
    }
    next('/pages/login')
  } else {
    next()
  }
})

router.afterEach(() => {
  store.dispatch('mutedLoad', { loading: false })
})

export default router
