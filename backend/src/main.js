import { createApp } from 'vue';
import store from './store';
import router from './router';
import './index.css';
import App from './App.vue';

library.add(faUser);

const app = createApp(App);

app.component('font-awesome-icon', FontAwesomeIcon);

app.use(store);
app.use(router);
app.mount('#app');
