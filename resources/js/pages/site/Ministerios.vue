<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

// Datos de ejemplo — reemplaza con los reales o conecta desde tu backend.
// "foto" espera una ruta como '/images/ministerios/nombre.jpg'; si no existe, se ve el fondo degradado.
const ministerios = [
    {
        nombre: 'Ministerio de Alabanza El Porvenir',
        iglesia: 'Iglesia central El Porvenir',
        foto: '/images/ministerios/el-porvenir.jpg',
        integrantes: ['Mateo Rodríguez', 'Lucía Fernández', 'Josué Ramírez', 'Ana Beltrán'],
        canciones: ['Digno es el Cordero', 'Renuévame', 'Grande y Fuerte'],
        whatsapp: '51987654321',
        facebook: 'https://facebook.com/alabanzaelporvenir',
        telefono: '+51 987 654 321',
    },
    {
        nombre: 'Ministerio de Alabanza Fe y Esperanza',
        iglesia: 'Iglesia Fe y Esperanza, Laredo',
        foto: '/images/ministerios/fe-y-esperanza.jpg',
        integrantes: ['Sofía Alvarado', 'Samuel Quiroz', 'Raquel Vega'],
        canciones: ['Way Maker', 'Cuán Grande es Él', 'Océanos'],
        whatsapp: '51987123456',
        facebook: 'https://facebook.com/alabanzafeyesperanza',
        telefono: '+51 987 123 456',
    },
    {
        nombre: 'Ministerio de Alabanza Monte Sion',
        iglesia: 'Iglesia Monte Sion, Huanchaco',
        foto: '/images/ministerios/monte-sion.jpg',
        integrantes: ['Ezequiel Paredes', 'Naomi Castillo', 'Daniel Chávez'],
        canciones: ['Reckless Love', 'Firme Estoy', 'Tu Nombre es Poder'],
        whatsapp: '51912345678',
        facebook: 'https://facebook.com/alabanzamontesion',
        telefono: '+51 912 345 678',
    },
];
</script>

