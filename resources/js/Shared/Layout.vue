<template>


    <section class="p-4">
        <div class="bg-white max-w-3xl m-auto">
        <header class="flex justify-between">
        <h1 class="font-bold text-">
            
            My Inertia App

        </h1>

        <p class="text-sm m-auto">

            Welcome Back, {{ username }}!

        </p>
   

    <Nav />

 </header>

        </div>


</section> 

<section class="p-4">
    <div class="max-w-3xl mx-auto">

        <slot />

    </div>
    
</section>


</template>

<script>

import Nav from "./Nav.vue";

export default {

components: { Nav } ,

computed: {

    username() {

return this.$page.props.auth.user.username;

}
}
};
</script>