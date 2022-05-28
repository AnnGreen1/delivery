import { createApp } from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import Vant from 'vant'
import 'vant/lib/index.css'
import axios from '@/utils/https'
// import axios from 'axios'



const app = createApp(App)
app.config.globalProperties.$axios = axios
app.use(store).use(router).use(Vant).mount('#app')

// createApp(App).use(store).use(router).use(Vant).mount('#app')
