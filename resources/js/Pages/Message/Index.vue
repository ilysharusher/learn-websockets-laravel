<script setup>
defineProps({
    'messages': {
        type: Array
    }
})
</script>

<template>
    <div class="container mx-auto my-4 px-4">
        <div v-if="messages.length">
            <h3>Message</h3>
            <div v-for="(message, id) in messages" :key="id">
                {{ message.id }} - {{ message.message }} - {{ message.time }}
            </div>
        </div>
        <div class="my-3">
            <div>
                <input class="rounded-2xl" type="text" placeholder="Message">
            </div>
            <div>
                <button href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl my-3">
                    Send
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
