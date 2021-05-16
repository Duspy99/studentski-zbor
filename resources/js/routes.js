
import Home from './views/Home.vue'
import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'


Vue.use(VueRouter)

export default{
  mode:'history',
  routes:[
    {
      path: '*',
      name:'ErrPage',
      component: () => import('./views/ErrPage.vue'),

    },
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/novosti',
      name: 'Novosti',
      component: () => import('./views/Novosti.vue')
    },
    {
      path: '/novosti/novost/:id',
      name: 'Novost',
      props:true,
      beforeEnter: (to, from, next) => {
        axios.get('/api/novosti/novost/' + to.params.id)
        .then(response => {
          next()
        }).catch(error => {
          next({ path: '/404' })
        })
      },
      component: () => import('./views/Novost.vue'),
    },
    {
      path: '/novosti/:id',
      name: 'Kategorije',
      props:true,
      beforeEnter: (to, from, next) => {
        axios.get('/api/novosti/' + to.params.id)
        .then(response => {
          next()
        }).catch(error => {
          next({ path: '/404' })
        })
      },
      component:() => import('./views/Kategorije'),
    },
    {
      path: '/trenutni-saziv',
      name: 'trenutni-saziv',
      component: () => import('./views/trenutni-saziv.vue')
    },
    {
      path: '/arhiva',
      name: 'Arhiva',
      component: () => import('./views/Arhiva.vue')
    },
    {
      path: '/dokumenti',
      name: 'Dokumenti',
      component: () => import('./views/Dokumenti.vue')
    },
    {
      path: '/kontakt',
      name: 'Kontakt',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/Kontakt.vue')
    },
   
  ],
  scrollBehavior() {
    return {x: 0, y: 0}
},
}

