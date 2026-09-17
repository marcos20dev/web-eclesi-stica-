<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="border-t border-[#1B2A3C]/10 py-11">
        <div class="mx-auto flex max-w-6xl flex-col items-start justify-between gap-6 px-6 lg:px-8 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-medium">Región La Libertad 3</p>
                <p class="text-[11px] text-[#706f6c]">Iglesia evangélica pentecostal del Perú</p>
            </div>
            <div class="flex gap-6 text-xs text-[#706f6c]">
                <Link href="/nosotros" class="hover:text-[#A84A2A]">Nosotros</Link>
                <Link href="/iglesias" class="hover:text-[#A84A2A]">Iglesias</Link>
                <Link href="/eventos" class="hover:text-[#A84A2A]">Eventos</Link>
                <Link href="/escuela-biblica" class="hover:text-[#A84A2A]">Escuela Bíblica</Link>
                <Link href="/contacto" class="hover:text-[#A84A2A]">Contacto</Link>
            </div>
        </div>
    </footer>
</template>
