<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

// Datos de ejemplo — reemplaza con los reales o conecta desde tu backend.
const juntaDirectiva = [
    { nombre: 'Josué Ramírez', cargo: 'Presidente de jóvenes', iglesia: 'Iglesia central El Porvenir' },
    { nombre: 'Abigail Torres', cargo: 'Vicepresidenta', iglesia: 'Iglesia Fe y Esperanza' },
    { nombre: 'Daniel Chávez', cargo: 'Secretario', iglesia: 'Iglesia Monte Sion' },
    { nombre: 'Raquel Vega', cargo: 'Tesorera', iglesia: 'Iglesia central El Porvenir' },
];

const jovenes = [
    { nombre: 'Mateo Rodríguez', iglesia: 'Iglesia central El Porvenir', habilidades: ['Guitarra', 'Sonido'] },
    { nombre: 'Sofía Alvarado', iglesia: 'Iglesia Fe y Esperanza', habilidades: ['Canto', 'Danza'] },
    { nombre: 'Ezequiel Paredes', iglesia: 'Iglesia Monte Sion', habilidades: ['Batería', 'Edición de video'] },
    { nombre: 'Lucía Fernández', iglesia: 'Iglesia central El Porvenir', habilidades: ['Piano', 'Enseñanza'] },
    { nombre: 'Samuel Quiroz', iglesia: 'Iglesia Fe y Esperanza', habilidades: ['Bajo', 'Diseño gráfico'] },
    { nombre: 'Naomi Castillo', iglesia: 'Iglesia Monte Sion', habilidades: ['Canto', 'Fotografía'] },
];

// Iniciales para el avatar circular cuando no hay foto.
const iniciales = (nombre: string) =>
    nombre
        .split(' ')
        .slice(0, 2)
        .map((p) => p[0])
        .join('')
        .toUpperCase();
</script>

<template>
    <Head title="Jóvenes — Región La Libertad 3" />

    <!-- ENCABEZADO DE PÁGINA -->
    <section class="border-b border-[#211C16]/[0.08] bg-[#F6F1E7]">
        <div class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <p class="mb-3 flex items-center gap-3 text-[14px] text-[#B3852E]">
                <span class="h-px w-8 bg-[#B3852E]"></span>
                Jóvenes
            </p>
            <h1 class="mb-5 max-w-2xl text-4xl leading-tight md:text-5xl" style="font-family: 'Fraunces', serif">
                Una generación levantándose junta.
            </h1>
            <p class="max-w-xl text-[15px] leading-relaxed text-[#6E6A5E]">
                El ministerio de jóvenes reúne a chicas y chicos de todas las iglesias de la región,
                formándolos en liderazgo, dones y servicio.
            </p>
        </div>
    </section>

    <!-- JUNTA DIRECTIVA -->
    <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
        <h2 class="mb-10 text-2xl" style="font-family: 'Fraunces', serif">Junta directiva</h2>
        <div class="grid grid-cols-2 gap-x-8 gap-y-10 md:grid-cols-4">
            <div v-for="persona in juntaDirectiva" :key="persona.nombre">
                <div
                    class="mb-4 flex aspect-square items-center justify-center rounded-full bg-[#1C2230] text-xl text-[#F6F1E7]"
                    style="font-family: 'Fraunces', serif"
                >
                    {{ iniciales(persona.nombre) }}
                </div>
                <p class="text-[15px] text-[#211C16]">{{ persona.nombre }}</p>
                <p class="text-[13px] text-[#B3852E]">{{ persona.cargo }}</p>
                <p class="text-[12px] text-[#6E6A5E]">{{ persona.iglesia }}</p>
            </div>
        </div>
    </section>

    <!-- LISTA DE JÓVENES -->
    <section class="border-t border-[#211C16]/[0.08]">
        <div class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
            <div class="mb-10 flex flex-wrap items-end justify-between gap-4">
                <h2 class="text-2xl" style="font-family: 'Fraunces', serif">Jóvenes de la región</h2>
                <span class="text-[13px] text-[#6E6A5E]">{{ jovenes.length }} registrados</span>
            </div>

            <div class="grid grid-cols-1 gap-px bg-[#211C16]/[0.08] sm:grid-cols-2 lg:grid-cols-3">
                <div v-for="joven in jovenes" :key="joven.nombre" class="flex gap-4 bg-[#F6F1E7] p-6">
                    <div
                        class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-[#211C16]/[0.06] text-[13px] text-[#211C16]"
                        style="font-family: 'Fraunces', serif"
                    >
                        {{ iniciales(joven.nombre) }}
                    </div>
                    <div>
                        <p class="text-[15px] text-[#211C16]">{{ joven.nombre }}</p>
                        <p class="mb-2 text-[12px] text-[#6E6A5E]">{{ joven.iglesia }}</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span
                                v-for="habilidad in joven.habilidades"
                                :key="habilidad"
                                class="rounded-full border border-[#B3852E]/40 px-2.5 py-0.5 text-[11px] text-[#B3852E]"
                            >
                                {{ habilidad }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
