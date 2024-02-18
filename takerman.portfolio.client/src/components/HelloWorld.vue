<template></template>

<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
    async created() {
        await fetch('home/sendMessage', {
            method: 'POST',
            headers: {
                Accept: 'application.json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                Subject: 'test',
                Body: 'test',
                To: 'tivanov@takerman.net',
                From: 'test@test.com'
            }),
            cache: 'default'
        })
    }
});
</script>

<style scoped></style>