<template>
    <div class="fixed bottom-0 left-0 right-0 h-20 flex items-center px-6 gap-6"
        style="background: #0d0d14; border-top: 1px solid rgba(255,255,255,0.06);">

        <!-- Sin canción -->
        <div v-if="!player.hasSong" class="w-full text-center">
            <p class="text-sm" style="color: #6b7280;">Ninguna canción reproduciéndose</p>
        </div>

        <!-- Con canción -->
        <template v-else>

            <!-- Info de la canción -->
            <div class="flex items-center gap-3 w-64 shrink-0">
                <div class="w-10 h-10 rounded-lg shrink-0 overflow-hidden flex items-center justify-center"
                    style="background: rgba(168,85,247,0.1);">
                    <img v-if="player.currentSong.album?.cover" :src="player.currentSong.album.cover"
                        class="w-10 h-10 object-cover" />
                    <svg v-else class="w-4 h-4" style="color: #a855f7;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-medium truncate" style="color: #f1f0f5;">{{ player.currentSong.title }}</p>
                    <p class="text-xs truncate" style="color: #6b7280;">{{ player.currentSong.artist?.name }}</p>
                </div>
            </div>

            <!-- Controles -->
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="flex items-center gap-4">
                    <button @click="player.toggle()"
                        class="w-8 h-8 rounded-full flex items-center justify-center transition"
                        style="background: #a855f7;">
                        <svg v-if="player.isPlaying" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" />
                        </svg>
                        <svg v-else class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>

                <!-- Barra de progreso -->
                <div class="w-full flex items-center gap-2">
                    <span class="text-xs shrink-0" style="color: #6b7280;">{{ formatTime(player.currentTime) }}</span>
                    <div class="flex-1 h-1 rounded-full cursor-pointer" style="background: rgba(255,255,255,0.1);"
                        @click="seekTo($event)">
                        <div class="h-1 rounded-full transition-all" style="background: #a855f7;"
                            :style="{ width: progressWidth }">
                        </div>
                    </div>
                    <span class="text-xs shrink-0" style="color: #6b7280;">{{ formatTime(player.duration) }}</span>
                </div>
            </div>

            <!-- Volumen -->
            <div class="flex items-center gap-2 shrink-0" style="width: 160px;">
                <svg class="w-4 h-4 shrink-0" style="color: #6b7280;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z" />
                </svg>
                <input type="range" min="0" max="1" step="0.01" :value="player.volume"
                    @input="player.setVolume(parseFloat($event.target.value))" style="width: 120px;"
                    class="accent-purple-500" />
            </div>

        </template>

    </div>
</template>

<script setup>
import { computed } from 'vue'
import { usePlayerStore } from '@/stores/player'

const player = usePlayerStore()

const progressWidth = computed(() => {
    if (!player.duration) return '0%'
    return `${(player.currentTime / player.duration) * 100}%`
})

const seekTo = (event) => {
    const bar = event.currentTarget
    const ratio = event.offsetX / bar.offsetWidth
    const time = ratio * player.duration
    player.seek(time)
}

const formatTime = (seconds) => {
    if (!seconds) return '0:00'
    const m = Math.floor(seconds / 60)
    const s = Math.floor(seconds % 60)
    return `${m}:${s.toString().padStart(2, '0')}`
}
</script>
