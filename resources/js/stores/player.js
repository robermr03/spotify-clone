import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

const audio = new Audio()

export const usePlayerStore = defineStore('player', () => {

    const currentSong  = ref(null)
    const isPlaying    = ref(false)
    const currentTime  = ref(0)
    const duration     = ref(0)
    const volume       = ref(1)

    const play = (song) => {
        console.log('song:', song)
        currentSong.value = song
        audio.src = song.file_url
        audio.play()
        isPlaying.value = true

        fetch(`/songs/${song.id}/play`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                'Content-Type': 'application/json',
            }
        })
    }

    const pause = () => {
        audio.pause()
        isPlaying.value = false
    }

    const toggle = () => {
        if (isPlaying.value) {
            pause()
        } else {
            audio.play()
            isPlaying.value = true
        }
    }

    const stop = () => {
        audio.pause()
        audio.src = ''
        currentSong.value = null
        isPlaying.value   = false
        currentTime.value = 0
        duration.value    = 0
    }

    const seek = (time) => {
        audio.currentTime = time
        currentTime.value = time
    }

    const setVolume = (vol) => {
        audio.volume = vol
        volume.value = vol
    }

    const hasSong = computed(() => currentSong.value !== null)

    return {
        currentSong,
        isPlaying,
        currentTime,
        duration,
        volume,
        play,
        pause,
        toggle,
        stop,
        seek,
        setVolume,
        hasSong,
    }
})

// Listeners fuera del store
const store = () => usePlayerStore()

audio.addEventListener('timeupdate', () => {
    store().currentTime = audio.currentTime
})

audio.addEventListener('loadedmetadata', () => {
    store().duration = audio.duration
})

audio.addEventListener('ended', () => {
    store().stop()
})
