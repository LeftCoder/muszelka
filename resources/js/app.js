import '../css/app.css'

import { createApp, h } from 'vue'
import { createPinia } from 'pinia'
import { load } from 'recaptcha-v3'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import axios from 'axios'
import GuestLayout from '@/layouts/Guest.vue'

load(import.meta.env.VITE_GOOGLE_RECAPTCHA_SITE_KEY, {
  autoHideBadge: true,
}).then(recaptcha => {
  window.captcha = recaptcha
})

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

createInertiaApp({
  title: title => (title ? `Muszelka - ${title}` : 'Muszelka'),
  resolve: async name => {
    const page = (
      await resolvePageComponent(
        `./pages/${name}.vue`,
        import.meta.glob('./pages/**/*.vue')
      )
    ).default

    if (page.layout === undefined) {
      page.layout = GuestLayout
    }

    return page
  },
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(plugin)
      .use(createPinia())
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)
  },
})

InertiaProgress.init({ color: '#f59e0b' })
