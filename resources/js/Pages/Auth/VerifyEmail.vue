<script setup>
import { computed, ref } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});
const cooldownSeconds = ref(60); // Adjust the cooldown time in seconds
const cooldownActive = ref(false);

const submit = () => {
    if (!cooldownActive.value) {
        form.post(route('verification.send'));
        cooldownActive.value = true;
        setTimeout(() => {
            cooldownActive.value = false;
        }, cooldownSeconds.value * 1000);
    }
};



const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
            we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            A new verification link has been sent to the email address you provided during registration.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing || cooldownActive }" :disabled="form.processing || cooldownActive">
                    {{ cooldownActive ? `Resend in ${cooldownSeconds} seconds` : 'Resend Verification Email' }}
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
