import "./bootstrap";
import { createApp } from "vue";
import Vue from "vue";
import { BootstrapVue } from "bootstrap-vue";
import Example from "./components/Example.vue";
import Login from "./components/Login.vue";
// import "bootstrap-vue/dist/bootstrap-vue.css";
// import "bootstrap/scss/bootstrap.scss";

const app = createApp();
app.component("example", Example);
app.component("login", Login);
app.use(BootstrapVue);
app.mount("#app");
Vue.use(BootstrapVue);
