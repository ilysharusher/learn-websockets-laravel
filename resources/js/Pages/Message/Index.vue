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
        <div v-if="messages.length">
            <h3>Messages</h3>
            <div v-for="(message, id) in messages" :key="id">
                {{ message.id }} - {{ message.message }} - {{ message.time }}
            </div>
        </div>
        <div class="my-3">
            <div>
                <input v-model="message" class="rounded-2xl" type="text" placeholder="Message">
            </div>
            <div>
                <button @click="send" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl my-3">
                    Send
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
