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

      /**
       * Salon Management
       */
      {
        path: 'salon-management',
        redirect: 'salon-management/salon-requests',
        name: 'SalonManagement',
        component: { render(c) { return c('router-view') } },
        children: [
          {
            path: 'salon-requests',
            name: 'SalonRequests',
            component: () => import('@/views/salon-management/salon-requests/Requests.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'salon-list',
            name: 'SalonList',
            component: () => import('@/views/salon-management/salon-requests/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'salon-seats',
            name: 'SalonSeats',
            component: () => import('@/views/salon-management/sit/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'salon-seats/create',
            name: 'SalonSeatsCreate',
            component: () => import('@/views/salon-management/sit/Form.vue'),
            meta: { requiresAuth: true }
          }
        ]
      },

      /**
       * Customer Management
       */
      {
        path: 'customer-management',
        redirect: 'customer-management/customer-list',
        name: 'CustomerManagement',
        component: { render(c) { return c('router-view') } },
        children: [
          {
            path: 'customer-list',
            name: 'CustomerList',
            component: () => import('@/views/customer-management/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'customer-requests',
            name: 'CustomerRequests',
            component: () => import('@/views/customer-management/Requests.vue'),
            meta: { requiresAuth: true }
          }
        ]
      },

      /**
       * Service Management
       */
      {
        path: 'service-management',
        redirect: 'service-management/service-requests',
        name: 'ServiceManagement',
        component: { render(c) { return c('router-view') } },
        children: [
          {
            path: 'service-requests',
            name: 'ServiceRequests',
            component: () => import('@/views/service-management/Requests.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'approve-services',
            name: 'ApproveServices',
            component: () => import('@/views/service-management/Approve.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'cancel-services',
            name: 'CancelServices',
            component: () => import('@/views/service-management/Reject.vue'),
            meta: { requiresAuth: true }
          }
        ]
      },

      /**
       * System Settings
       */
      {
        path: 'system-settings',
        redirect: 'system-settings/general-setting',
        name: 'SystemSettings',
        component: { render(c) { return c('router-view') } },
        children: [
          {
            path: 'notification-setting',
            name: 'NotificationSetting',
            component: () => import('@/views/settings/NotificationSetting.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'general-setting',
            name: 'GeneralSetting',
            component: () => import('@/views/settings/GeneralSetting.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'services',
            name: 'SystemServices',
            component: () => import('@/views/settings/service/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'services/create',
            name: 'CreateSystemService',
            component: () => import('@/views/settings/service/Form.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'districts',
            name: 'ListDistricts',
            component: () => import('@/views/settings/district/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'districts/create',
            name: 'CreateDistrict',
            component: () => import('@/views/settings/district/Form.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'thanas',
            name: 'ListThanas',
            component: () => import('@/views/settings/thana/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'thanas/create',
            name: 'CreateThana',
            component: () => import('@/views/settings/thana/Form.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'areas',
            name: 'ListAreas',
            component: () => import('@/views/settings/area/List.vue'),
            meta: { requiresAuth: true }
          },
          {
            path: 'areas/create',
            name: 'CreateArea',
            component: () => import('@/views/settings/area/Form.vue'),
            meta: { requiresAuth: true }
          }
        ]
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
