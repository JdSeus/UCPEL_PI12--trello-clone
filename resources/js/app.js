import Main from './Main.js';

Main.main();

window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';