<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de materias</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <main class="mx-auto max-w-5xl px-4 py-12 sm:px-6">
        <header class="mb-8">
            <a href="{{ url('/materia') }}" class="text-sm font-medium text-blue-700 hover:text-blue-900">
                &larr; Volver a materias
            </a>
            <h1 class="mt-4 text-3xl font-bold tracking-tight">Listado de materias</h1>
            <p class="mt-2 text-slate-600">Consulta el nombre y código de cada materia.</p>
        </header>

        <section class="overflow-hidden rounded-xl bg-white shadow-sm">
            @if ($materias->isEmpty())
                <div class="px-6 py-12 text-center">
                    <h2 class="text-lg font-semibold text-slate-900">Todavía no hay materias</h2>
                    <p class="mt-2 text-sm text-slate-600">Las materias registradas aparecerán en esta lista.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[400px] text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Nombre</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Código</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($materias as $materia)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4 font-medium text-slate-900">{{ $materia->nombre }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $materia->codigo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </main>
</body>
</html>
