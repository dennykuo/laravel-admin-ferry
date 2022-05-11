// 日期&時間選單
// <vue-ctk-date-time-picker />
// https://github.com/chronotruck/vue-ctk-date-time-picker
//
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';

// 全局註冊組件，讓表單中元件可以 standalone
const app = Vue.createApp({});

app.component('vue-ctk-date-time-picker', VueCtkDateTimePicker);