<template>
    <Head title="Ministerios — Región La Libertad 3" />

    <!-- ENCABEZADO DE PÁGINA -->
    <section class="border-b border-[#211C16]/[0.08] bg-[#F6F1E7]">
        <div class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <p class="mb-3 flex items-center gap-3 text-[14px] text-[#B3852E]">
                <span class="h-px w-8 bg-[#B3852E]"></span>
                Ministerios
            </p>
            <h1 class="mb-5 max-w-2xl text-4xl leading-tight md:text-5xl" style="font-family: 'Fraunces', serif">
                Voces y talentos al servicio de la adoración.
            </h1>
            <p class="max-w-xl text-[15px] leading-relaxed text-[#6E6A5E]">
                Conoce a los equipos de alabanza que sirven en cada iglesia de la región y ponte en
                contacto con ellos directamente.
            </p>
        </div>
    </section>

    <!-- MINISTERIOS -->
    <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <article
                v-for="ministerio in ministerios"
                :key="ministerio.nombre"
                class="flex flex-col overflow-hidden border border-[#211C16]/[0.08]"
            >
                <!-- Foto -->
                <div
                    class="relative aspect-[4/3] w-full bg-[#1C2230] bg-cover bg-center"
                    :style="{ backgroundImage: `url(${ministerio.foto})` }"
                >
                    <div
                        class="absolute inset-0"
                        style="background: linear-gradient(180deg, transparent 50%, rgba(20, 24, 31, 0.7) 100%)"
                    ></div>
                </div>

                <div class="flex flex-1 flex-col gap-5 p-6">
                    <div>
                        <p
                            class="mb-1 text-lg leading-snug text-[#211C16]"
                            style="font-family: 'Fraunces', serif"
                        >
                            {{ ministerio.nombre }}
                        </p>
                        <p class="text-[13px] text-[#6E6A5E]">{{ ministerio.iglesia }}</p>
                    </div>

                    <!-- Integrantes -->
                    <div>
                        <p class="mb-1.5 text-[11px] uppercase tracking-wide text-[#B3852E]">Integrantes</p>
                        <p class="text-[13px] leading-relaxed text-[#4A4638]">
                            {{ ministerio.integrantes.join(' · ') }}
                        </p>
                    </div>

                    <!-- Canciones -->
                    <div>
                        <p class="mb-1.5 text-[11px] uppercase tracking-wide text-[#B3852E]">Repertorio</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span
                                v-for="cancion in ministerio.canciones"
                                :key="cancion"
                                class="rounded-full bg-[#211C16]/[0.05] px-2.5 py-0.5 text-[11px] text-[#4A4638]"
                            >
                                {{ cancion }}
                            </span>
                        </div>
                    </div>

                    <!-- Contacto -->
                    <div class="mt-auto flex items-center gap-3 border-t border-[#211C16]/[0.08] pt-5">
                        <a
                            :href="`https://wa.me/${ministerio.whatsapp}`"
                            target="_blank"
                            rel="noopener"
                            aria-label="Contactar por WhatsApp"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-[#25D366]/10 text-[#1DA851] transition-opacity hover:opacity-70"
                        >
                            <svg viewBox="0 0 24 24" class="h-[18px] w-[18px]" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.35 2 11.72c0 1.94.58 3.75 1.58 5.28L2 22l5.2-1.53a10.2 10.2 0 0 0 4.8 1.2c5.52 0 10-4.35 10-9.72C22 6.35 17.52 2 12 2zm0 17.6c-1.6 0-3.09-.44-4.36-1.2l-.31-.18-3.09.91.93-2.98-.2-.31a7.83 7.83 0 0 1-1.24-4.12C3.73 7.4 7.4 4 12 4s8.27 3.4 8.27 7.72S16.6 19.6 12 19.6zm4.53-5.78c-.25-.12-1.47-.72-1.7-.8-.23-.08-.39-.12-.56.12-.16.25-.64.8-.78.96-.14.16-.29.18-.54.06-.25-.12-1.04-.38-1.99-1.22-.73-.65-1.23-1.46-1.37-1.7-.14-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.14.16-.25.25-.41.08-.16.04-.31-.02-.43-.06-.12-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.42h-.48c-.16 0-.43.06-.65.31-.23.25-.86.84-.86 2.05s.88 2.38 1 2.54c.12.16 1.73 2.64 4.2 3.7.59.25 1.05.4 1.41.52.59.19 1.13.16 1.55.1.47-.07 1.47-.6 1.68-1.18.2-.58.2-1.08.14-1.18-.06-.1-.22-.16-.47-.28z"
                                />
                            </svg>
                        </a>
                        <a
                            :href="ministerio.facebook"
                            target="_blank"
                            rel="noopener"
                            aria-label="Ver Facebook"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-[#1877F2]/10 text-[#1877F2] transition-opacity hover:opacity-70"
                        >
                            <svg viewBox="0 0 24 24" class="h-[16px] w-[16px]" fill="currentColor">
                                <path
                                    d="M13.5 21v-8h2.7l.4-3.2h-3.1V7.8c0-.9.25-1.5 1.6-1.5h1.6V3.4C15.9 3.3 15 3.2 14 3.2c-2.1 0-3.6 1.3-3.6 3.7v2.1H8v3.2h2.4V21h3.1z"
                                />
                            </svg>
                        </a>
                        <a
                            :href="`tel:${ministerio.telefono}`"
                            aria-label="Llamar"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-[#211C16]/[0.06] text-[#211C16] transition-opacity hover:opacity-70"
                        >
                            <svg viewBox="0 0 24 24" class="h-[16px] w-[16px]" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"
                                />
                            </svg>
                        </a>
                        <span class="ml-auto text-[12px] text-[#6E6A5E]">{{ ministerio.telefono }}</span>
                    </div>
                </div>
            </article>
        </div>
    </section>
</template>
