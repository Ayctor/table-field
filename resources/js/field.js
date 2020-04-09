Nova.booting((Vue, router, store) => {
  Vue.component('index-table-field', require('./components/IndexField'))
  Vue.component('detail-table-field', require('./components/DetailField'))
  Vue.component('form-table-field', require('./components/FormField'))
})
