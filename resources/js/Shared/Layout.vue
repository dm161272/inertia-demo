<template>


    <section class="p-4">
        <div class="max-w-3xl m-auto" >
<header class="flex justify-between">
        <h1 class="font-bold">
            
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
    <div class="max-w-3xl mx-auto text-center mb-4">
        <DarkMode />
    </div>
    <div class="max-w-3xl mx-auto">

        <slot />

    </div>
    
</section>


</template>



<script>

import Nav from "./Nav.vue";
import DarkMode from "./DarkMode.vue";

export default {

components: { Nav, DarkMode } ,

computed: {

    username() {

return this.$page.props.auth.user.username;

}
}
};
</script>