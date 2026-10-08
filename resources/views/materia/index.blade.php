<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <main class="mx-auto max-w-5xl px-4 py-12 sm:px-6">
        <header class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight">Materias</h1>
                <p class="mt-2 text-slate-600">Consulta las materias registradas.</p>
            </div>
            <a href="{{ url('/materia/create') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                Crear materia
            </a>
        </header>

        @if (session('success'))
            <div role="status" class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <section class="overflow-hidden rounded-xl bg-white shadow-sm">
            @if ($materias->isEmpty())
                <div class="px-6 py-12 text-center">
                    <h2 class="text-lg font-semibold text-slate-900">Todavía no hay materias</h2>
                    <p class="mt-2 text-sm text-slate-600">Crea una materia para que aparezca en esta lista.</p>
                    <a href="{{ url('/materia/create') }}" class="mt-5 inline-flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-800">
                        Crear primera materia
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px] text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold">Nombre</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Código</th>
                                <th scope="col" class="px-6 py-4 text-right font-semibold">Créditos</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($materias as $materia)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4 font-medium text-slate-900">{{ $materia->nombre }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $materia->codigo }}</td>
                                    <td class="px-6 py-4 text-right text-slate-600">{{ $materia->creditos }}</td>
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