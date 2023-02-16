/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
    window.Vue = require('vue');

    // importiamo il componente App
    import App from './views/App';

    const app = new Vue({
        el: '#root',
        render: h => h(App), // renderizziamo App all'avvio di Vue
    });
