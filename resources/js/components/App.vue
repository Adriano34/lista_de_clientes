<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="w-12xl mx-auto sm:px-12 lg:px-12">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="d-flex">
                    <Lista ref="lista"></Lista>
                    <Formulario ref="formulario"></Formulario>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Lista from './Lista.vue';
    import Formulario from './Formulario.vue';

    export default {
        components: {
            Lista,
            Formulario
}       ,
        data() {
            return {
            }
        }
    }
</script>

<style>
    .d-flex {
        display: flex;
        justify-content: space-between;
    }

    .d-flex>div {
        padding: 50px;
    }
</style>