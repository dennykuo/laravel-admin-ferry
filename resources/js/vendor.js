// jQuery
import jquery from 'jquery';
window.$ = jquery;
window.jQuery = jquery;

// htmx
import htmx from 'htmx.org';
window.htmx = htmx;

// Vue
import { createApp } from 'vue/dist/vue.esm-bundler.js';
window.Vue = { createApp: createApp };

// Noty
import Noty from 'noty';
window.Noty = Noty;

// vanillajs-datepicker
import { Datepicker } from 'vanillajs-datepicker';
import zhTW from 'vanillajs-datepicker/locales/zh-TW';
Object.assign(Datepicker.locales, zhTW); // 設定語系
window.Datepicker = Datepicker;
