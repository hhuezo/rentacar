<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>SOFÍA RENTA CAR - Reserva tu Vehículo</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        :root {
            --bs-primary: #41b72a;
            --bs-body-font-family: 'Plus Jakarta Sans', sans-serif;
            --bs-body-bg: #f6f8f6;
            --bs-body-color: #111a0f;
        }

        body {
            font-family: var(--bs-body-font-family);
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
        }

        .form-control,
        .form-select {
            height: 3.5rem;
            padding-left: 3rem;
        }

        .form-control-icon {
            position: relative;
        }

        .form-control-icon .material-symbols-outlined {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--bs-primary);
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%2341b72a' stroke-width='2' viewBox='0 0 16 16'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
        }

        .btn-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
        }

        .btn-primary:hover {
            background-color: #3aa325;
            border-color: #3aa325;
        }

        .fw-black {
            font-weight: 900;
        }

        .vehicle-info {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.08);
        }

        .vehicle-image {
            width: 100%;
            height: auto;
            max-height: 350px;
            object-fit: contain;
            border-radius: 0.75rem;
            background-color: #f8f9fa;
            /* color de fondo neutro */
            padding: 0.5rem;
            /* pequeño margen interno para no tocar bordes */
        }

        .vehicle-details p {
            margin-bottom: 0.25rem;
        }

        /* 🔵 Botón Volver con color azul corporativo */
        .btn-outline-blue {
            color: #0A2342;
            border-color: #0A2342;
            transition: all 0.2s ease-in-out;
        }

        .btn-outline-blue:hover {
            background-color: #0A2342;
            color: #fff;
        }
    </style>
</head>

<body>
    <main class="py-5">
        <div class="container-xl">
            <div class="row g-4 g-lg-5 align-items-stretch"> <!-- 👈 importante: align-items-stretch -->
                <!-- 🔹 Card izquierda: Formulario -->
                <div class="col-lg-6 d-flex">
                    <div class="card shadow-lg border-0 rounded-4 flex-fill"> <!-- 👈 flex-fill iguala altura -->
                        <div class="card-body p-4 p-sm-5 d-flex flex-column">
                            <h2 class="fw-black mb-4 display-6">Reserva tu Vehículo</h2>

                            <form class="d-flex flex-column gap-3 mt-auto" method="POST"
                                action="{{ route('reserva.store') }}">
                                @csrf
                                <div>
                                    <label class="form-label fw-medium" for="vehicle-select">Selecciona el
                                        Vehículo</label>
                                    <div class="form-control-icon">
                                        <span class="material-symbols-outlined">directions_car</span>
                                        <select class="form-select" id="vehicle-select" name="vehiculo">
                                            @foreach ($vehiculos as $index => $auto)
                                                <option value="{{ $index }}">
                                                    {{ $auto['marca'] }} {{ $auto['modelo'] }} ({{ $auto['anio'] }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-medium">Fecha de Retiro</label>
                                        <div class="form-control-icon">
                                            <span class="material-symbols-outlined">calendar_month</span>
                                            <input class="form-control" type="date" name="fecha_retiro" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label fw-medium">Hora de Retiro</label>
                                        <div class="form-control-icon">
                                            <span class="material-symbols-outlined">schedule</span>
                                            <input class="form-control" type="time" name="hora_retiro" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-medium">Fecha de Devolución</label>
                                        <div class="form-control-icon">
                                            <span class="material-symbols-outlined">calendar_month</span>
                                            <input class="form-control" type="date" name="fecha_devolucion"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label fw-medium">Hora de Devolución</label>
                                        <div class="form-control-icon">
                                            <span class="material-symbols-outlined">schedule</span>
                                            <input class="form-control" type="time" name="hora_devolucion"
                                                required />
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-3 mt-auto d-flex flex-column gap-2">
                                    <button class="btn btn-primary w-100 fw-bold fs-6 py-3" type="submit">
                                        Continuar Reserva
                                    </button>
                                    <a href="{{ url('/') }}" class="btn btn-outline-blue fw-bold fs-6 py-3">
                                        <span class="material-symbols-outlined align-middle me-1">arrow_back</span>
                                        Volver
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- 🔹 Card derecha: Información del vehículo -->
                <div class="col-lg-6 d-flex">
                    <div class="card shadow-lg border-0 rounded-4 flex-fill"> <!-- 👈 misma estructura de card -->
                        <div class="card-body p-4 p-sm-5 d-flex flex-column justify-content-center">
                            <img id="vehicle-image" class="img-fluid vehicle-image mb-3"
                                src="{{ asset('img/' . $vehiculos[0]['imagen']) }}"
                                alt="{{ $vehiculos[0]['marca'] }} {{ $vehiculos[0]['modelo'] }}">
                            <div class="vehicle-details">
                                <h4 id="vehicle-title" class="fw-bold mb-1">
                                    {{ $vehiculos[0]['marca'] }} {{ $vehiculos[0]['modelo'] }}
                                    {{ $vehiculos[0]['anio'] }}
                                </h4>
                                <p id="vehicle-color" class="text-muted">{{ $vehiculos[0]['color'] }}</p>
                                <p id="vehicle-desc">{{ $vehiculos[0]['descripcion'] }}</p>
                                <p id="vehicle-price" class="fw-bold text-success mt-2">Desde
                                    ${{ $vehiculos[0]['precio'] }}/día</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        const vehiculos = @json($vehiculos);

        const select = document.getElementById('vehicle-select');
        const img = document.getElementById('vehicle-image');
        const title = document.getElementById('vehicle-title');
        const color = document.getElementById('vehicle-color');
        const desc = document.getElementById('vehicle-desc');
        const price = document.getElementById('vehicle-price');

        select.addEventListener('change', e => {
            const v = vehiculos[e.target.value];
            img.src = `{{ asset('img') }}/${v.imagen}`;
            img.alt = `${v.marca} ${v.modelo}`;
            title.textContent = `${v.marca} ${v.modelo} ${v.anio}`;
            color.textContent = v.color;
            desc.textContent = v.descripcion;
            price.textContent = `Desde $${v.precio}/día`;
        });
    </script>
</body>

</html>
