<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, watch, watchEffect } from 'vue';

const {type, message } = defineProps({
    message: String,
    type: String
})

const backgroundColor = computed(() => ({
    'success': 'bg-green-400',
    'danger': 'bg-red-400',
}[type]))
</script>

<template>
    <div :class="`p-3 mb-3 text-white mt-3 mx-3 rounded-md ${backgroundColor}`">
        {{ message }}
    </div>
</template>
