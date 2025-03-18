@component('mail::message')
# Restablecer tu contraseña

Has solicitado restablecer tu contraseña. Haz clic en el siguiente botón para continuar:

@component('mail::button', ['url' => url('/reset-password/'.$token)])
Restablecer Contraseña
@endcomponent

Si no solicitaste este cambio, puedes ignorar este mensaje.

Gracias,<br>
{{ config('app.name') }}
@endcomponent
