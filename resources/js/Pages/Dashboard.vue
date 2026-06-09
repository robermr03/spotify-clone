<template>
    <AppLayout>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-semibold" style="color: #f1f0f5;">
                Bienvenido, {{ $page.props.auth.user.name.split(' ')[0] }} 👋
            </h1>
            <p class="text-sm mt-1" style="color: #6b7280;">¿Qué quieres escuchar hoy?</p>
        </div>


        <!-- Artistas destacados -->
        <section class="mb-10">
            <h2 class="text-lg font-medium mb-4" style="color: #f1f0f5;">Artistas destacados</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <Link
                    v-for="artist in artists"
                    :key="artist.id"
                    :href="route('artists.show', artist.id)"
                    class="flex flex-col items-center gap-3 p-4 rounded-2xl transition cursor-pointer"
                    style="background: #16161f;"
                >
                    <div v-if="artist.image" class="shrink-0">
                        <img :src="artist.image" class="w-16 h-16 rounded-full object-cover" alt="">
                    </div>
                    <div v-else class="w-16 h-16 rounded-full flex items-center justify-center text-xl font-semibold"
                        style="background: rgba(168,85,247,0.15); color: #a855f7;">
                        {{ artist.name[0] }}
                    </div>
                    <div class="text-center">
                        <p class="text-sm font-medium truncate w-full" style="color: #f1f0f5;">{{ artist.name }}</p>
                        <p class="text-xs mt-0.5" style="color: #6b7280;">{{ artist.songs_count }} canciones</p>
                    </div>
                </Link>
            </div>
        </section>

        <!-- Canciones recientes -->
        <section>
            <h2 class="text-lg font-medium mb-4" style="color: #f1f0f5;">Canciones recientes</h2>
            <div class="rounded-2xl overflow-hidden" style="background: #16161f;">
                <div
                    v-for="(song, index) in recentSongs"
                    :key="song.id"
                    class="flex items-center gap-4 px-5 py-3 transition cursor-pointer"
                    style="border-bottom: 1px solid rgba(255,255,255,0.04);"
                    @click="player.play({...song, album: song.album})"
                >
                    <span class="text-sm w-5 text-right shrink-0" style="color: #6b7280;">{{ index + 1 }}</span>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium truncate" style="color: #f1f0f5;">{{ song.title }}</p>
                        <p class="text-xs mt-0.5 truncate" style="color: #6b7280;">
                            {{ song.artists.map(a => a.name).join(', ') }} · {{ song.album.title }}
                        </p>
                    </div>

                    <span class="text-xs shrink-0" style="color: #6b7280;">
                        {{ formatDuration(song.duration) }}
                    </span>
                </div>
            </div>
        </section>

    </AppLayout>
</template>

<script setup>
import { usePlayerStore } from '@/stores/player'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'

const player = usePlayerStore()

defineProps({
    artists:     Array,
    recentSongs: Array,
})

const formatDuration = (seconds) => {
    if (!seconds) return '--:--'
    const m = Math.floor(seconds / 60)
    const s = seconds % 60
    return `${m}:${s.toString().padStart(2, '0')}`
}
</script>
