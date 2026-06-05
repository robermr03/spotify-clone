<template>
    <AppLayout>
        <!-- Header del artista -->
        <div class="flex items-center gap-6 mb-10">
            <div v-if="artist.image" class="shrink-0">
                <img :src="artist.image" class="w-24 h-24 rounded-full object-cover">
            </div>
            <div v-else class="w-24 h-24 rounded-full flex items-center justify-center text-3xl font-semibold shrink-0"
                style="background: rgba(168, 85, 247, 0.15); color: #a855f7">
                {{ artist.name[0] }}
            </div>
            <div>
                <p class="text-xs uppercase tracking-widest mb-1" style="color: #6b7280">
                    Artista
                </p>
                <h1 class="text-3xl font-semibold" style="color: #f1f0f5">
                    {{ artist.name }}
                </h1>
                <p class="text-sm mt-1" style="color: #6b7280">
                    {{ artist.country }}
                </p>

                <p v-if="artist.bio" class="text-sm mt-3 max-w-lg" style="color: #9ca3af">{{ artist.bio }}</p>
            </div>
        </div>

        <!-- Álbumes -->
        <section>
            <h2 class="text-lg font-medium mb-4" style="color: #f1f0f5">
                Discografía
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <Link v-for="album in artist.albums" :key="album.id" :href="route('albums.show', album.id)"
                    class="flex items-center gap-4 p-4 rounded-2xl transition cursor-pointer hover:opacity-80"
                    style="background: #16161f">
                    <div v-if="album.cover">
                        <img :src="album.cover" class="w-14 h-14 rounded-xl" alt="">
                    </div>
                    <div v-else class="w-14 h-14 rounded-xl flex items-center justify-center shrink-0"
                        style="background: rgba(168, 85, 247, 0.1)">
                        <svg class="w-6 h-6" style="color: #a855f7" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm font-medium truncate" style="color: #f1f0f5">
                            {{ album.title }}
                        </p>
                        <p class="text-xs mt-0.5" style="color: #6b7280">
                            {{ album.type }} ·
                            {{ album.songs.length }} canciones
                        </p>
                    </div>
                </Link>
            </div>
        </section>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

// define las props que necesitas
defineProps({
    artist: Object,
});
// define las funciones que necesitas
</script>
