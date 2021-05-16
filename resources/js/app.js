/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(require('bootstrap-vue'));
import Vue from 'vue';
import VueMeta from 'vue-meta'
import BootstrapVue from 'bootstrap-vue' //Importing

import App from './components/App';

import VueRouter from 'vue-router';
import routes from './routes';
import VueEasyLightBox from 'vue-easy-lightbox'



Vue.use(BootstrapVue) // Telling Vue to use this in whole application
Vue.use(VueEasyLightBox);
Vue.use(VueMeta)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('admin-novosti', require('./components/admin/Novosti.vue').default);
Vue.component('dodaj-novost', require('./components/admin/DodajNovost.vue').default);
Vue.component('sazivi', require('./components/admin/Sazivi.vue').default);
Vue.component('dodaj-saziv', require('./components/admin/DodajSaziv.vue').default);
Vue.component('clanovi-saziva', require('./components/admin/SazivClanovi.vue').default);
Vue.component('dodaj-clana-saziva', require('./components/admin/DodajClanaSaziva.vue').default);
Vue.component('stavke-saziva', require('./components/admin/SazivStavke.vue').default);
Vue.component('dodaj-stavku-saziva', require('./components/admin/DodajStavkuSaziva.vue').default);

Vue.component('datoteke-stavki-saziva',require('./components/admin/DatotekeStavkiSaziva.vue').default);
Vue.component('dodaj-datoteke-stavki-saziva',require('./components/admin/DodajDatotekeStavkiSaziva.vue').default);

Vue.component('dokumenti',require('./components/admin/Dokumenti.vue').default);
Vue.component('dodaj-dokument',require('./components/admin/DodajDokument.vue').default);
Vue.component('dokument-datoteke',require('./components/admin/DokumentDatoteke.vue').default);
Vue.component('dodaj-datoteku-dokumenta',require('./components/admin/DodajDatotekuDokumenta.vue').default);

Vue.component('admin-sponzori',require('./components/admin/Sponzori.vue').default);
Vue.component('admin-dodaj-sponzora',require('./components/admin/DodajSponzora.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{App},
    router:new VueRouter(routes)
    
});

