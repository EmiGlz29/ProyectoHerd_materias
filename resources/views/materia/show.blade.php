```blade
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Detalle de la materia
        </h1>

        <p class="mt-2 text-gray-600">
            Consulta la información completa de esta materia.
        </p>
    </div>

    {{-- Tarjeta con información --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">

        <div class="bg-indigo-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">
                {{ $materia->nombre }}
            </h2>
        </div>

        <div class="p-6 space-y-5">

            {{-- ID --}}
            <div>
                <p class="text-sm font-medium text-gray-500">
                    ID de la materia
                </p>
                <p class="mt-1 text-lg text-gray-800">
                    {{ $materia->id }}
                </p>
            </div>

            <hr>

            {{-- Nombre --}}
            <div>
                <p class="text-sm font-medium text-gray-500">
                    Nombre
                </p>
                <p class="mt-1 text-lg text-gray-800">
                    {{ $materia->nombre }}
                </p>
            </div>

            <hr>

            {{-- Código --}}
            <div>
                <p class="text-sm font-medium text-gray-500">
                    Código
                </p>
                <p class="mt-1 text-lg text-gray-800">
                    {{ $materia->codigo }}
                </p>
            </div>

            <hr>

            {{-- Créditos --}}
            <div>
                <p class="text-sm font-medium text-gray-500">
                    Créditos
                </p>
                <p class="mt-1 text-lg text-gray-800">
                    {{ $materia->creditos }}
                </p>
            </div>

            {{-- Profesor, si existe en la tabla --}}
            @if(isset($materia->profesor))
                <hr>

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Profesor
                    </p>
                    <p class="mt-1 text-lg text-gray-800">
                        {{ $materia->profesor ?: 'No asignado' }}
                    </p>
                </div>
            @endif

            {{-- Fechas de registro --}}
            @if($materia->created_at)
                <hr>

                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Fecha de creación
                    </p>
                    <p class="mt-1 text-gray-800">
                        {{ $materia->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            @endif

            @if($materia->updated_at)
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Última actualización
                    </p>
                    <p class="mt-1 text-gray-800">
                        {{ $materia->updated_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            @endif

        </div>

        {{-- Botones de navegación --}}
        <div class="bg-gray-50 px-6 py-4 flex flex-wrap gap-3">

            <a
                href="{{ route('materia.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600
                       text-white rounded-md hover:bg-gray-700
                       transition duration-200"
            >
                Volver al listado
            </a>

            <a
                href="{{ route('materia.edit', $materia) }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600
                       text-white rounded-md hover:bg-indigo-700
                       transition duration-200"
            >
                Editar materia
            </a>

        </div>
    </div>
</div>
@endsection
```