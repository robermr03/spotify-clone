<template>
    <div class="min-h-screen flex items-center justify-center p-4"
        style="background: #0a0a0f; font-family: 'DM Sans', sans-serif;">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-semibold mb-2" style="color: #a855f7;">Melodify</h1>
                <p class="text-sm" style="color: #6b7280;">Inicia sesión para continuar</p>
            </div>

            <div class="rounded-2xl p-8" style="background: #111118; border: 1px solid rgba(255,255,255,0.06);">

                <form @submit.prevent="submit" class="space-y-5">

                    <div>
                        <label class="block text-xs font-medium uppercase tracking-widest mb-2" style="color: #6b7280;">
                            Email
                        </label>
                        <input
                            v-model="form.email"
                            type="email"
                            required
                            placeholder="tu@email.com"
                            class="w-full rounded-xl px-4 py-3 text-sm outline-none transition"
                            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); color: #f1f0f5;"
                        />
                        <p v-if="form.errors.email" class="mt-1.5 text-xs" style="color: #f87171;">
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-medium uppercase tracking-widest mb-2" style="color: #6b7280;">
                            Contraseña
                        </label>
                        <input
                            v-model="form.password"
                            type="password"
                            required
                            placeholder="••••••••"
                            class="w-full rounded-xl px-4 py-3 text-sm outline-none transition"
                            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); color: #f1f0f5;"
                        />
                        <p v-if="form.errors.password" class="mt-1.5 text-xs" style="color: #f87171;">
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" v-model="form.remember" id="remember" class="accent-purple-500" />
                        <label for="remember" class="text-xs" style="color: #6b7280;">Recuérdame</label>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full py-3 rounded-xl text-sm font-medium transition"
                        style="background: #7c3aed; color: white;"
                    >
                        {{ form.processing ? 'Iniciando sesión...' : 'Iniciar sesión' }}
                    </button>

                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs" style="color: #6b7280;">
                        ¿No tienes cuenta?
                        <Link :href="route('register')" style="color: #a855f7;">Crear cuenta</Link>
                    </p>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post('/login')
}
</script>
