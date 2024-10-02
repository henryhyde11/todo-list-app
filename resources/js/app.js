import "./bootstrap";
import { createApp } from "vue";
import App from "./Components/App.vue";
import router from "./router";
import Swal from "sweetalert2";
import Login from './pages/auth/Login.vue';
import Register from './pages/auth/Register.vue';
import Home from './pages/Home.vue';

window.Swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});

window.toast = toast;

const app = createApp(App);

app.use(router);

app.component('Login', Login);
app.component('Register', Register);
app.component('Home', Home);

app.mount("#app");
