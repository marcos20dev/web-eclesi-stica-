<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

interface Evento {
    titulo: string;
    fecha: string; // texto legible, ej: '14 de setiembre, 2026'
    hora?: string;
    lugar: string;
    descripcion: string;
    temario?: string[];
    inscripcionUrl?: string;
    materialUrl?: string;
    estado: 'proximo' | 'pasado';
}

// TODO: reemplazar con los eventos reales de la región.
const eventos: Evento[] = [
    {
        titulo: 'Seminario de liderazgo juvenil',
        fecha: '14 de setiembre, 2026',
        hora: '9:00 a.m. - 1:00 p.m.',
        lugar: 'Sede regional, Trujillo',
        descripcion: 'Un espacio de formación para líderes y encargados de los ministerios juveniles de cada iglesia de la región.',
        temario: [
            'Liderazgo con propósito',
            'Cómo pastorear a la generación actual',
            'Taller práctico de dinámicas juveniles',
        ],
        inscripcionUrl: '#',
        materialUrl: '#',
        estado: 'proximo',
    },
    {
        titulo: 'Congreso regional de damas',
        fecha: '3 de octubre, 2026',
        hora: '4:00 p.m.',
        lugar: 'Iglesia central El Porvenir',
        descripcion: 'Encuentro anual para las damas de todas las congregaciones de la región.',
        inscripcionUrl: '#',
        estado: 'proximo',
    },
    {
        titulo: 'Retiro de pastores',
        fecha: '12 de mayo, 2026',
        lugar: 'Casa de retiro, Huanchaco',
        descripcion: 'Tiempo de comunión y renovación espiritual para los pastores de la región.',
        materialUrl: '#',
        estado: 'pasado',
    },
];

const proximos = computed(() => eventos.filter((e) => e.estado === 'proximo'));
const pasados = computed(() => eventos.filter((e) => e.estado === 'pasado'));
</script>

<template>
    <Head title="Eventos — Región La Libertad 3" />

    <!-- INTRO -->
    <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
        <p class="mb-4 text-sm text-[#A84A2A]">Agenda regional</p>
        <h1 class="mb-6 max-w-xl text-4xl leading-tight md:text-5xl" style="font-family:'Fraunces', serif">
            Seminarios, congresos y encuentros de la región.
        </h1>
        <p class="max-w-lg text-[15px] text-[#706f6c]">
            Revisa el temario de cada evento, descarga el material disponible e inscríbete.
        </p>
    </section>

    <!-- PROXIMOS -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto max-w-6xl px-6 py-14 lg:px-8">
            <h2 class="mb-8 text-sm font-semibold text-[#706f6c]">Próximos eventos</h2>

            <div class="space-y-10">
                <article
                    v-for="evento in proximos"
                    :key="evento.titulo"
                    class="grid grid-cols-1 gap-6 border-b border-[#1B2A3C]/10 pb-10 md:grid-cols-[160px_1fr] last:border-b-0"
                >
                    <div class="border-l-2 border-[#B8901F] pl-4">
                        <p class="text-lg" style="font-family:'Fraunces', serif">{{ evento.fecha }}</p>
                        <p v-if="evento.hora" class="text-xs text-[#706f6c]">{{ evento.hora }}</p>
                        <p class="mt-1 text-xs text-[#706f6c]">{{ evento.lugar }}</p>
                    </div>

                    <div>
                        <h3 class="mb-2 text-2xl" style="font-family:'Fraunces', serif">{{ evento.titulo }}</h3>
                        <p class="mb-4 max-w-xl text-sm text-[#706f6c]">{{ evento.descripcion }}</p>

                        <div v-if="evento.temario?.length" class="mb-5">
                            <p class="mb-2 text-xs text-[#A84A2A]">Temario</p>
                            <ul class="space-y-1.5">
                                <li
                                    v-for="tema in evento.temario"
                                    :key="tema"
                                    class="border-l border-[#1B2A3C]/15 pl-3 text-sm text-[#3C4E63]"
                                >
                                    {{ tema }}
                                </li>
                            </ul>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <a
                                v-if="evento.inscripcionUrl"
                                :href="evento.inscripcionUrl"
                                class="rounded-sm bg-[#1b1b18] px-5 py-2.5 text-sm text-[#EFEAE0]"
                            >
                                Inscribirme
                            </a>
                            <a
                                v-if="evento.materialUrl"
                                :href="evento.materialUrl"
                                class="rounded-sm border border-[#1b1b18] px-5 py-2.5 text-sm"
                            >
                                Descargar material
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- PASADOS -->
    <section v-if="pasados.length" class="border-t border-[#1B2A3C]/10 bg-[#E4DDCD]/40">
        <div class="mx-auto max-w-6xl px-6 py-14 lg:px-8">
            <h2 class="mb-8 text-sm font-semibold text-[#706f6c]">Eventos pasados</h2>

            <div class="divide-y divide-[#1B2A3C]/10">
                <div
                    v-for="evento in pasados"
                    :key="evento.titulo"
                    class="flex flex-col justify-between gap-2 py-5 md:flex-row md:items-center"
                >
                    <div>
                        <h3 class="text-base" style="font-family:'Fraunces', serif">{{ evento.titulo }}</h3>
                        <p class="text-xs text-[#706f6c]">{{ evento.fecha }} · {{ evento.lugar }}</p>
                    </div>
                    <a
                        v-if="evento.materialUrl"
                        :href="evento.materialUrl"
                        class="text-xs text-[#A84A2A] underline underline-offset-4"
                    >
                        Ver material
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
