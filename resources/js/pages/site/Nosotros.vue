<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });
</script>

<template>
    <Head title="Nosotros — Región La Libertad 3" />

    <!-- INTRO -->
    <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
        <p class="mb-4 text-sm text-[#A84A2A]">Nosotros</p>
        <h1 class="mb-8 max-w-2xl text-4xl leading-tight md:text-5xl" style="font-family:'Fraunces', serif">
            Una región que camina unida desde hace más de dos décadas.
        </h1>
        <p class="max-w-xl text-[15px] text-[#706f6c]">
            La Región La Libertad 3 agrupa a las iglesias de la Iglesia Evangélica Pentecostal del Perú (IEPP)
            distribuidas en la provincia, bajo una misma junta directiva que acompaña, forma y coordina
            el trabajo de cada congregación local.
        </p>
    </section>

    <!-- QUIENES SOMOS -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto grid max-w-6xl grid-cols-1 gap-12 px-6 py-16 lg:px-8 md:grid-cols-2">
            <div>
                <h2 class="mb-4 text-2xl" style="font-family:'Fraunces', serif">¿Quiénes somos?</h2>
                <p class="text-[15px] leading-relaxed text-[#706f6c]">
                    Somos la junta directiva regional de la IEPP en La Libertad, encargada de representar,
                    orientar y servir a las iglesias que forman parte de nuestra jurisdicción. Trabajamos
                    junto a los pastores y líderes locales para impulsar la formación bíblica, el
                    crecimiento de cada congregación y la unidad entre todas las iglesias de la región.
                </p>
            </div>
            <div>
                <h2 class="mb-4 text-2xl" style="font-family:'Fraunces', serif">Nuestra historia</h2>
                <p class="text-[15px] leading-relaxed text-[#706f6c]">
                    A lo largo de los años, la región ha crecido junto con cada una de sus iglesias,
                    acompañando procesos de formación de nuevos pastores, la apertura de nuevas
                    congregaciones y la organización de actividades que fortalecen la fe y el
                    testimonio cristiano en toda la provincia.
                </p>
            </div>
        </div>
    </section>

    <!-- MISION Y VISION -->
    <section class="border-t border-[#1B2A3C]/10 bg-[#1B2A3C] text-[#EFEAE0]">
        <div class="mx-auto grid max-w-6xl grid-cols-1 gap-10 px-6 py-16 lg:px-8 md:grid-cols-2">
            <div class="border-l-2 border-[#B8901F] pl-6">
                <p class="mb-3 text-[11px] text-[#C9BFA8]">Misión</p>
                <p class="text-lg leading-relaxed" style="font-family:'Fraunces', serif">
                    Servir y fortalecer a las iglesias de la región, formando líderes y
                    acompañando a cada congregación en su crecimiento espiritual y comunitario.
                </p>
            </div>
            <div class="border-l-2 border-[#B8901F] pl-6">
                <p class="mb-3 text-[11px] text-[#C9BFA8]">Visión</p>
                <p class="text-lg leading-relaxed" style="font-family:'Fraunces', serif">
                    Ser una región unida y en constante crecimiento, referente de servicio,
                    formación y testimonio cristiano en toda la provincia de La Libertad.
                </p>
            </div>
        </div>
    </section>

    <!-- VALORES -->
    <section class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
        <h2 class="mb-8 text-2xl" style="font-family:'Fraunces', serif">Nuestros valores</h2>
        <div class="grid grid-cols-1 gap-px border border-[#1B2A3C]/10 bg-[#1B2A3C]/10 sm:grid-cols-3">
            <div class="bg-[#EFEAE0] p-6">
                <h3 class="mb-2 text-lg" style="font-family:'Fraunces', serif">Unidad</h3>
                <p class="text-sm text-[#706f6c]">Trabajamos como una sola región, más allá de cada iglesia local.</p>
            </div>
            <div class="bg-[#EFEAE0] p-6">
                <h3 class="mb-2 text-lg" style="font-family:'Fraunces', serif">Servicio</h3>
                <p class="text-sm text-[#706f6c]">Acompañamos a pastores e iglesias en lo que necesiten.</p>
            </div>
            <div class="bg-[#EFEAE0] p-6">
                <h3 class="mb-2 text-lg" style="font-family:'Fraunces', serif">Formación</h3>
                <p class="text-sm text-[#706f6c]">Invertimos en la preparación bíblica de nuevos líderes.</p>
            </div>
        </div>
    </section>

    <!-- UBICACION -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
            <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-2 md:items-end">
                <div>
                <span class="mb-2 inline-block rounded-sm bg-[#1B2A3C]/5 px-2.5 py-1 text-xs font-medium text-[#A84A2A]">
                    Sede Institucional
                </span>
                    <h2 class="text-2xl" style="font-family:'Fraunces', serif">Nuestra Ubicación</h2>
                    <p class="mt-2 text-sm text-[#706f6c]">
                        La junta directiva atiende de manera virtual. Nuestras asambleas y actividades presenciales principales se realizan en la iglesia de Villa Cruz.
                    </p>
                </div>
                <div class="text-left md:text-right text-xs text-[#706f6c]">
                    <p class="font-semibold text-[#1b1b18]">Sede de reuniones:</p>
                    <p>Iglesia IEPP Villa Cruz · Trujillo, La Libertad</p>
                </div>
            </div>

            <div class="h-80 w-full overflow-hidden border border-[#1B2A3C]/10">
                <iframe
                    class="h-full w-full"
                    style="border:0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4906.398523074814!2d-78.10598017410899!3d-8.121304891908148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91addab1e9c11b4d%3A0xb3a55b27b6c6a8d3!2sVillacruz%20de%20Algallama%2C%2013150!5e1!3m2!1ses!2spe!4v1788913930491!5m2!1ses!2spe"
                ></iframe>
            </div>
        </div>
    </section>
</template>
