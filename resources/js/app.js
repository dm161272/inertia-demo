import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue',{ eager: true })
    let page = pages[`./Pages/${name}.vue`]

    page.default.layout = name.startsWith('Auth/') ? undefined : Layout
    return page

  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },

  progress: {
    // The delay after which the progress bar will appear
    // during navigation, in milliseconds.
    delay: 50,

    // The color of the progress bar.
    color: '#cd33ff',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true,
  },

  title: title => `Foo title! - ${title}`

});