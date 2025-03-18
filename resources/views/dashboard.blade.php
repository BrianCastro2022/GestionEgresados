<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if(auth()->user()->hasRole('Administrador'))
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Panel de Administración</a>
            @endif

            @if(auth()->user()->hasRole('Coordinador de Egresados'))
                <a href="{{ route('coordinador.dashboard') }}" class="text-blue-600 hover:underline">Panel del Coordinador</a>
            @endif

            @if(auth()->user()->hasRole('Egresado'))
                <a href="{{ route('egresado.dashboard') }}" class="text-blue-600 hover:underline">Panel del Egresado</a>
            @endif
        </div>
    </div>
</x-app-layout>
