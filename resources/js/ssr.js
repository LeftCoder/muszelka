import { createSSRApp, h } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createPinia } from 'pinia'
import createServer from '@inertiajs/server'

createServer((page) =>
  createInertiaApp({
    page,
    render: renderToString,
    title: (title) => (title ? `Muszelka - ${title}` : 'Muszelka'),
    resolve: (name) =>
      resolvePageComponent(
        `./pages/${name}.vue`,
        import.meta.glob('./pages/**/*.vue')
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
