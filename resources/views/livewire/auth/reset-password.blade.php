<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold text-center mb-4">Restablecer Contraseña</h2>

    @if (session()->has('error'))
        <div class="text-red-500 text-sm mb-3">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="resetPassword">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Correo Electrónico</label>
            <input type="email" id="email" wire:model="email" class="w-full border rounded p-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Nueva Contraseña</label>
            <input type="password" id="password" wire:model="password" class="w-full border rounded p-2">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">
            Restablecer Contraseña
        </button>
    </form>
</div>
