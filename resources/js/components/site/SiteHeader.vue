<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref, watch } from 'vue';
import {
    home,
    nosotros,
    pastores,
    iglesias,
    jovenes,
    ministerios,
    eventos,
    escuelaBiblica,
} from '@/routes';

const page = usePage();

const enlaces = [
    { label: 'Inicio', ruta: home },
    { label: 'Nosotros', ruta: nosotros },
    { label: 'Pastores', ruta: pastores },
    { label: 'Iglesias', ruta: iglesias },
    { label: 'Jóvenes', ruta: jovenes },
    { label: 'Ministerios', ruta: ministerios },
    { label: 'Eventos', ruta: eventos },
    { label: 'Escuela Bíblica', ruta: escuelaBiblica },
];

const esActivo = (url: string) => {
    if (url === '/') {
        return page.url === '/';
    }
    return page.url.startsWith(url);
};

const menuAbierto = ref(false);

const alternarMenu = () => {
    menuAbierto.value = !menuAbierto.value;
};

const cerrarMenu = () => {
    menuAbierto.value = false;
};

watch(
    () => page.url,
    () => {
        menuAbierto.value = false;
    },
);

const conScroll = ref(false);
const UMBRAL_SCROLL = 40;

const revisarScroll = () => {
    conScroll.value = window.scrollY > UMBRAL_SCROLL;
};

onMounted(() => {
    revisarScroll();
    window.addEventListener('scroll', revisarScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', revisarScroll);
});
</script>

<template>
    <header
        class="sticky top-0 z-50 transition-all duration-300"
        :class="
            conScroll
                ? 'bg-[#F6F1E7]/92 shadow-[0_1px_24px_rgba(33,28,22,0.08)] backdrop-blur-md'
                : 'bg-[#F6F1E7]/75 shadow-[0_1px_24px_rgba(33,28,22,0.05)] backdrop-blur-sm'
        "
    >
        <!-- Patrón geométrico diagonal oscuro -->
        <div class="pointer-events-none absolute inset-y-0 right-0 hidden w-40 overflow-hidden sm:block md:w-56">
            <div class="relative h-full w-full">
                <!-- Barra principal superior oscura -->
                <span
                    class="absolute right-6 top-2 h-[10px] w-36 -rotate-45 rounded-full"
                    style="background: linear-gradient(90deg, transparent 0%, rgba(28, 34, 48, 0.6) 50%, rgba(28, 34, 48, 0.95) 100%)"
                ></span>

                <!-- Barra oscura intermedia -->
                <span class="absolute right-16 top-9 h-2 w-24 -rotate-45 rounded-full bg-[#1C2230]/85"></span>

                <!-- Barra delgada oscura paralela -->
                <span
                    class="absolute right-3 top-10 h-[6px] w-16 -rotate-45 rounded-full bg-[#211C16]/50"
                ></span>

                <!-- Nueva barra oscura inferior -->
                <span
                    class="absolute right-10 top-16 h-[8px] w-28 -rotate-45 rounded-full bg-[#343A46]/70"
                ></span>

                <!-- Nueva barra corta decorativa -->
                <span
                    class="absolute right-24 top-4 h-[5px] w-10 -rotate-45 rounded-full bg-[#1C2230]/40"
                ></span>

                <!-- Círculo sin relleno en tono oscuro -->
                <span
                    class="absolute right-12 top-1 h-3 w-3 rounded-full border-2 border-[#1C2230]/75"
                ></span>

                <!-- Nuevo punto relleno oscuro -->
                <span class="absolute right-28 top-14 h-2 w-2 rounded-full bg-[#1C2230]/60"></span>
            </div>
        </div>

        <nav class="relative z-10 mx-auto flex max-w-6xl items-center justify-between px-6 py-5 lg:px-8">
            <!-- Logo e identidad -->
            <Link
                :href="home().url"
                class="flex items-center gap-3 rounded-sm outline-none focus-visible:ring-2 focus-visible:ring-[#B3852E]/50"
                @click="cerrarMenu"
            >
                <img src="/images/logo_iepp.png" alt="Región La Libertad 3" class="h-9 w-auto" />
                <div class="leading-tight">
                    <p class="text-[15px] font-medium text-[#211C16]">Región La Libertad 3</p>
                    <p class="text-[12px] text-[#6E6A5E]">Iglesia evangélica pentecostal del Perú</p>
                </div>
            </Link>

            <!-- Nav de escritorio -->
            <div class="hidden items-center gap-6 text-[14px] lg:flex">
                <Link
                    v-for="enlace in enlaces"
                    :key="enlace.label"
                    :href="enlace.ruta().url"
                    class="relative whitespace-nowrap rounded-sm py-1 outline-none transition-colors focus-visible:ring-2 focus-visible:ring-[#B3852E]/50"
                    :class="esActivo(enlace.ruta().url) ? 'font-semibold text-[#211C16]' : 'text-[#4A4638] hover:text-[#211C16]'"
                >
                    {{ enlace.label }}
                    <span
                        v-if="esActivo(enlace.ruta().url)"
                        class="absolute -bottom-[21px] left-0 h-[2px] w-full bg-[#B3852E]"
                    ></span>
                </Link>
            </div>

            <!-- Botón hamburguesa (mobile + tablet) -->
            <button
                type="button"
                class="relative z-20 flex h-9 w-9 flex-col items-center justify-center gap-[5px] rounded-sm outline-none focus-visible:ring-2 focus-visible:ring-[#B3852E]/50 lg:hidden"
                :aria-expanded="menuAbierto"
                aria-controls="menu-movil"
                :aria-label="menuAbierto ? 'Cerrar menú' : 'Abrir menú'"
                @click="alternarMenu"
            >
                <span
                    class="h-px w-5 bg-[#211C16] transition-transform duration-300"
                    :class="menuAbierto ? 'translate-y-[6px] rotate-45' : ''"
                ></span>
                <span
                    class="h-px w-5 bg-[#211C16] transition-opacity duration-200"
                    :class="menuAbierto ? 'opacity-0' : ''"
                ></span>
                <span
                    class="h-px w-5 bg-[#211C16] transition-transform duration-300"
                    :class="menuAbierto ? '-translate-y-[6px] -rotate-45' : ''"
                ></span>
            </button>
        </nav>

        <!-- Panel de menú móvil/tablet -->
        <Transition
            enter-active-class="transition-all duration-200 ease-out"
            leave-active-class="transition-all duration-150 ease-in"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-2"
        >
            <div
                v-if="menuAbierto"
                id="menu-movil"
                class="absolute inset-x-0 top-full z-40 border-t border-[#211C16]/[0.08] shadow-lg backdrop-blur-md lg:hidden"
                :class="conScroll ? 'bg-[#F6F1E7]/95' : 'bg-[#F6F1E7]/95'"
            >
                <div class="mx-auto flex max-w-6xl flex-col px-6 py-4">
                    <Link
                        v-for="enlace in enlaces"
                        :key="enlace.label"
                        :href="enlace.ruta().url"
                        class="border-b border-[#211C16]/[0.06] py-3.5 text-[15px] outline-none last:border-b-0 focus-visible:ring-2 focus-visible:ring-[#B3852E]/50"
                        :class="esActivo(enlace.ruta().url) ? 'font-semibold text-[#211C16]' : 'text-[#4A4638]'"
                        @click="cerrarMenu"
                    >
                        {{ enlace.label }}
                    </Link>
                </div>
            </div>
        </Transition>
    </header>
</template>
