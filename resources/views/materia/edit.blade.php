<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar materia</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <main class="mx-auto max-w-2xl px-4 py-12 sm:px-6">
        <div class="mb-8">
            <a href="{{ url('/materia') }}" class="text-sm font-medium text-blue-700 hover:text-blue-900">
                &larr; Volver a materias
            </a>
            <h1 class="mt-4 text-3xl font-bold tracking-tight">Editar materia</h1>
            <p class="mt-2 text-slate-600">Actualiza los datos de la materia con ID {{ $materia->id }}.</p>
        </div>

        <form action="{{ route('materia.update', $materia) }}" method="POST" class="space-y-6 rounded-xl bg-white p-6 shadow-sm sm:p-8">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre" class="mb-2 block text-sm font-medium text-slate-700">Nombre</label>
                <input
                    id="nombre"
                    name="nombre"
                    type="text"
                    value="{{ old('nombre', $materia->nombre) }}"
                    maxlength="255"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-slate-900 shadow-sm outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20"
                >
                @error('nombre')
                    <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="codigo" class="mb-2 block text-sm font-medium text-slate-700">Código</label>
                <input
                    id="codigo"
                    name="codigo"
                    type="text"
                    value="{{ old('codigo', $materia->codigo) }}"
                    maxlength="255"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-slate-900 shadow-sm outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20"
                >
                @error('codigo')
                    <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="creditos" class="mb-2 block text-sm font-medium text-slate-700">Créditos</label>
                <input
                    id="creditos"
                    name="creditos"
                    type="number"
                    value="{{ old('creditos', $materia->creditos) }}"
                    step="1"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-slate-900 shadow-sm outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20"
                >
                @error('creditos')
                    <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                <a href="{{ url('/materia') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    Actualizar materia
                </button>
            </div>
        </form>
    </main>
</body>
</html>
