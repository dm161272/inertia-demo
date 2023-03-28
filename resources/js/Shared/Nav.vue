<template>

    <nav>
    <ul class="flex space-x-4" >

        <li>
            <NavLink href="/" :active = "$page.component === 'Home'" as='button' type='button'>
                Home
            </NavLink>
        </li>

        <li>
            <NavLink href="/users" :active = "$page.component === 'Users'" as='button' type='button' >
                Users
            </NavLink>
        </li>

        <li>
            <NavLink href="/settings" :active = "$page.component === 'Settings'" as='button' type='button' >
                Settings
            </NavLink>
        </li>

        <li>
            <NavLink href="/logout" method="POST" as='button' type='button'>
                Logout
            </NavLink>
    </li>

    </ul>
</nav>



</template>


<script>

import NavLink from "./NavLink.vue";

export default {

components: { NavLink },

};

</script>