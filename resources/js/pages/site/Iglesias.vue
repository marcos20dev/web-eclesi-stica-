<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

interface Iglesia {
    nombre: string;
    lugar: string;
    direccion: string;
    pastor: string;
    whatsapp: string;
    horario: string;
    aniversario?: string; // ej: '18 de octubre'
    foto?: string;
}

// TODO: reemplazar con los datos reales de cada iglesia de la región.
const iglesias: Iglesia[] = [
    {
        nombre: 'Iglesia central El Porvenir',
        lugar: 'El Porvenir, Trujillo',
        direccion: 'Av. Principal 123, El Porvenir',
        pastor: 'Pastor Local Uno',
        whatsapp: '51900000010',
        horario: 'Domingos 9:00 a.m. y 6:00 p.m.',
        aniversario: '18 de octubre',
    },
    {
        nombre: 'Iglesia Fe y Esperanza',
        lugar: 'Laredo',
        direccion: 'Jr. Los Álamos 456, Laredo',
        pastor: 'Pastora Local Dos',
        whatsapp: '51900000011',
        horario: 'Domingos 10:00 a.m.',
    },
    {
        nombre: 'Iglesia Monte Sion',
        lugar: 'Huanchaco',
        direccion: 'Calle Las Palmeras 789, Huanchaco',
        pastor: 'Pastor Local Tres',
        whatsapp: '51900000012',
        horario: 'Domingos 9:30 a.m. y 7:00 p.m.',
    },
];

const busqueda = ref('');

const iglesiasFiltradas = computed(() => {
    const q = busqueda.value.trim().toLowerCase();
    if (!q) return iglesias;
    return iglesias.filter(
        (i) =>
            i.nombre.toLowerCase().includes(q) ||
            i.lugar.toLowerCase().includes(q) ||
            i.pastor.toLowerCase().includes(q),
    );
});

function whatsappUrl(numero: string) {
    return `https://wa.me/${numero}`;
}

function mapaUrl(direccion: string) {
    return `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(direccion)}`;
}

function iniciales(nombre: string) {
    return nombre
        .split(' ')
        .filter((p) => p.length > 1)
        .slice(0, 2)
        .map((p) => p[0])
        .join('')
        .toUpperCase();
}
</script>

<template>
    <Head title="Iglesias — Región La Libertad 3" />

    <!-- INTRO -->
    <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
        <p class="mb-4 text-sm text-[#A84A2A]">Directorio</p>
        <h1 class="mb-6 max-w-xl text-4xl leading-tight md:text-5xl" style="font-family:'Fraunces', serif">
            Las iglesias que forman la región.
        </h1>
        <p class="mb-8 max-w-lg text-[15px] text-[#706f6c]">
            Encuentra la congregación más cercana, su horario de culto y cómo contactar a su pastor.
        </p>

        <div class="max-w-sm">
            <input
                v-model="busqueda"
                type="text"
                placeholder="Buscar por nombre, lugar o pastor..."
                class="w-full border border-[#1B2A3C]/20 bg-transparent px-4 py-2.5 text-sm placeholder:text-[#706f6c]/70 focus:border-[#1b1b18] focus:outline-none"
            />
        </div>
    </section>

    <!-- LISTADO -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto max-w-6xl px-6 py-10 lg:px-8">
            <p v-if="iglesiasFiltradas.length === 0" class="py-16 text-center text-sm text-[#706f6c]">
                No encontramos iglesias que coincidan con tu búsqueda.
            </p>

            <div v-else class="divide-y divide-[#1B2A3C]/10">
                <div
                    v-for="iglesia in iglesiasFiltradas"
                    :key="iglesia.nombre"
                    class="grid grid-cols-1 gap-6 py-8 md:grid-cols-[100px_1fr_auto] md:items-center"
                >
                    <div class="h-24 w-24 overflow-hidden rounded-sm">
                        <img
                            v-if="iglesia.foto"
                            :src="iglesia.foto"
                            :alt="iglesia.nombre"
                            class="h-full w-full object-cover"
                        />
                        <div
                            v-else
                            class="flex h-full w-full items-center justify-center bg-[#1B2A3C] text-xl text-[#EFEAE0]"
                            style="font-family:'Fraunces', serif"
                        >
                            {{ iniciales(iglesia.nombre) }}
                        </div>
                    </div>

                    <div>
                        <div class="mb-1 flex flex-wrap items-center gap-3">
                            <h2 class="text-lg" style="font-family:'Fraunces', serif">{{ iglesia.nombre }}</h2>
                            <span
                                v-if="iglesia.aniversario"
                                class="rounded-sm bg-[#F0DCCF] px-2.5 py-1 text-[10px] text-[#7C351D]"
                            >
                                Aniversario · {{ iglesia.aniversario }}
                            </span>
                        </div>
                        <p class="text-sm text-[#706f6c]">{{ iglesia.direccion }}</p>
                        <p class="text-sm text-[#706f6c]">{{ iglesia.horario }}</p>
                        <p class="mt-1 text-xs text-[#A84A2A]">Pastor: {{ iglesia.pastor }}</p>
                    </div>

                    <div class="flex gap-2 md:flex-col">
                        <a
                            :href="mapaUrl(iglesia.direccion)"
                            target="_blank"
                            rel="noopener"
                            class="rounded-sm border border-[#1b1b18] px-4 py-2 text-center text-xs transition-colors hover:bg-[#1b1b18] hover:text-[#EFEAE0]"
                        >
                            Ver en mapa
                        </a>
                        <a
                            :href="whatsappUrl(iglesia.whatsapp)"
                            target="_blank"
                            rel="noopener"
                            class="rounded-sm border border-[#1B2A3C]/20 px-4 py-2 text-center text-xs text-[#706f6c] transition-colors hover:border-[#1b1b18] hover:text-[#1b1b18]"
                        >
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
