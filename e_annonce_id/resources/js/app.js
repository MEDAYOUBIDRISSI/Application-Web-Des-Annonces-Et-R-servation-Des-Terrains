/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueRouter)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyCfsuGBlL2-xHYwaF8LFGWEApuAvSZTz1Q',
    libraries: 'places',
  }
})

let routes = [
    { path:'/',component: require('./components/Home_1.vue').default },
    { path:'/home2',component: require('./components/Home_2.vue').default },
    { path:'/home3',component: require('./components/Home_3.vue').default },
    { path:'/home4',component: require('./components/Home_4.vue').default },
    { path:'/home5',component: require('./components/Home_5.vue').default },
    { path:'/detailclube/:clube_id',component: require('./components/DetailsClube.vue').default },
    { path:'/detailterrain/:terrain_id',component: require('./components/DetailTerrain.vue').default },
    { path:'/addimg/:terrain_id',component: require('./components/Addimg.vue').default },
    { path:'/booknow/:terrain_id',component: require('./components/BookNow.vue').default },
    { path:'/mesreservation',component: require('./components/MesReservation.vue').default },
    { path:'/mesinteresse/:publication_id',component: require('./components/MesInteresse.vue').default },
    { path:'/pack',component: require('./components/Pack.vue').default },
    { path:'/mesinteresse_all',component: require('./components/MesInteresseAll.vue').default },
    { path:'/mesinteresse_all/val',component: require('./components/MesInteresseAllval.vue').default },
    { path:'/mesinteresse_allpasval',component: require('./components/MesInteresseAllpasval.vue').default },
    { path:'/photos',component: require('./components/Photos.vue').default },
    { path:'/profile_auther/:user_id_user',component: require('./components/Profile_auther.vue').default },
    { path:'/photos_auther/:user_id_user',component: require('./components/Photos_auther.vue').default },
    { path:'/listreservation/:terrain_res',component: require('./components/ListReservation.vue').default },
    { path:'/allreservation',component: require('./components/AllReservation.vue').default },
    { path:'/chartd',component: require('./components/Chart_d.vue').default },
    // { path:'/lougout',beforeEnter(to, from, next) {window.location = "http://localhost:8000/lougout"}},
  ]

  const router=new VueRouter({
      routes
  })


  

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('types', require('./components/Types.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('sidebare', require('./components/Sidebare.vue').default);
Vue.component('sidebareleft', require('./components/SidebareLeft.vue').default);
Vue.component('writesomthing', require('./components/WriteSomthing.vue').default);
Vue.component('yourpage', require('./components/YourPage.vue').default);
Vue.component('shortcuts', require('./components/Shortcuts.vue').default);
Vue.component('whosfollownig', require('./components/WhosFollownig.vue').default);
Vue.component('recentactivity', require('./components/RecentActivity.vue').default);
Vue.component('status', require('./components/Status.vue').default);
Vue.component('chats', require('./components/Chats.vue').default);
Vue.component('coverphoto', require('./components/CoverPhoto.vue').default);
Vue.component('advertisment', require('./components/Advertisment.vue').default);
Vue.component('invitefriends', require('./components/InviteFriends.vue').default);
Vue.component('statusprofiel', require('./components/StatusProfiel.vue').default);
Vue.component('friendlist', require('./components/FriendList.vue').default);
Vue.component('listclube', require('./components/ListClube.vue').default);
Vue.component('logine', require('./components/Logine.vue').default);
Vue.component('home1', require('./components/Home_1.vue').default);
Vue.component('home2', require('./components/Home_2.vue').default);
Vue.component('home3', require('./components/Home_3.vue').default);
Vue.component('detailterrain', require('./components/DetailTerrain.vue').default);
Vue.component('fouterbootom', require('./components/Fouter.vue').default);
Vue.component('listterrain', require('./components/ListTerrain.vue').default);
Vue.component('addterrain', require('./components/AddTerrain.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
