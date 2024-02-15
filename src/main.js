import { createApp } from 'vue'
import './main.scss'
import OptimatorApp from './App.vue'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

const { __, _x, _n, _nx } = wp.i18n;

const app = createApp(OptimatorApp);
// localize data bind
app.config.globalProperties.optimator = optimator;
//translator function bind
app.config.globalProperties.__ = __;
app.config.globalProperties._x = _x;
app.config.globalProperties._n = _n;
app.config.globalProperties._nx = _nx;
// component library bind
app.use(ElementPlus);
// app mount
app.mount('#optimator-dashboard-app');