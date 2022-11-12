import { createSSRApp, h } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createPinia } from 'pinia'
import createServer from '@inertiajs/server'

const appName = 'Muszelka'

createServer((page) =>
  createInertiaApp({
    page,
    render: renderToString,
    title: (title) => `${appName} - ${title}`,
    resolve: (name) =>
      resolvePageComponent(
        `./Pages/${name}.vue`,
        import.meta.glob('./Pages/**/*.vue')
      ),
    setup({ app, props, plugin }) {
      return createSSRApp({ render: () => h(app, props) })
        .use(plugin)
        .use(createPinia())
        .component('Head', Head)
        .component('Link', Link)
    },
  })
)
