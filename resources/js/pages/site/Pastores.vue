<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import SiteLayout from '@/layouts/site/SiteLayout.vue';

defineOptions({ layout: SiteLayout });

interface Pastor {
    nombre: string;
    cargo: string;
    iglesia?: string;
    whatsapp: string; // número con código de país, sin '+', ej: 51987654321
    foto?: string; // ruta de la foto, ej: '/images/pastores/juan-perez.jpg'
    destacado?: boolean;
}

// TODO: reemplazar con los datos reales de cada pastor.
// Si "foto" queda vacío, se muestra un círculo con las iniciales del nombre.
const pastores: Pastor[] = [
    {
        nombre: 'Pastor Superintendente',
        cargo: 'Superintendente regional',
        whatsapp: '51900000000',
        destacado: true,
    },
    {
        nombre: 'Pastora Secretaria',
        cargo: 'Secretaria regional',
        whatsapp: '51900000001',
    },
    {
        nombre: 'Pastor Tesorero',
        cargo: 'Tesorero regional',
        whatsapp: '51900000002',
    },
    {
        nombre: 'Pastor Vocal',
        cargo: 'Vocal regional',
        whatsapp: '51900000003',
    },
    {
        nombre: 'Pastora de Damas',
        cargo: 'Encargada de damas',
        whatsapp: '51900000004',
    },
    {
        nombre: 'Pastor de Jóvenes',
        cargo: 'Encargado de jóvenes',
        whatsapp: '51900000005',
    },
];

const destacado = pastores.find((p) => p.destacado);
const resto = pastores.filter((p) => !p.destacado);

interface PastorLocal {
    nombre: string;
    iglesia: string;
    lugar: string;
    whatsapp: string;
    foto?: string;
}

// TODO: reemplazar con los pastores reales de cada iglesia de la región.
const pastoresLocales: PastorLocal[] = [
    {
        nombre: 'Pastor Local Uno',
        iglesia: 'Iglesia central El Porvenir',
        lugar: 'El Porvenir, Trujillo',
        whatsapp: '51900000010',
    },
    {
        nombre: 'Pastora Local Dos',
        iglesia: 'Iglesia Fe y Esperanza',
        lugar: 'Laredo',
        whatsapp: '51900000011',
    },
    {
        nombre: 'Pastor Local Tres',
        iglesia: 'Iglesia Monte Sion',
        lugar: 'Huanchaco',
        whatsapp: '51900000012',
    },
];

function iniciales(nombre: string) {
    return nombre
        .split(' ')
        .filter((p) => p.length > 1)
        .slice(0, 2)
        .map((p) => p[0])
        .join('')
        .toUpperCase();
}

function whatsappUrl(numero: string) {
    return `https://wa.me/${numero}`;
}

const paleta = ['#A84A2A', '#B8901F', '#1B2A3C', '#7C351D'];
function colorFondo(nombre: string) {
    const index = nombre.length % paleta.length;
    return paleta[index];
}
</script>

