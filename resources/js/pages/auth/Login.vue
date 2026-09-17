<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import PasskeyVerify from '@/components/PasskeyVerify.vue';
import TeamInvitationAlert from '@/components/TeamInvitationAlert.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import type { TeamInvitationContext } from '@/types';

defineProps<{
    status?: string;
    canResetPassword: boolean;
    teamInvitation?: TeamInvitationContext | null;
}>();
</script>

<template>
    <Head title="Log in" />

    <div class="w-full max-w-sm mx-auto space-y-6">
        <!-- Notificaciones de Estado e Invitaciones -->
        <div
            v-if="status"
            class="rounded-lg border border-emerald-500/20 bg-emerald-500/10 p-3 text-center text-sm font-medium text-emerald-500"
        >
            {{ status }}
        </div>

        <TeamInvitationAlert
            v-if="teamInvitation"
            :invitation="teamInvitation"
            action="Log in"
        />

        <PasskeyVerify />

        <!-- Formulario Adaptado al Layout -->
        <Form
            v-bind="store.form()"
            :reset-on-success="['password']"
            v-slot="{ errors, processing }"
            class="space-y-4"
        >
            <div class="grid gap-2">
                <Label for="email">Correo Electrónico</Label>
                <Input
                    id="email"
                    type="email"
                    name="email"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="email"
                    placeholder="email@example.com"
                />
                <InputError :message="errors.email" />
            </div>

            <div class="grid gap-2">
                <div class="flex items-center justify-between">
                    <Label for="password">Contraseña</Label>
                    <TextLink
                        v-if="canResetPassword"
                        :href="request()"
                        class="text-xs text-muted-foreground hover:text-foreground"
                        :tabindex="5"
                    >
                        ¿Olvidaste tu contraseña?
                    </TextLink>
                </div>
                <PasswordInput
                    id="password"
                    name="password"
                    required
                    :tabindex="2"
                    autocomplete="current-password"
                    placeholder="Contraseña"
                />
                <InputError :message="errors.password" />
            </div>

            <div class="flex items-center space-x-2 pt-1">
                <Checkbox id="remember" name="remember" :tabindex="3" />
                <Label for="remember" class="text-sm font-normal cursor-pointer">
                    Recordarme
                </Label>
            </div>

            <Button
                type="submit"
                class="w-full mt-2"
                :tabindex="4"
                :disabled="processing"
                data-test="login-button"
            >
                <Spinner v-if="processing" class="mr-2" />
                Iniciar sesión
            </Button>

            <div class="pt-2 text-center text-sm text-muted-foreground">
                ¿No tienes una cuenta?
                <TextLink
                    :href="
                        register({
                            query: {
                                invitation: teamInvitation?.code,
                            },
                        })
                    "
                    :tabindex="5"
                    data-test="register-link"
                    class="font-medium text-foreground underline underline-offset-4"
                >
                    Regístrate
                </TextLink>
            </div>
        </Form>
    </div>
</template>
