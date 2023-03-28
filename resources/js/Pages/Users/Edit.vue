<template>

<Head title="Edit User" />

<h1 class="text-3xl">Edit User: {{ username }} </h1>
        <form @submit.prevent="submit" class="max-wd-md mx-auto mt-8">

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold
    text-xs text-gray-700" for="name"> Name </label>

    <input v-model="form.name"  class="border border-gray-400 p-2 w-full" 
    type="text"
    name = "name"
    id="name"
    required
    />

    

</div>

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold
    text-xs text-gray-700" for="email"> Email </label>

    <input v-model="form.email" class="border border-gray-400 p-2 w-full" 
    type="email"
    name = "email"
    id="email"
    required
   />

  
</div>


<div class="mb-6">
   <button type="submit"
   class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
   :disabled="form.processing">

   Submit changes

</button>

</div>

</form>

</template>

<script setup>

import { Head } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({ user: Object });
const username = props.user.name

let form = useForm({

name: props.user.name, 
email: props.user.email,

});

let submit = () => {

form.put(`/users/${props.user.id}`, props.user);

};
</script>

