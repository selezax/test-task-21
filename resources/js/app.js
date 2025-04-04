import './bootstrap';
import 'bootstrap';
import { createApp } from 'vue';
import i18n from '~/front/plugins/i18n';

const app = createApp({
    components: {
    }
});

app.use(i18n);
app.mount('#app');
