import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomePage from './views/pages/HomePage.vue'
import AdvancedSearch from './views/pages/AdvancedSearch.vue'

const router = new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "home",
      component: HomePage,
    },
    {
      path: "/advaced-search",
      name: "advanced-search",
      component: AdvancedSearch,
      props: true,
    },
    // {
    //   path: "/services/:name",
    //   name: "services",
    //   component: ServicesSearch,
    // }
  ],
});

export default router;