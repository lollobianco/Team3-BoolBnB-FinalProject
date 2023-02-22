/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
    window.Vue = require('vue');

    // importiamo il componente App
    import App from './views/App';

    /* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faBars, faUser, faMagnifyingGlass, faUserPen, faRightFromBracket } from '@fortawesome/free-solid-svg-icons'

import { faEye } from '@fortawesome/free-regular-svg-icons'


/* add icons to the library */
library.add(faBars, faUser, faMagnifyingGlass, faUserPen, faRightFromBracket, faEye)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

    import router from './routes.js'

    const app = new Vue({
        el: '#root',
        router,
        render: h => h(App), // renderizziamo App all'avvio di Vue
    });