<template>
    <Head title="Pastores — Región La Libertad 3" />

    <!-- INTRO -->
    <section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
        <p class="mb-4 text-sm text-[#A84A2A]">Junta directiva</p>
        <h1 class="mb-6 max-w-xl text-4xl leading-tight md:text-5xl" style="font-family:'Fraunces', serif">
            Los pastores que guían nuestra región.
        </h1>
        <p class="max-w-lg text-[15px] text-[#706f6c]">
            Conoce a la junta directiva regional y comunícate directamente con cada uno
            a través de WhatsApp.
        </p>
    </section>

    <!-- DESTACADO: superintendente -->
    <section v-if="destacado" class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto grid max-w-6xl grid-cols-1 items-center gap-10 px-6 py-14 lg:px-8 md:grid-cols-[280px_1fr]">
            <div class="aspect-[4/5] w-full max-w-[280px] overflow-hidden">
                <img
                    v-if="destacado.foto"
                    :src="destacado.foto"
                    :alt="destacado.nombre"
                    class="h-full w-full object-cover"
                />
                <div
                    v-else
                    class="flex h-full w-full items-center justify-center text-5xl text-[#EFEAE0]"
                    :style="{ backgroundColor: colorFondo(destacado.nombre), fontFamily: 'Fraunces, serif' }"
                >
                    {{ iniciales(destacado.nombre) }}
                </div>
            </div>
            <div>
                <p class="mb-3 text-sm text-[#A84A2A]">{{ destacado.cargo }}</p>
                <h2 class="mb-4 text-3xl md:text-4xl" style="font-family:'Fraunces', serif">
                    {{ destacado.nombre }}
                </h2>
                <p v-if="destacado.iglesia" class="mb-6 text-sm text-[#706f6c]">{{ destacado.iglesia }}</p>
                <a
                    :href="whatsappUrl(destacado.whatsapp)"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-2.5 rounded-sm border border-[#1b1b18] px-5 py-2.5 text-sm transition-colors hover:bg-[#1b1b18] hover:text-[#EFEAE0]"
                >
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
                        />
                        <path
                            d="M12.05 21.785h-.004a9.87 9.87 0 0 1-4.988-1.362l-.358-.212-3.712.973.99-3.617-.233-.371a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.002 5.45-4.437 9.841-9.954 9.841m8.412-18.253A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.058 24l6.305-1.654a11.87 11.87 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.336 11.893-11.893a11.821 11.821 0 0 0-3.482-8.369"
                        />
                    </svg>
                    Escribir por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- GRID de pastores -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="pastor in resto"
                    :key="pastor.nombre"
                    class="group overflow-hidden border border-[#1B2A3C]/10 bg-white/40 transition-shadow hover:shadow-[0_12px_28px_-16px_rgba(27,42,60,0.35)]"
                >
                    <div class="aspect-[4/5] w-full overflow-hidden">
                        <img
                            v-if="pastor.foto"
                            :src="pastor.foto"
                            :alt="pastor.nombre"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-[1.03]"
                        />
                        <div
                            v-else
                            class="flex h-full w-full items-center justify-center text-4xl text-[#EFEAE0]"
                            :style="{ backgroundColor: colorFondo(pastor.nombre), fontFamily: 'Fraunces, serif' }"
                        >
                            {{ iniciales(pastor.nombre) }}
                        </div>
                    </div>

                    <div class="p-5">
                        <p class="mb-1 text-[11px] text-[#A84A2A]">{{ pastor.cargo }}</p>
                        <h3 class="mb-1 text-lg" style="font-family:'Fraunces', serif">{{ pastor.nombre }}</h3>
                        <p v-if="pastor.iglesia" class="mb-4 text-xs text-[#706f6c]">{{ pastor.iglesia }}</p>

                        <a
                            :href="whatsappUrl(pastor.whatsapp)"
                            target="_blank"
                            rel="noopener"
                            class="mt-3 inline-flex h-9 w-9 items-center justify-center rounded-full border border-[#1B2A3C]/15 text-[#1b1b18] transition-colors hover:border-[#1b1b18] hover:bg-[#1b1b18] hover:text-[#EFEAE0]"
                            :aria-label="`Escribir a ${pastor.nombre} por WhatsApp`"
                        >
                            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
                                />
                                <path
                                    d="M12.05 21.785h-.004a9.87 9.87 0 0 1-4.988-1.362l-.358-.212-3.712.973.99-3.617-.233-.371a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.002 5.45-4.437 9.841-9.954 9.841m8.412-18.253A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.058 24l6.305-1.654a11.87 11.87 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.336 11.893-11.893a11.821 11.821 0 0 0-3.482-8.369"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PASTORES DE LA REGION (fuera de la junta directiva) -->
    <section class="border-t border-[#1B2A3C]/10">
        <div class="mx-auto max-w-6xl px-6 py-16 lg:px-8">
            <p class="mb-3 text-sm text-[#A84A2A]">Pastores de la región</p>
            <h2 class="mb-3 max-w-lg text-2xl md:text-3xl" style="font-family:'Fraunces', serif">
                Cada uno al frente de su congregación.
            </h2>
            <p class="mb-10 max-w-lg text-sm text-[#706f6c]">
                Además de la junta directiva, estos son los pastores que lideran cada iglesia
                dentro de la Región La Libertad 3.
            </p>

            <div class="divide-y divide-[#1B2A3C]/10 border-t border-b border-[#1B2A3C]/10">
                <div
                    v-for="pastor in pastoresLocales"
                    :key="pastor.nombre"
                    class="group flex items-center gap-5 py-5"
                >
                    <div class="h-14 w-14 shrink-0 overflow-hidden rounded-full">
                        <img
                            v-if="pastor.foto"
                            :src="pastor.foto"
                            :alt="pastor.nombre"
                            class="h-full w-full object-cover"
                        />
                        <div
                            v-else
                            class="flex h-full w-full items-center justify-center text-sm text-[#EFEAE0]"
                            :style="{ backgroundColor: colorFondo(pastor.nombre), fontFamily: 'Fraunces, serif' }"
                        >
                            {{ iniciales(pastor.nombre) }}
                        </div>
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="truncate text-[15px]" style="font-family:'Fraunces', serif">{{ pastor.nombre }}</h3>
                        <p class="truncate text-xs text-[#706f6c]">{{ pastor.iglesia }} · {{ pastor.lugar }}</p>
                    </div>

                    <a
                        :href="whatsappUrl(pastor.whatsapp)"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#1B2A3C]/15 text-[#1b1b18] transition-colors hover:border-[#1b1b18] hover:bg-[#1b1b18] hover:text-[#EFEAE0]"
                        :aria-label="`Escribir a ${pastor.nombre} por WhatsApp`"
                    >
                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
                            />
                            <path
                                d="M12.05 21.785h-.004a9.87 9.87 0 0 1-4.988-1.362l-.358-.212-3.712.973.99-3.617-.233-.371a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.002 5.45-4.437 9.841-9.954 9.841m8.412-18.253A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.058 24l6.305-1.654a11.87 11.87 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.336 11.893-11.893a11.821 11.821 0 0 0-3.482-8.369"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
