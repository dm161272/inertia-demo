<template>

<div>
  <Component 
    :is="link.url ? 'Link' : 'span'"
    v-for="link in links"
    :href="link.url" 
    v-html="link.label" 
    
    class="mx-2"
    :class="{ 'text-cyan-500':  link.url, 'text-gray-500': ! link.url, 'font-bold': link.active}"
    />
    </div> 
</template> 

<script>

import { Link } from '@inertiajs/vue3';

export default {

components: { Link },

props: {

    links: Array

    }

};

</script>