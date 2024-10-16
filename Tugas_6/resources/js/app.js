import { createApp } from "vue";
import EventList from "./components/EventList.vue";
import { BootstrapVue3 } from "bootstrap-vue-3"; // Hapus IconsPlugin jika tidak ada

// Import Bootstrap dan BootstrapVue CSS
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue-3/dist/bootstrap-vue-3.css"; // Pastikan path ini sesuai dengan versi BootstrapVue yang Anda gunakan

// Buat aplikasi Vue
const app = createApp(EventList);

// Install BootstrapVue
app.use(BootstrapVue3);
// Hapus baris di bawah ini jika Anda tidak memerlukan IconsPlugin
// app.use(IconsPlugin); // Hapus ini jika Anda tidak dapat menggunakan IconsPlugin

// Mount aplikasi ke elemen dengan id "app"
app.mount("#app");

// Jika Anda masih ingin menggunakan Alpine.js, biarkan ini:
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();
