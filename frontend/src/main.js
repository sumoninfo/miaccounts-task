import "bootstrap/dist/css/bootstrap.min.css"
import {createApp} from 'vue'
import './style.css'
import App         from './App.vue'
import router      from './router'


//services
import ApiService from './services/api.service.js'

ApiService.init();
//global functions
import filters    from './helpers/filters'

const app                            = createApp(App)
app.config.globalProperties.$filters = filters
app.use(router).mount('#app')
