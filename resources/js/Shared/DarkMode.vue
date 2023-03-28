// DarkMode.vue
<template>

   <div>
   <p>
    isDark: {{  isDark }}
   </p>
   <button 
    @click="toggleDark()" 
    class="px-4 py-2 text-white bg-gray-400 rounded">
    Toggle dark mode
   </button>
   </div>
  
</template>

<style>
html.dark {color-scheme: dark;}
html.light {color-scheme: light;}
</style>

<script setup >
import { useDark, useToggle } from '@vueuse/core'

const  isDark  = useDark(
   
)
const  toggleDark  = useToggle(isDark)
</script>
