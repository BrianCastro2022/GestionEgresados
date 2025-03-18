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

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>

        @if(Auth::user()->email === 'admin@unimar.edu' || Auth::user()->email === 'coordinador@unimar.edu')
            <div class="mt-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                <p><strong>¡Bienvenido, Administrador!</strong> Tienes permisos de administrador.</p>
            </div>

            <!-- Panel de Administrador -->
            <div class="mt-6 p-6 bg-white rounded-lg shadow">
                <h2 class="text-xl font-semibold">Panel de Administración</h2>
                <ul class="mt-4">
                    <li><a href="{{ route('admin.users') }}" class="text-blue-600">Gestionar Usuarios</a></li>
                    <li><a href="{{ route('admin.settings') }}" class="text-blue-600">Configuración del Sistema</a></li>
                    <li><a href="{{ route('admin.reports') }}" class="text-blue-600">Ver Reportes</a></li>
                </ul>
            </div>
        @else
            <div class="mt-6 p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700">
                <p>Bienvenido al sistema.</p>
            </div>
        @endif
    </div>
</x-app-layout>