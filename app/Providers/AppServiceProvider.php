<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = URL::to('/reset-password/' . $token);

            return (new MailMessage)
                ->subject('Restablecimiento de contraseña')
                ->line('Has solicitado restablecer tu contraseña. Haz clic en el botón para continuar.')
                ->action('Restablecer Contraseña', $url)
                ->line('Si no solicitaste este cambio, ignora este mensaje.');
        });
    }
}
