<template>
    <div class="min-h-screen flex items-center justify-center p-4"
        style="background: #0a0a0f; font-family: 'DM Sans', sans-serif;">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-semibold mb-2" style="color: #a855f7;">Melodify</h1>
                <p class="text-sm" style="color: #6b7280;">Crea tu cuenta gratis</p>
            </div>

            <div class="rounded-2xl p-8" style="background: #111118; border: 1px solid rgba(255,255,255,0.06);">

                <form @submit.prevent="submit" class="space-y-5">

                    <div>
                        <label class="block text-xs font-medium uppercase tracking-widest mb-2" style="color: #6b7280;">
                            Nombre
                        </label>
                        <input
                            v-model="form.name"
                            type="text"
                            required
                            placeholder="Tu nombre"
                            class="w-full rounded-xl px-4 py-3 text-sm outline-none transition"
                            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); color: #f1f0f5;"
                        />
                        <p v-if="form.errors.name" class="mt-1.5 text-xs" style="color: #f87171;">
                            {{ form.errors.name }}
                        </p>
                    </div>

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
                            placeholder="Mínimo 8 caracteres"
                            class="w-full rounded-xl px-4 py-3 text-sm outline-none transition"
                            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); color: #f1f0f5;"
                        />
                        <p v-if="form.errors.password" class="mt-1.5 text-xs" style="color: #f87171;">
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-xs font-medium uppercase tracking-widest mb-2" style="color: #6b7280;">
                            Confirmar contraseña
                        </label>
                        <input
                            v-model="form.password_confirmation"
                            type="password"
                            required
                            placeholder="Repite la contraseña"
                            class="w-full rounded-xl px-4 py-3 text-sm outline-none transition"
                            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); color: #f1f0f5;"
                        />
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full py-3 rounded-xl text-sm font-medium transition"
                        style="background: #7c3aed; color: white;"
                    >
                        {{ form.processing ? 'Creando cuenta...' : 'Crear cuenta' }}
                    </button>

                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs" style="color: #6b7280;">
                        ¿Ya tienes cuenta?
                        <Link :href="route('login')" style="color: #a855f7;">Iniciar sesión</Link>
                    </p>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post('/register')
}
</script>
