<script setup lang="ts">
import SiteHeader from '@/components/site/SiteHeader.vue';
import SiteFooter from '@/components/site/SiteFooter.vue';
</script>

<template>
    <div class="min-h-screen bg-[#EFEAE0] text-[#1b1b18]">
        <SiteHeader />
        <main>
            <slot />
        </main>
        <SiteFooter />
    </div>
</template>
