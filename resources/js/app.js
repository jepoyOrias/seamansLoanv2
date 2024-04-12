// Import necessary modules and styles
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { VueSignaturePad } from 'vue-signature-pad';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import "preline/preline";
import '../css/app.css';
import './bootstrap';

const appName = import.meta.env.VITE_APP_NAME || 'Seaman Loan Express';

// Create the Inertia app
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        // Create Vue app instance
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("VueSignaturePad",VueSignaturePad)

        // Add setup code for preline/preline
        app.mixin({
            mounted() {
                setTimeout(() => {
                    window.HSStaticMethods.autoInit();
                }, 100);
            }
        });

        // Mount the Vue app
        return app.mount(el);
    },
    progress:  {
        color: '#FDE047',
    },
});
    