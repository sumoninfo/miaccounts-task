import "bootstrap/dist/css/bootstrap.min.css"
import {createApp} from 'vue'
import './style.css'
import App         from './App.vue'
import router      from './router'


//services
import ApiService from './services/api.service.js'

ApiService.init();

createApp(App).use(router).mount('#app')
