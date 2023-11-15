<script setup>
import {ref} from "vue";

const props = defineProps({
    'messages': {
        type: Array
    }
});

const message = ref('');

function send() {
    axios.post(route('message.store'), {
        message: message.value
    }).then(response => {
        props.messages.unshift(response.data);
    }).catch(error => {
        console.log(error);
    });

    message.value = '';
}
</script>

<template>
    <div class="container mx-auto my-4 px-4">
        <div class="my-3">
            <input v-model="message" class="rounded-2xl" type="text" placeholder="Message">
            <button @click="send" class="ml-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl my-3">
                Send
            </button>
        </div>
        <div v-if="messages.length">
            <h3 class="font-bold mb-2">Messages</h3>
            <div class="border-b" v-for="(message, id) in messages" :key="id">
                {{ message.id }} - {{ message.message }} - {{ message.time }}
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
