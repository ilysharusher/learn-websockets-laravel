<script setup>
import {ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps({
    'user': {
        type: Object
    }
});

const likes = ref('');

const like = () => {
    axios.post(route('user.store', props.user.id), {
        from_user_id: usePage().props.auth.user.id
    }).then(response => {
        likes.value = response.data.likeString;
    }).catch(error => {
        console.log(error);
    });
};
</script>

<template>
    <div class="container mx-auto my-4 px-4">
        <h1>{{ user.name }}</h1>
        <button @click="like" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl my-3">
            Send Like
        </button>
        <div v-if="likes" class="border-b">
            {{ likes }}
        </div>
    </div>
</template>

<style scoped>

</style>
