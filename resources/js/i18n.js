import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)

function loadLocaleMessages() {
  const locales = import.meta.glob('./locales/*.json', { eager: true })
  const messages = {}

  Object.keys(locales).forEach(path => {
    const localeMatch = path.match(/([\w-]+)\.json$/)
    if (localeMatch) {
      const locale = localeMatch[1]
      messages[locale] = locales[path] // Assign the imported JSON content
    }
  })

  return messages
}

export default new VueI18n({
  locale: 'en', // Default language
  fallbackLocale: 'en', // Fallback language in case of missing translations
  messages: loadLocaleMessages()
})
