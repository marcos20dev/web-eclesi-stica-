<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { onMounted, ref, h } from 'vue';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

// Íconos SVG inline en Vue (sin depender de paquetes externos)
const IconoIglesia = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', strokeWidth: '1.75', stroke: 'currentColor', class: 'h-5 w-5' }, [
    h('path', { strokeLinecap: 'round', strokeLinejoin: 'round', d: 'M12 21v-4m0 0H8.25a2.25 2.25 0 01-2.25-2.25V7.125a2.25 2.25 0 01.659-1.591l5-5a2.25 2.25 0 013.182 0l5 5A2.25 2.25 0 0121 7.125V14.75A2.25 2.25 0 0118.75 17H12z' })
]);

const IconoPastores = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', strokeWidth: '1.75', stroke: 'currentColor', class: 'h-5 w-5' }, [
    h('path', { strokeLinecap: 'round', strokeLinejoin: 'round', d: 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z' })
]);

const IconoCalendario = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', strokeWidth: '1.75', stroke: 'currentColor', class: 'h-5 w-5' }, [
    h('path', { strokeLinecap: 'round', strokeLinejoin: 'round', d: 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5' })
]);

const IconoEducacion = () => h('svg', { xmlns: 'http://www.w3.org/2000/svg', fill: 'none', viewBox: '0 0 24 24', strokeWidth: '1.75', stroke: 'currentColor', class: 'h-5 w-5' }, [
    h('path', { strokeLinecap: 'round', strokeLinejoin: 'round', d: 'M4.26 10.147L12 14.6l7.74-4.453a1.125 1.125 0 000-1.946L12 3.75 4.26 8.201a1.125 1.125 0 000 1.946z' }),
    h('path', { strokeLinecap: 'round', strokeLinejoin: 'round', d: 'M6 12v5.25A2.25 2.25 0 008.25 19.5h7.5A2.25 2.25 0 0018 17.25V12' })
]);

const avisosNovedades = [
    {
        categoria: 'AVISO IMPORTANTE',
        titulo: 'Convocatoria a Asamblea Regional de Pastores',
        fecha: '18 de Setiembre',
        urgente: true,
    },
    {
        categoria: 'EVENTO PRÓXIMO',
        titulo: 'Inscripciones abiertas para el Seminario de Jóvenes',
        fecha: 'Hasta el 10 de Setiembre',
        urgente: false,
    },
    {
        categoria: 'COMUNICADO',
        titulo: 'Publicación de la nueva guía de estudios bíblicos 2026',
        fecha: 'Hace 2 días',
        urgente: false,
    },
];

const cifras = [
    {
        valor: '45+',
        etiqueta: 'Iglesias',
        descripcion: 'Establecidas en La Libertad 3',
        icono: IconoIglesia,
    },
    {
        valor: '120+',
        etiqueta: 'Pastores y Líderes',
        descripcion: 'Al servicio de la comunidad',
        icono: IconoPastores,
    },
    {
        valor: '15',
        etiqueta: 'Eventos Anuales',
        descripcion: 'Confraternidades y campamentos',
        icono: IconoCalendario,
    },
    {
        valor: '1,200+',
        etiqueta: 'Alumnos E.B.',
        descripcion: 'En la Escuela Bíblica',
        icono: IconoEducacion,
    },
];

const iglesias = [
    { nombre: 'Iglesia central El Porvenir', lugar: 'El Porvenir, Trujillo', aniversario: true },
    { nombre: 'Iglesia Fe y Esperanza', lugar: 'Laredo', aniversario: false },
    { nombre: 'Iglesia Monte Sion', lugar: 'Huanchaco', aniversario: false },
];

const testimonioDestacado = {
    texto: 'Dios ha sido fiel con nuestra congregación desde el primer día. Ver cómo la región camina unida nos ha enseñado que ninguna iglesia crece sola.',
    autor: 'Pastor, Iglesia Monte Sion',
};

const testimonios = [
    { texto: 'El seminario regional cambió mi manera de servir en el ministerio juvenil.', autor: 'Líder de jóvenes, Región La Libertad 3' },
    { texto: 'Ver crecer a la iglesia en Laredo ha sido un testimonio de gracia.', autor: 'Pastora, Iglesia Fe y Esperanza' },
];

