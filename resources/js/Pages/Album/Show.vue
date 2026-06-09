<template>
    <AppLayout>

        <!-- Header del álbum -->
        <div class="flex items-center gap-6 mb-10">

            <!-- portada del álbum o icono por defecto -->
            <div v-if="album.cover" class="shrink-0">
                <img :src="album.cover" class="w-32 h-32 rounded-2xl object-cover" />
            </div>
            <div v-else class="w-32 h-32 rounded-2xl flex items-center justify-center text-4xl font-semibold shrink-0"
                style="background: rgba(168,85,247,0.1); color: #a855f7;">
                {{ album.title[0] }}
            </div>
            <div>
                <!-- tipo del álbum en mayúsculas pequeñas -->
                <p style="color: white;">{{ album.type.toUpperCase() }}</p>
                <!-- título del álbum grande -->
                <p style="color: white;" class="text-2xl">{{ album.title }}</p>
                <!-- link al artista en violeta -->
                <div class="flex gap-1 flex-wrap">
                    <span v-for="(artist, index) in album.artists" :key="artist.id">
                        <Link :href="route('artists.show', artist.id)" style="color: #a855f7;">
                            {{ artist.name }}
                        </Link>
                        <span v-if="index < album.artists.length - 1" style="color: #6b7280;"> · </span>
                    </span>
                </div>
                <!-- año de lanzamiento · número de canciones -->
                <p style="color: #6b7280;">{{ album.release_date?.slice(0, 4) }} · {{ album.songs.length }} canciones
                </p>
            </div>
        </div>

        <!-- Lista de canciones -->
        <div class="rounded-2xl overflow-hidden" style="background: #16161f;">

            <!-- Cabecera de la tabla -->
            <div class="px-5 py-3 grid grid-cols-12 text-xs uppercase tracking-widest"
                style="color: #6b7280; border-bottom: 1px solid rgba(255,255,255,0.06);">
                <span class="col-span-1">#</span>
                <span class="col-span-6">Título</span>
                <div class="col-span-1 flex justify-center">

                </div>
                <span class="col-span-2 text-right">Plays</span>
                <span class="col-span-2 text-right">Duración</span>
            </div>

            <!-- aquí itera las canciones del álbum -->
            <Link v-for="(song, index) in album.songs" :key="song.id" @click="player.play({ ...song, album: album })">
                <div class="px-5 py-3 grid grid-cols-12 text-xs tracking-widest" style="color: #6b7280;">
                    <span class="col-span-1">{{ index + 1 }}</span>
                    <span class="col-span-6">{{ song.title }}</span>
                    <!-- Botón like -->
                    <div class="col-span-1 flex justify-center">
                        <form :action="route('songs.like', song.id)" method="POST" @submit.prevent="submitLike(song.id)"
                            @click.stop>
                            <button type="submit">
                                <svg class="w-4 h-4 transition"
                                    :style="localLikedIds.includes(song.id) ? 'color: #a855f7;' : 'color: #6b7280;'"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <span class="col-span-2 text-right">{{ song.play_count }}</span>
                    <span class="col-span-2 text-right">{{ formatDuration(song.duration) }}</span>
                </div>
            </Link>

        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { usePlayerStore } from '@/stores/player'
import { ref } from 'vue'

const player = usePlayerStore()

const props = defineProps({
    album: Object,
    likedSongIds: {
        type: Array,
        default: () => []
    },
})

const localLikedIds = ref([...props.likedSongIds])

console.log('likedSongIds from server:', props.likedSongIds)
console.log('localLikedIds:', localLikedIds.value)

const submitLike = (songId) => {
    if (localLikedIds.value.includes(songId)) {
        localLikedIds.value = localLikedIds.value.filter(id => id !== songId)
    } else {
        localLikedIds.value.push(songId)
    }

    router.post(route('songs.like', songId), {}, {
        preserveScroll: true,
        preserveState: true,
    })
}

const formatDuration = (seconds) => {
    if (!seconds) return '--:--'
    const minutes = Math.floor(seconds / 60)
    const resto = seconds % 60
    return `${minutes}:${resto.toString().padStart(2, '0')}`
}
</script>
