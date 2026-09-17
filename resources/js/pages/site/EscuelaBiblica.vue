<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

interface Nivel {
    numero: string;
    nombre: string;
    descripcion: string;
    duracion: string;
}

// TODO: reemplazar con los niveles/cursos reales de la escuela bíblica.
const niveles: Nivel[] = [
    {
        numero: '01',
        nombre: 'Fundamentos de la fe',
        descripcion: 'Bases doctrinales para todo creyente que inicia su formación bíblica.',
        duracion: '3 meses',
    },
    {
        numero: '02',
        nombre: 'Formación de líderes',
        descripcion: 'Herramientas de liderazgo, enseñanza y servicio dentro de la congregación.',
        duracion: '4 meses',
    },
    {
        numero: '03',
        nombre: 'Preparación ministerial',
        descripcion: 'Para quienes se preparan para el pastorado u otro ministerio formal.',
        duracion: '6 meses',
    },
];

const pasos = [
    {
        titulo: 'Habla con tu pastor',
        descripcion: 'Todo alumno inicia el proceso con la recomendación de su pastor local.',
    },
    {
        titulo: 'Completa tu inscripción',
        descripcion: 'Llena el formulario regional con tus datos y el nivel al que postulas.',
    },
    {
        titulo: 'Recibe la confirmación',
        descripcion: 'La coordinación de la escuela te contactará con el horario y el local asignado.',
    },
];
</script>

<template>
    <Head title="Escuela Bíblica — Región La Libertad 3" />

    <!-- HERO -->
    <section class="mx-auto grid max-w-6xl grid-cols-1 items-center gap-12 px-6 py-20 lg:px-8 md:grid-cols-[1.15fr_0.85fr] md:py-24">
        <div>
            <p class="mb-4 text-sm text-[#A84A2A]">Formación regional</p>
            <h1 class="mb-6 max-w-lg text-4xl leading-tight md:text-5xl" style="font-family:'Fraunces', serif">
                Escuela Bíblica de la región.
            </h1>
            <p class="mb-8 max-w-md text-[15px] text-[#706f6c]">
                Un espacio de formación permanente para todo creyente que quiere conocer más
                la Palabra y prepararse para servir en su iglesia local.
            </p>
            <a href="#inscripcion" class="inline-block rounded-sm bg-[#1b1b18] px-6 py-3 text-sm text-[#EFEAE0]">
                Cómo inscribirme
            </a>
        </div>
        <div class="h-72 md:h-96">
            <svg viewBox="0 0 300 380" class="h-full w-full">
                <path d="M60 40 H240 V340 H60 Z" fill="none" stroke="#1B2A3C" stroke-width="1.5" />
                <line x1="90" y1="80" x2="210" y2="80" stroke="#A84A2A" stroke-width="1.5" />
                <line x1="90" y1="120" x2="210" y2="120" stroke="#A84A2A" stroke-width="1.5" />
                <line x1="90" y1="160" x2="180" y2="160" stroke="#A84A2A" stroke-width="1.5" />
                <line x1="90" y1="220" x2="210" y2="220" stroke="#B8901F" stroke-width="1.5" />
                <line x1="90" y1="260" x2="210" y2="260" stroke="#B8901F" stroke-width="1.5" />
                <line x1="90" y1="300" x2="180" y2="300" stroke="#B8901F" stroke-width="1.5" />
            </svg>
        </div>
    </section>

    <!-- NIVELES -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
            <h2 class="mb-2 text-2xl" style="font-family:'Fraunces', serif">Niveles de formación</h2>
            <p class="mb-10 max-w-lg text-sm text-[#706f6c]">
                El proceso está pensado como una secuencia: cada nivel prepara para el siguiente.
            </p>

            <div class="grid grid-cols-1 gap-px border border-[#1B2A3C]/10 bg-[#1B2A3C]/10 md:grid-cols-3">
                <div v-for="nivel in niveles" :key="nivel.numero" class="flex flex-col justify-between bg-[#EFEAE0] p-7">
                    <div>
                        <span class="text-xs text-[#A84A2A]" style="font-family:'Fraunces', serif">{{ nivel.numero }}</span>
                        <h3 class="mt-5 text-xl" style="font-family:'Fraunces', serif">{{ nivel.nombre }}</h3>
                        <p class="mt-2 text-sm text-[#706f6c]">{{ nivel.descripcion }}</p>
                    </div>
                    <p class="mt-6 text-xs text-[#3C4E63]">Duración: {{ nivel.duracion }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- HORARIOS -->
    <section class="border-t border-[#1B2A3C]/10 bg-[#1B2A3C] text-[#EFEAE0]">
        <div class="mx-auto grid max-w-6xl grid-cols-1 gap-10 px-6 py-16 lg:px-8 md:grid-cols-2">
            <div class="border-l-2 border-[#B8901F] pl-6">
                <p class="mb-3 text-[11px] text-[#C9BFA8]">Horario</p>
                <p class="text-lg leading-relaxed" style="font-family:'Fraunces', serif">
                    Clases todos los sábados, de 3:00 p.m. a 6:00 p.m., en la sede regional.
                </p>
            </div>
            <div class="border-l-2 border-[#B8901F] pl-6">
                <p class="mb-3 text-[11px] text-[#C9BFA8]">Requisitos</p>
                <p class="text-lg leading-relaxed" style="font-family:'Fraunces', serif">
                    Ser parte de una iglesia de la región y contar con la recomendación de tu pastor.
                </p>
            </div>
        </div>
    </section>

    <!-- COMO INSCRIBIRSE -->
    <section id="inscripcion" class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
        <h2 class="mb-10 text-2xl" style="font-family:'Fraunces', serif">Cómo inscribirte</h2>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <div v-for="(paso, i) in pasos" :key="paso.titulo" class="border-t border-[#1B2A3C]/15 pt-5">
                <p class="mb-3 text-xs text-[#A84A2A]">Paso {{ i + 1 }}</p>
                <h3 class="mb-2 text-lg" style="font-family:'Fraunces', serif">{{ paso.titulo }}</h3>
                <p class="text-sm text-[#706f6c]">{{ paso.descripcion }}</p>
            </div>
        </div>

        <a
            href="#"
            class="mt-12 inline-block rounded-sm bg-[#1b1b18] px-6 py-3 text-sm text-[#EFEAE0]"
        >
            Llenar formulario de inscripción
        </a>
    </section>
</template>
