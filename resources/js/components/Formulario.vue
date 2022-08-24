<template>
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <h2>{{tituloFormulario}}</h2>

        <form @submit.prevent="enviar">
            <div class="row">
                <div class="col-12">
                    <label>Nome: </label>
                    <input type="text" v-model="cliente.nome" class="form-control" />
                </div>
                <div class="col-12">
                    <label>RG: </label>
                    <input type="text" v-model="cliente.rg" class="form-control" />
                </div>
                <div class="col-12">
                    <label>E-mail: </label>
                    <input type="email" v-model="cliente.email" class="form-control" />
                </div>
                <div class="col-12">
                    <label>Telefone: </label>
                    <input type="text" v-model="cliente.telefone" class="form-control" />
                </div>
                <div class="col-12">
                    <label>Endereço: </label>
                    <input type="text" v-model="cliente.endereco" class="form-control" />
                </div>
                <div class="col-12">
                    <button class="btn btn-flat btn-primary">Salvar</button>
                    <button type="button" @click.prevent="limparFormulario" class="btn btn-flat btn-primary">Limpar</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                cliente: {
                    nome: null,
                    rg: null,
                    email: null,
                    telefone: null,
                    endereco: null,
                    foto: '/img/avatar.png'
                }
            }
        },
        methods: {
            enviar() {
                if (this.cliente.id) {
                    this.atualizar(this.cliente.id)
                } else {
                    this.cadastrar();
                }
            },
            cadastrar() {
                axios.post('/api/clientes', this.cliente)
                    .then(() => {
                        this.limparFormulario();
                        this.$parent.$refs.lista.carregarClientes();
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            alert(error.response.data.message)
                        }
                    })
            },
            editar(id) {
                axios.get(`/api/clientes/${id}`)
                    .then(response => {
                        this.cliente = response.data;
                        this.cliente.foto = '/img/avatar.png';
                    })
            },
            atualizar(id) {
                axios.put(`/api/clientes/${id}`, this.cliente)
                    .then(() => {
                        this.limparFormulario();
                        this.$parent.$refs.lista.carregarClientes();
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            alert(error.response.data.message)
                        }
                    })
            },
            limparFormulario() {
                this.cliente = {
                    nome: null,
                    rg: null,
                    email: null,
                    telefone: null,
                    endereco: null,
                    foto: '/img/avatar.png'
                }
            },
        },
        computed: {
            tituloFormulario() {
                return this.cliente.id ? 'Editar Cliente' : 'Cadastrar Cliente'
            }
        }
    }
</script>

<style scoped>
    label {
        font-weight: bold;
        margin-right: 10px;
    }

    .form-control {
        padding: 3px 7px;
        margin-bottom: 10px;
        text-align: right;
    }
</style>