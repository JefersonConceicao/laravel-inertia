<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    username: "",
    email: "",
    password: "",
    password_confirmation: "",
})

const submit = () => {
    form.post(route('users.store'), {
        onSuccess: () => form.reset()
    })
}
</script>

<template>

    <AppLayout title="Cadastrar usuário">
        <div class="container mx-auto">
            <div class="space-y-3">
                <div class="bg-white mt-2 border border-zinc-300 p-3">
                    <h2 class="font-semibold"> Cadastrar usuário </h2>
                </div>
                <div class="bg-white mt-2 border border-zinc-300 p-3">
                    <form @submit.prevent="submit">
                        <div class="space-y-3">
                            <div>
                                <InputLabel value="Nome do usuário" for="username" />
                                <TextInput class="w-full" id="username" v-model="form.username" />
                                <InputError class="mt-2" :message="form.errors.username" />
                            </div>
                            <div>
                                <InputLabel value="E-mail" for="email" />
                                <TextInput class="w-full" id="email" type="email" v-model="form.email" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div>
                                <InputLabel value="Senha" for="password" />
                                <TextInput class="w-full" type="password" name="password" v-model="form.password" />
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>
                            <div>
                                <InputLabel value="Confirme a senha" />
                                <TextInput
                                    class="w-full"
                                    name="password_confirmation"
                                    type="password"
                                    v-model="form.password_confirmation"
                                    />
                                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                            </div>
                            <div>
                                <PrimaryButton type="submit" :disabled="form.processing" :class="{ 'opacity-5' : form.processing }">
                                    Salvar
                                </PrimaryButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
