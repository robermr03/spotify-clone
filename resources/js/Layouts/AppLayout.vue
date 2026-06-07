<template>
    <div class="min-h-screen" style="background: #0a0a0f; font-family: 'DM Sans', sans-serif;">

        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 h-full w-60 flex flex-col pb-20" style="background: #0d0d14; border-right: 1px solid rgba(255,255,255,0.06);">

            <!-- Logo -->
            <div class="px-6 py-7" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
                <h1 class="text-xl font-semibold" style="color: #a855f7; letter-spacing: -0.5px;">Melodify</h1>
                <p class="text-xs mt-0.5" style="color: #6b7280;">Tu música, tu mundo</p>
            </div>

            <!-- Nav -->
            <nav class="flex-1 px-3 py-4 space-y-1">
                <Link
                    v-for="item in navItems"
                    :key="item.route"
                    :href="route(item.route)"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200"
                    :style="isActive(item.route)
                        ? 'background: rgba(168,85,247,0.15); color: #a855f7;'
                        : 'color: #6b7280;'"
                >
                    <span v-html="item.icon" class="w-4 h-4 shrink-0"></span>
                    {{ item.label }}
                </Link>
            </nav>

            <!-- Usuario -->
            <div class="px-3 py-4" style="border-top: 1px solid rgba(255,255,255,0.06);">
                <div class="flex items-center gap-3 px-3 py-2 mb-1">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium shrink-0"
                        style="background: rgba(168,85,247,0.15); color: #a855f7; border: 1px solid rgba(168,85,247,0.2);">
                        {{ userInitials }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs font-medium truncate" style="color: #f1f0f5;">{{ $page.props.auth.user.name }}</p>
                        <p class="text-xs truncate" style="color: #6b7280;">{{ $page.props.auth.user.email }}</p>
                    </div>
                </div>
                <form @submit.prevent="logout">
                    <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 rounded-xl text-sm transition-all cursor-pointer"
                        style="color: #6b7280;">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Player inferior -->
        <Player/>

        <!-- Contenido principal -->
        <main class="ml-60 pb-20 p-8">
            <slot />
        </main>

    </div>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Player from '../Components/Player.vue'

const page = usePage()

const userInitials = computed(() => {
    return page.props.auth.user.name
        .split(' ')
        .map(n => n[0])
        .join('')
        .toUpperCase()
        .slice(0, 2)
})

const isActive = (routeName) => {
    return route().current(routeName)
}

const logout = () => {
    router.post('/logout')
}

const navItems = [
    {
        label: 'Inicio',
        route: 'dashboard',
        icon: '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>'
    },
    // {
    //     label: 'Buscar',
    //     route: 'search',
    //     icon: '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>'
    // },
    // {
    //     label: 'Tu biblioteca',
    //     route: 'library',
    //     icon: '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>'
    // },
    // {
    //     label: 'Canciones favoritas',
    //     route: 'liked',
    //     icon: '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>'
    // },
]
</script>
