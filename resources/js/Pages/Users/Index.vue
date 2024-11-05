<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FlashSession from '@/Components/FlashSession.vue';

defineProps({
    users: {
        type: Array
    }
});
</script>

<template>
    <AppLayout title="Usuários">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuários
            </h2>
        </template>

        <div class="container mx-auto">

            <FlashSession :message="$props.page.flash.success" type="success" v-if="$props.page.flash.success"/>


            <div class="bg-white mt-3 text-black w-full rounded border border-zinc-300 p-3 ">
                <div class="flex justify-between">
                    <h2 class="font-semibold"> Lista de Usuários </h2>
                    <Link :href="route('users.create')">
                        <PrimaryButton :href="route('users.create')"> Cadastrar usuário </PrimaryButton>
                    </Link>
                </div>

                <div class="mt-3">
                    <table class="table-auto text-black border border-zinc-700 w-full">
                        <thead class="bg-zinc-500">
                            <tr class="text-sm text-white font-semibold">
                                <th class="px-3 border border-zinc-700"> Nome </th>
                                <th class="px-3 border border-zinc-700"> E-mail </th>
                                <th class="px-3 border w-1/6 border-zinc-700"> Ações </th>
                            </tr>
                        </thead>
                        <tbody class="bg-slate-100 text-black ">
                            <tr v-for="user in users" :key="user.id" class="text-sm  font-normal ">
                                <td class="border-x border-b border-zinc-700 pl-2"> {{ user.name }}</td>
                                <td class="border-x border-b border-zinc-700 pl-2"> {{ user.email }}</td>
                                <td class="text-center border-x border-b border-zinc-700 pl-2">
                                    <a class="bg-blue-500 py-1 inline-block px-3 my-2 mx-2 text-white rounded-full font-semibold hover:bg-slate-400">
                                        Editar
                                    </a>
                                    <Link :href="user.delete_user_link" class="bg-red-600 py-1 inline-block px-3 my-2 text-white rounded-full font-semibold hover:bg-slate-400">
                                        Excluir
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
