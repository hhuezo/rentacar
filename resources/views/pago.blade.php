<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>SOFÍA RENTA CAR - Pago</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#41b72a",
                        "background-light": "#f6f8f6",
                        "background-dark": "#151f13",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                },
            },
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#111a0f] dark:text-[#eaf2e9]">
    <div class="relative flex min-h-screen w-full flex-col">
        <main class="flex-grow container mx-auto px-4 py-8 md:py-16">

            <!-- 🔹 GRID principal -->
            <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 items-stretch">

                <!-- 🔹 IZQUIERDA: Formulario de Pago -->
                <div class="lg:col-span-3 flex flex-col">

                    <div
                        class="bg-white dark:bg-background-dark/50 p-6 sm:p-8 rounded-xl border border-[#eaf2e9] dark:border-[#2a3c2a] shadow-sm flex-grow h-full flex flex-col justify-between">

                        <form action="#" class="space-y-6" method="POST">
                            <h2 class="text-[22px] font-bold tracking-[-0.015em] text-[#111a0f] dark:text-[#f9fbf9] pb-2">
                                Introduce los Datos de tu Tarjeta
                            </h2>

                            <div class="grid grid-cols-1 gap-6">
                                <!-- Número -->
                                <div>
                                    <label class="block text-base font-medium pb-2" for="card-number">
                                        Número de Tarjeta
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="form-input w-full rounded-lg text-[#111a0f] dark:text-[#f9fbf9] focus:ring-2 focus:ring-primary/50 border border-[#d5e4d2] dark:border-[#2a3c2a] bg-background-light dark:bg-background-dark h-14 p-4 text-base"
                                            id="card-number" name="card-number" placeholder="•••• •••• •••• ••••"
                                            type="text" />
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <span class="material-symbols-outlined text-gray-400">credit_card</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nombre -->
                                <div>
                                    <label class="block text-base font-medium pb-2" for="card-name">
                                        Nombre en la Tarjeta
                                    </label>
                                    <input
                                        class="form-input w-full rounded-lg text-[#111a0f] dark:text-[#f9fbf9] focus:ring-2 focus:ring-primary/50 border border-[#d5e4d2] dark:border-[#2a3c2a] bg-background-light dark:bg-background-dark h-14 p-4 text-base"
                                        id="card-name" name="card-name" placeholder="Nombre completo" type="text" />
                                </div>

                                <!-- Fecha y CVV -->
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-base font-medium pb-2" for="expiry-date">
                                            Vencimiento (MM/AA)
                                        </label>
                                        <input
                                            class="form-input w-full rounded-lg text-[#111a0f] dark:text-[#f9fbf9] focus:ring-2 focus:ring-primary/50 border border-[#d5e4d2] dark:border-[#2a3c2a] bg-background-light dark:bg-background-dark h-14 p-4 text-base"
                                            id="expiry-date" name="expiry-date" placeholder="MM/AA" type="text" />
                                    </div>
                                    <div>
                                        <label class="block text-base font-medium pb-2" for="cvv">CVV</label>
                                        <div class="relative">
                                            <input
                                                class="form-input w-full rounded-lg text-[#111a0f] dark:text-[#f9fbf9] focus:ring-2 focus:ring-primary/50 border border-[#d5e4d2] dark:border-[#2a3c2a] bg-background-light dark:bg-background-dark h-14 p-4 text-base"
                                                id="cvv" name="cvv" placeholder="•••" type="text" />
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                                <span class="material-symbols-outlined text-gray-400">lock</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <a href="{{url('/')}}"
                                    class="flex w-full items-center justify-center rounded-lg h-14 px-4 bg-primary text-white dark:text-[#111a0f] text-base font-bold tracking-[0.015em] hover:bg-primary/90 focus:ring-2 focus:ring-primary focus:ring-offset-2"
                                    >
                                    <span>Pagar Ahora</span>
                            </a>
                            </div>


                        </form>
                    </div>
                </div>

                <!-- 🔹 DERECHA: Resumen -->
                <div class="lg:col-span-2 flex flex-col h-full">
                    <div
                        class="bg-white dark:bg-background-dark/50 p-6 sm:p-8 rounded-xl border border-[#eaf2e9] dark:border-[#2a3c2a] shadow-sm flex-grow h-full flex flex-col justify-between">

                        <h3 class="text-xl font-bold mb-6 text-[#111a0f] dark:text-[#f9fbf9]">
                            Resumen de tu Reserva
                        </h3>

                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-24 h-16 rounded-lg bg-cover bg-center"
                                    style="background-image: url('{{ asset('img/' . $resumen['vehiculo']['imagen']) }}')">
                                </div>
                                <div>
                                    <p class="font-bold text-lg">
                                        {{ $resumen['vehiculo']['marca'] }} {{ $resumen['vehiculo']['modelo'] }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $resumen['vehiculo']['color'] }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="border-t border-[#eaf2e9] dark:border-[#2a3c2a] pt-4 flex flex-col gap-3 text-sm">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-base">calendar_today</span>
                                        <span>Recogida</span>
                                    </div>
                                    <p>{{ $resumen['fecha_retiro'] }} - {{ $resumen['hora_retiro'] }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-base">calendar_today</span>
                                        <span>Devolución</span>
                                    </div>
                                    <p>{{ $resumen['fecha_devolucion'] }} - {{ $resumen['hora_devolucion'] }}</p>
                                </div>
                            </div>

                            <div class="border-t border-[#eaf2e9] dark:border-[#2a3c2a] pt-4 space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <p class="text-gray-600 dark:text-gray-400">Tarifa diaria</p>
                                    <p class="font-medium">${{ $resumen['vehiculo']['precio'] }}</p>
                                </div>
                            </div>

                            <div class="border-t border-[#eaf2e9] dark:border-[#2a3c2a] pt-4 mt-2">
                                <div class="flex justify-between items-baseline">
                                    <p class="text-lg font-bold">Total estimado</p>
                                    <p class="text-2xl font-black text-primary">
                                        ${{ $resumen['vehiculo']['precio'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="bg-gray-100 dark:bg-background-dark/50 border-t border-[#eaf2e9] dark:border-[#2a3c2a] mt-16">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        © 2025 SOFÍA RENTA CAR. Todos los derechos reservados.
                    </p>
                    <div class="flex gap-6">
                        <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary"
                            href="#">Términos y Condiciones</a>
                        <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary"
                            href="#">Política de Privacidad</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
