import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

const opts = {
    theme: {
        dark: true,
        themes: {
            dark: {
                primary: '#24282F',
                secondary: '#E89241',
                accent: '#3C3E44',
                info: '#4CA0F0',
                success: '#37AA8C',
                error: '#AA3756',
                pink: '#F4909C',
                warning: '#FFC107'
            },
        },
    },
}

export default new Vuetify(opts)
