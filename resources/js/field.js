Nova.booting((Vue, router) => {
    Vue.component('index-nova-cpf-field', require('./components/IndexField'));
    Vue.component('detail-nova-cpf-field', require('./components/DetailField'));
    Vue.component('form-nova-cpf-field', require('./components/FormField'));
    Vue.component('index-nova-cnpj-field', require('./components/IndexField'));
    Vue.component('detail-nova-cnpj-field', require('./components/DetailField'));
    Vue.component('form-nova-cnpj-field', require('./components/FormField'));
})