const enlaces = [
    { titulo: 'Nosotros', desc: 'Misión, visión e historia de la región.', href: '/nosotros' },
    { titulo: 'Pastores', desc: 'Junta directiva, biografías y testimonios.', href: '/pastores' },
    { titulo: 'Iglesias', desc: 'Directorio de iglesias que integran la región.', href: '/iglesias' },
    { titulo: 'Eventos', desc: 'Seminarios, congresos e inscripciones.', href: '/eventos' },
];

const heroListo = ref(false);

onMounted(() => {
    requestAnimationFrame(() => {
        heroListo.value = true;
    });
});
</script>

<template>
    <Head title="Región La Libertad 3 — IEPP">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,340..600&display=swap"
            rel="stylesheet"
        />
    </Head>

    <!-- HERO CON VIDEO EN LOOP CONTINUO -->
    <section class="relative flex min-h-[85vh] sm:min-h-screen w-full items-center overflow-hidden bg-[#14181F] pt-20 pb-32 sm:pt-24 sm:pb-44">
        <div class="aurora absolute inset-0"></div>

        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <video
                autoplay
                loop
                muted
                playsinline
                class="absolute left-1/2 top-1/2 h-full w-full min-w-full min-h-full -translate-x-1/2 -translate-y-1/2 object-cover opacity-45"
            >
                <source src="/video/fondo_01.mp4" type="video/mp4" />
                Tu navegador no soporta reproducción de video.
            </video>
        </div>

        <div
            class="pointer-events-none absolute inset-0"
            style="background: linear-gradient(180deg, rgba(20,24,31,0.40) 0%, rgba(20,24,31,0.65) 50%, rgba(20,24,31,0.98) 100%);"
        ></div>

        <div class="relative z-10 mx-auto w-full max-w-[1536px] px-4 sm:px-8 lg:px-12 pb-8 sm:pb-12">
            <div
                class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 transition-all duration-[1100ms] ease-out"
                :class="heroListo ? 'translate-y-0 opacity-100' : 'translate-y-7 opacity-0'"
            >
                <!-- COLUMNA IZQUIERDA -->
                <div class="lg:col-span-7 xl:col-span-8">
                    <p class="mb-4 sm:mb-6 flex items-center gap-3 text-xs sm:text-[15px] text-[#E3C583]">
                        <span class="h-px w-8 bg-[#B3852E]"></span>
                        Iglesia evangélica pentecostal del Perú
                    </p>
                    <h1
                        class="mb-6 sm:mb-7 text-[2.75rem] leading-[1.05] text-[#F6F1E7] sm:text-[4rem] md:text-[4.75rem]"
                        style="font-family: 'Fraunces', serif; font-weight: 460"
                    >
                        Una región, muchas<br />iglesias, un mismo<br />llamado.
                    </h1>
                    <p class="mb-8 sm:mb-10 max-w-xl text-sm sm:text-[17px] leading-relaxed text-[#CFC8B8]">
                        Pastores, congregaciones y actividades de la Región La Libertad 3, unidas en un
                        solo propósito de servicio y fe.
                    </p>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8">
                        <a
                            href="/iglesias"
                            class="w-full sm:w-auto text-center rounded-sm bg-[#F6F1E7] px-8 py-3.5 text-sm font-medium text-[#14181F] transition-colors hover:bg-[#E3C583]"
                        >
                            Ver iglesias de la región
                        </a>
                        <a
                            href="/eventos"
                            class="w-full sm:w-auto text-center border-b border-transparent py-1 text-sm text-[#F6F1E7] transition-colors hover:border-[#B3852E] hover:text-[#E3C583]"
                        >
                            Próximos eventos
                        </a>
                    </div>
                </div>

                <!-- COLUMNA DERECHA: NOTICIAS / AVISOS -->
                <div class="lg:col-span-5 xl:col-span-4">
                    <div class="relative overflow-hidden rounded-md border border-[#B3852E]/30 bg-[#14181F]/40 p-6 sm:p-8 backdrop-blur-md shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                        <div class="pointer-events-none absolute -right-10 -top-10 h-36 w-36 rounded-full bg-[#B3852E]/15 blur-2xl"></div>

                        <div class="mb-5 flex items-center justify-between border-b border-[#F6F1E7]/10 pb-4">
                            <div class="flex items-center gap-2.5">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#E3C583] opacity-75"></span>
                                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-[#B3852E]"></span>
                                </span>
                                <h2 class="text-sm font-medium uppercase tracking-wider text-[#F6F1E7]">
                                    Noticias y Avisos
                                </h2>
                            </div>
                            <span class="text-[11px] text-[#CFC8B8]/70">Región LL3</span>
                        </div>

                        <div class="space-y-3.5">
                            <article
                                v-for="(item, idx) in avisosNovedades"
                                :key="idx"
                                class="group relative rounded-sm border border-[#F6F1E7]/5 bg-[#14181F]/30 p-4 transition-all hover:border-[#B3852E]/40 hover:bg-[#14181F]/60"
                            >
                                <div class="mb-1.5 flex items-center justify-between gap-2">
                                    <span
                                        class="text-[10px] font-semibold uppercase tracking-wider"
                                        :class="item.urgente ? 'text-[#E3C583]' : 'text-[#CFC8B8]/80'"
                                    >
                                        {{ item.categoria }}
                                    </span>
                                    <span class="text-[11px] text-[#CFC8B8]/60">{{ item.fecha }}</span>
                                </div>
                                <h3 class="text-sm font-medium leading-snug text-[#F6F1E7] group-hover:text-[#E3C583] transition-colors">
                                    {{ item.titulo }}
                                </h3>
                            </article>
                        </div>

                        <div class="mt-5 border-t border-[#F6F1E7]/10 pt-4 text-center">
                            <a
                                href="/eventos"
                                class="inline-flex items-center gap-1.5 text-xs text-[#E3C583] hover:text-[#F6F1E7] transition-colors"
                            >
                                <span>Ver todos los comunicados</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE CIFRAS MEJORADA -->
    <section class="relative z-20 mx-auto -mt-16 sm:-mt-24 max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 md:grid-cols-4">
            <div
                v-for="cifra in cifras"
                :key="cifra.etiqueta"
                class="group relative flex flex-col items-center justify-between overflow-hidden rounded-2xl bg-[#F6F1E7]/95 p-6 text-center shadow-[0_10px_30px_-10px_rgba(33,28,22,0.08)] backdrop-blur-md transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_20px_40px_-15px_rgba(33,28,22,0.15)]"
            >
                <!-- Línea decorativa dorada superior al hacer hover -->
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-[#B3852E] to-transparent opacity-40 transition-opacity duration-300 group-hover:opacity-100"></div>

                <!-- Ícono decorativo con fondo dorado transparente -->
                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-[#B3852E]/10 text-[#B3852E] transition-colors duration-300 group-hover:bg-[#B3852E] group-hover:text-[#F6F1E7]">
                    <component :is="cifra.icono" />
                </div>

                <!-- Valor Numérico -->
                <p class="text-3xl font-bold text-[#211C16] sm:text-4xl lg:text-5xl" style="font-family: 'Fraunces', serif">
                    {{ cifra.valor }}
                </p>

                <!-- Etiqueta Principal -->
                <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-[#211C16]/80 sm:text-[13px]">
                    {{ cifra.etiqueta }}
                </p>

                <!-- Subtítulo / Descripción -->
                <p v-if="cifra.descripcion" class="mt-1 text-[11px] text-[#6E6A5E] leading-snug">
                    {{ cifra.descripcion }}
                </p>
            </div>
        </div>
    </section>

    <!-- STRIP DINÁMICO -->
    <section class="mt-16 sm:mt-24 bg-[#1C2230] py-10 sm:py-12 text-[#EFEAE0]">
        <div class="mx-auto grid max-w-[1536px] grid-cols-1 gap-6 sm:gap-8 px-4 sm:px-8 lg:px-12 md:grid-cols-2">
            <div class="border-l border-[#B3852E] pl-5">
                <p class="mb-1.5 text-xs sm:text-[13px] text-[#B3852E]">Próximo evento</p>
                <p class="mb-1 text-base sm:text-lg" style="font-family: 'Fraunces', serif">Seminario de liderazgo juvenil</p>
                <p class="text-xs sm:text-[13px] text-[#9C97A6]">14 de setiembre · Sede regional, Trujillo</p>
            </div>
            <div class="border-l border-[#B3852E] pl-5">
                <p class="mb-1.5 text-xs sm:text-[13px] text-[#B3852E]">Iglesia en aniversario</p>
                <p class="mb-1 text-base sm:text-lg" style="font-family: 'Fraunces', serif">Iglesia central El Porvenir</p>
                <p class="text-xs sm:text-[13px] text-[#9C97A6]">Cumple 18 años esta semana</p>
            </div>
        </div>
    </section>

    <!-- ACCESOS -->
    <section class="mx-auto max-w-[1536px] px-4 sm:px-8 py-16 sm:py-24 lg:px-12">
        <h2 class="mb-8 sm:mb-12 text-xl sm:text-2xl" style="font-family: 'Fraunces', serif">Explora la región</h2>
        <div class="grid grid-cols-1 gap-x-12 gap-y-8 sm:gap-y-12 sm:grid-cols-2 md:grid-cols-4">
            <a v-for="item in enlaces" :key="item.titulo" :href="item.href" class="group block">
                <h3
                    class="mb-2 text-base sm:text-lg text-[#211C16] transition-colors group-hover:text-[#B3852E]"
                    style="font-family: 'Fraunces', serif"
                >
                    {{ item.titulo }}
                </h3>
                <p class="mb-4 text-xs sm:text-[13px] leading-relaxed text-[#6E6A5E]">{{ item.desc }}</p>
                <span class="block h-px w-full bg-[#211C16]/10 transition-colors group-hover:bg-[#B3852E]"></span>
            </a>
        </div>
    </section>

    <!-- MOSAICO DE IGLESIAS -->
    <section class="border-t border-[#211C16]/[0.08]">
        <div class="mx-auto max-w-[1536px] px-4 sm:px-8 py-16 sm:py-24 lg:px-12">
            <div class="mb-8 sm:mb-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <h2 class="max-w-md text-2xl sm:text-3xl" style="font-family: 'Fraunces', serif">
                    Iglesias que forman la región.
                </h2>
                <a href="/iglesias" class="inline-block border-b border-[#211C16]/30 pb-0.5 text-xs sm:text-[14px] text-[#211C16] hover:border-[#211C16]">
                    Ver el directorio completo
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                <div
                    v-for="iglesia in iglesias"
                    :key="iglesia.nombre"
                    class="group relative flex aspect-[4/5] flex-col justify-between overflow-hidden rounded-sm bg-[#1A1C20] p-7 text-[#F6F1E7] transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl"
                >
                    <!-- Resplandor sutil e iluminación superior tipo gradiente -->
                    <div
                        class="pointer-events-none absolute inset-0 opacity-40 transition-opacity duration-500 group-hover:opacity-75"
                        style="background: radial-gradient(circle at 50% 0%, rgba(255,255,255,0.08), transparent 70%), linear-gradient(180deg, rgba(255,255,255,0.03) 0%, transparent 40%, rgba(0,0,0,0.4) 100%);"
                    ></div>

                    <!-- BADGE ANIVERSARIO -->
                    <div class="flex justify-end">
                        <span
                            v-if="iglesia.aniversario"
                            class="rounded-sm bg-[#F6F1E7] px-2.5 py-1 text-[11px] font-medium tracking-wide text-[#1A1C20] shadow-sm"
                        >
                            Aniversario
                        </span>
                    </div>

                    <!-- NOMBRES Y UBICACIÓN -->
                    <div class="relative z-10">
                        <h3
                            class="text-xl sm:text-2xl font-normal leading-snug text-[#F6F1E7] group-hover:text-[#E3C583] transition-colors"
                            style="font-family: 'Fraunces', serif"
                        >
                            {{ iglesia.nombre }}
                        </h3>
                        <p class="mt-1.5 text-xs text-[#9C97A6]">
                            {{ iglesia.lugar }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UBICACIÓN -->
    <section class="border-t border-[#211C16]/[0.08]">
        <div class="mx-auto grid max-w-[1536px] grid-cols-1 items-center gap-8 sm:gap-12 px-4 sm:px-8 py-16 sm:py-24 lg:px-12 md:grid-cols-2">
            <div>
                <h2 class="mb-4 text-2xl sm:text-3xl" style="font-family: 'Fraunces', serif">¿Dónde estamos?</h2>
                <p class="max-w-md text-sm sm:text-[15px] leading-relaxed text-[#6E6A5E]">
                    Encuentra la iglesia más cercana dentro de la región, o visita nuestra sede en
                    Trujillo.
                </p>
            </div>
            <div class="h-64 sm:h-80 w-full overflow-hidden border border-[#211C16]/[0.08]">
                <iframe
                    class="h-full w-full grayscale"
                    style="border: 0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q=Trujillo,+La+Libertad,+Peru&output=embed"
                ></iframe>
            </div>
        </div>
    </section>

    <!-- ANIVERSARIO -->
    <section class="relative overflow-hidden bg-[#1C2230] py-20 sm:py-28 text-center text-[#F6F1E7]">
        <div class="relative mx-auto max-w-[1536px] px-4 sm:px-8 lg:px-12">
            <p class="mb-3 sm:mb-4 text-xs sm:text-[15px] text-[#E3C583]">Aniversario regional</p>
            <p class="mb-2 sm:mb-3 text-7xl sm:text-8xl md:text-9xl" style="font-family: 'Fraunces', serif">25</p>
            <p class="mb-5 sm:mb-6 text-base sm:text-lg text-[#CFC8B8]" style="font-family: 'Fraunces', serif">años de historia</p>
            <p class="mx-auto max-w-md text-xs sm:text-[14px] text-[#9C97A6]">
                Faltan 42 días para celebrar el aniversario de la Región La Libertad 3. Pronto
                compartiremos la programación oficial.
            </p>
        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section class="mx-auto max-w-[1536px] px-4 sm:px-8 py-16 sm:py-24 lg:px-12">
        <h2 class="mb-8 sm:mb-12 text-2xl sm:text-3xl" style="font-family: 'Fraunces', serif">Testimonios</h2>

        <div class="grid grid-cols-1 gap-10 sm:gap-14 md:grid-cols-[1.3fr_1fr]">
            <div class="border-l border-[#211C16] pl-6 sm:pl-8">
                <q
                    class="mb-4 sm:mb-6 block text-xl sm:text-2xl leading-snug text-[#211C16]"
                    style="font-family: 'Fraunces', serif"
                >
                    {{ testimonioDestacado.texto }}
                </q>
                <p class="text-xs sm:text-[13px] text-[#6E6A5E]">{{ testimonioDestacado.autor }}</p>
            </div>

            <div class="space-y-8 sm:space-y-10">
                <div v-for="t in testimonios" :key="t.autor">
                    <q
                        class="mb-2 sm:mb-3 block text-sm sm:text-[15px] italic leading-relaxed text-[#211C16]"
                        style="font-family: 'Fraunces', serif"
                    >
                        {{ t.texto }}
                    </q>
                    <p class="text-xs sm:text-[13px] text-[#6E6A5E]">{{ t.autor }}</p>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
@keyframes aurora-drift {
    0% {
        background-position: 0% 30%, 100% 70%;
    }
    50% {
        background-position: 30% 55%, 70% 45%;
    }
    100% {
        background-position: 0% 30%, 100% 70%;
    }
}

.aurora {
    background-color: #14181f;
    background-image:
        radial-gradient(circle at 20% 30%, rgba(179, 133, 46, 0.28), transparent 45%),
        radial-gradient(circle at 80% 70%, rgba(179, 133, 46, 0.16), transparent 45%);
    background-size: 160% 160%;
    animation: aurora-drift 24s ease-in-out infinite;
}
</style>
