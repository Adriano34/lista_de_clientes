<template>
    <div class="p-6">
        <h2>Clientes</h2>

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(cliente, index) in clientes" :key="index">
                    <td><img class="foto" :src="cliente.foto" /></td>
                    <td>{{ cliente.nome }}</td>
                    <td>{{ cliente.email }}</td>
                    <td>{{ cliente.telefone }}</td>
                    <td>
                        <button type="button" @click.prevent="editar(cliente.id)" class="btn btn-flat btn-primary">Editar</button>
                        <button type="button" @click.prevent="excluir(cliente.id)" class="btn btn-flat btn-danger">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        created() {
            this.carregarClientes();
        },
        data() {
            return {
                clientes: []
            }
        },
        methods: {
            carregarClientes() {
                axios.get('/api/clientes')
                    .then(response => {
                        this.clientes = response.data;
                    })
            },
            editar(id) {
                this.$parent.$refs.formulario.editar(id);
            },
            excluir(id) {
                let confirmacao = confirm('Tem certeza que deseja cancelar?');

                if (confirmacao) {
                    axios.delete(`/api/clientes/${id}`)
                        .then(() => {
                            this.carregarClientes();
                        })
                        .catch(error => {
                            alert('Não foi possível excluir o cliente.')
                        })
                }
            }
        }
    }
</script>

<style scoped>
    .foto {
        width: 50px;
        height: 50px;
    }
</style>