<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>SOFÍA RENTA CAR</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        :root {
            --bs-primary: #0A2342;
            --bs-secondary: #2CA58D;
            --bs-accent: #42b72a;
            --bs-primary-rgb: 10, 35, 66;
            --bs-secondary-rgb: 44, 165, 141;
            --bs-accent-rgb: 66, 183, 42;
            --bs-link-hover-color: #42b72a;
        }

        /* 🔹 Habilita scroll suave y compensa el navbar sticky */
        html {
            scroll-behavior: smooth;
        }

        [id] {
            scroll-margin-top: 84px;
        }

        /* altura aprox del navbar */

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .btn-accent {
            background-color: var(--bs-accent);
            border-color: var(--bs-accent);
            color: #fff;
        }

        .btn-accent:hover {
            background-color: #3aa025;
            border-color: #3aa025;
            color: #fff;
        }

        .text-accent {
            color: var(--bs-accent) !important;
        }

        .bg-primary {
            background-color: var(--bs-primary) !important;
        }

        .bg-primary-subtle {
            background-color: #0d2c54 !important;
        }

        .text-muted-dark {
            color: #ADB5BD !important;
        }

        .hero-section {
            background-image: linear-gradient(rgba(10, 35, 66, 0.7) 0%, rgba(10, 35, 66, 0.9) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBuxM4mt1AEGU3AYGnN9zyGAIpLG-aiD2ccCMjf0eHqS7vXAibbeUBlNdZ94YHKvFqp2jsobKO2kWSBGUr9F66ivFSpWzQydSJ42tb51REWUeXcEoYh3ZaDhoQFr0WVkZkweEKSacoKkiS8k_lX8TNj_pOm7VAViff7DQIQWNGEwBWaM3XLYvKVdRfyCU_ehY2v2cePP0uspJccQINWdyM2nle1uKq5px-enJKc-kOQbuK9_Lfy9BA0oF13JQt9YOOB7kGeCa2I6DTU");
            background-size: cover;
            background-position: center;
            min-height: 480px;
        }

        .card-img-top-bg {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 56.25%;
        }

        .tour-route-card {
            background-size: cover;
            background-position: center;
            min-height: 240px;
        }

        .navbar-brand svg {
            width: 1.5rem;
            height: 1.5rem;
            color: var(--bs-accent);
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: var(--bs-accent);
        }

        footer a:hover {
            color: var(--bs-accent) !important;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
            vertical-align: middle;
        }
    </style>
</head>


@php
    $sedanes = [
        [
            'marca' => 'Toyota',
            'modelo' => 'Yaris',
            'anio' => 2020,
            'color' => 'Blanco perla',
            'precio' => 45,
            'descripcion' =>
                'El Toyota Yaris 2020 combina eficiencia y confort. Ideal para ciudad, con excelente rendimiento de combustible y diseño elegante.',
            'imagen' => 'vehiculo1.webp',
        ],
        [
            'marca' => 'Honda',
            'modelo' => 'Civic',
            'anio' => 2021,
            'color' => 'Gris metálico',
            'precio' => 75,
            'descripcion' =>
                'El Honda Civic 2021 ofrece un equilibrio perfecto entre potencia y estilo, con un interior moderno y gran estabilidad en carretera.',
            'imagen' => 'vehiculo2.jpg',
        ],
        [
            'marca' => 'Nissan',
            'modelo' => 'Sentra',
            'anio' => 2022,
            'color' => 'Rojo vino',
            'precio' => 110,
            'descripcion' =>
                'El Nissan Sentra 2022 destaca por su diseño deportivo, amplio espacio interior y avanzados sistemas de seguridad.',
            'imagen' => 'vehiculo3.png',
        ],
    ];
@endphp


<body class="bg-light">
    <nav
        class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top border-bottom border-secondary border-opacity-25">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#inicio">
                <img src="{{ asset('img/logo.png') }}" style="height: 40px">
            </a>
            <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <!-- 🔹 Enlaces actualizados -->
                    <li class="nav-item"><a class="nav-link" href="#vehiculos">Vehículos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rutas">Rutas Turísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item dropdown">
                        <a aria-expanded="false" class="nav-link dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown" href="#" role="button">
                            <span class="material-symbols-outlined fs-5">language</span>
                            <span class="d-none d-lg-inline ms-1">Español</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Español</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{ route('reserva') }}" class="btn btn-accent fw-bold w-100"
                            onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">Reservar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="inicio">
        <section class="hero-section d-flex align-items-center justify-content-center text-center text-white py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <h1 class="display-4 fw-bolder">Tu Viaje, a Tu Manera. Aventuras Salvadoreñas Inolvidables
                            Comienzan Aquí.</h1>
                        <p class="lead text-muted-dark mt-3">Explora El Salvador con nuestro servicio premium de
                            alquiler de coches. Confort, fiabilidad y aventura te esperan.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 🔹 ID agregado: vehiculos -->
        <section id="vehiculos" class="py-5">
            <div class="container">
                <h2 class="fw-bold h3 px-3 mb-4">Nuestra Diversa Flota</h2>
                <div class="row g-4 px-3">
                    @foreach ($sedanes as $auto)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-img-top-bg"
                                    style="background-image: url('{{ asset('img/' . $auto['imagen']) }}');">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-medium">
                                        {{ $auto['marca'] }} {{ $auto['modelo'] }} {{ $auto['anio'] }}
                                    </h5>
                                    <p class="card-text text-muted">Color: {{ $auto['color'] }}</p>
                                    <p class="card-text">{{ $auto['descripcion'] }}</p>
                                    <p class="fw-bold text-accent mb-2">Desde ${{ $auto['precio'] }}/día</p>
                                    <a href="{{ route('reserva') }}" class="btn btn-accent fw-bold mt-auto"
                                        onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
                                        Reservar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- 🔹 ID agregado: servicios -->
        <section id="servicios" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="display-6 fw-bold">Servicios a la Medida de Tus Necesidades</h2>
                        <p class="lead text-muted">Ya sea que regreses a casa o visites como turista, tenemos el
                            servicio perfecto para que tu viaje sea fluido y agradable.</p>
                    </div>
                </div>
                <div class="row g-4 mt-3">
                    <div class="col-md-4">
                        <div class="card h-100 border-light-subtle">
                            <div class="card-body">
                                <span class="material-symbols-outlined text-accent fs-1">flight_takeoff</span>
                                <h3 class="card-title fs-5 fw-bold mt-2">Transporte Aeroportuario</h3>
                                <p class="card-text text-muted">Recogida y bienvenida en el aeropuerto para nuestros
                                    compatriotas. Te damos la bienvenida a casa con comodidad y estilo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-light-subtle">
                            <div class="card-body">
                                <span class="material-symbols-outlined text-accent fs-1">supervisor_account</span>
                                <h3 class="card-title fs-5 fw-bold mt-2">Servicio de Chófer</h3>
                                <p class="card-text text-muted">Relájate y disfruta del viaje con nuestros chóferes
                                    profesionales y discretos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-light-subtle">
                            <div class="card-body">
                                <span class="material-symbols-outlined text-accent fs-1">navigation</span>
                                <h3 class="card-title fs-5 fw-bold mt-2">Opción de Autoconducción</h3>
                                <p class="card-text text-muted">Toma el control de tu viaje y explora El Salvador a tu
                                    propio ritmo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 🔹 ID agregado: rutas -->
        {{-- <section id="rutas" class="py-5">
            <div class="container">
                <h2 class="fw-bold h3 mb-4">Explora Rutas Turísticas en El Salvador</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card text-white tour-route-card rounded-3 overflow-hidden"
                            data-alt="A beautiful sunny beach in El Tunco"
                            style='background-image: linear-gradient(to top, rgba(10, 35, 66, 0.9) 0%, transparent 50%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCIvgHY9hJS1A6UXBXVX9vXNonKS428r4OlJ8VUGl32fMWv6JLaznxF7lWk3Xdz_3bqwO9vofit7Fk4cHeX-qqu3AADHnjuMz20XjYybgKiam1cJGWitlZ2WbPFoNN2e-VW55fxGClRVpNEMC0Cz1XrscBxbGYRyp0pUyXS_-9NUIUe18OyQ6mojZ8tHt4-tMKa8kOzyLDZFsAOEh6K-VIWvr_nmRMJlInbE0UswTSK3YAhlxhhh3JvIeqx927jeoD93ODa1IeZZfna")'>
                            <div class="card-body d-flex flex-column justify-content-end p-4">
                                <h3 class="card-title h4 fw-bold">Ruta de las Playas</h3>
                                <p class="card-text text-muted-dark mb-0">Descubre las famosas playas para surfear como
                                    El Tunco y El Zonte.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white tour-route-card rounded-3 overflow-hidden"
                            data-alt="Lush green mountains and volcanoes in El Salvador"
                            style='background-image: linear-gradient(to top, rgba(10, 35, 66, 0.9) 0%, transparent 50%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBoz4UBpO9L9-nu8qXuZmZGDjB8AqVUdA8-wl-qULWkseNKcaW9JQCgq_itKrQ-gnN7OaM7BXt_fGcZo8e1Cd2NaJXfILVcdcnphm7ILWWqAJpTDnNvqMaGmlTIPmHOtj2tJ-9mVLWfJZ8_0SsxEqdvSNs-lGCtry_rim7PczKZl0o-Ky41yNikt0VOHKkULQ39WlkmTpOA_v5bH7o5qq2LlSDKyo2BmHy9NuKJQfWsdxhBHoiV4j0MpSYiXj1aKqB0eJaMd93iOjNy")'>
                            <div class="card-body d-flex flex-column justify-content-end p-4">
                                <h3 class="card-title h4 fw-bold">Ruta de las Flores</h3>
                                <p class="card-text text-muted-dark mb-0">Experimenta la cultura, el café y los pueblos
                                    coloridos de Apaneca y Ataco.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <section id="rutas" class="py-5 bg-light">
            <div class="container">
                <h2 class="fw-bold h3 text-center text-primary mb-4">Explora Rutas Turísticas en El Salvador</h2>

                <!-- Filtros -->
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                    <button class="btn btn-success btn-sm rounded-pill">Todas</button>
                    <button class="btn btn-outline-success btn-sm rounded-pill">Playa</button>
                    <button class="btn btn-outline-success btn-sm rounded-pill">Montañas</button>
                    <button class="btn btn-outline-success btn-sm rounded-pill">Arqueología</button>
                    <button class="btn btn-outline-success btn-sm rounded-pill">Ruta del Café</button>
                </div>

                <!-- Tarjetas -->
                <div class="row g-4">
                    <!-- Ruta de las Flores -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-img-top-bg"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDjT6qorxAvdJ_u03sqF1ivXIHDy0zwYIgxTOO4PmW5ASBaCz1u0Hk8S5zSN2hmBRv1bz3-qg5j1ewOU58yJwXgdURqjc8-WrAP50R1UWr3_sArRQ7ULzBBeQiwkPJ_KdTCpEtUPFhWbHMhrz5lScWoTPanCPwonZctYP_CFTrcvo513Ct7_1FPPlC_H2SWpHaAef9uwGtDJSeQf5krufywMFaqImGcwG0W3tUsnLC0GdU10xvWm5v7Ho0XRgGeUV6JaJ_ZLHb_-Dhr'); min-height: 200px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-primary">Ruta de las Flores</h5>
                                <p class="text-muted">Pueblos pintorescos, plantaciones de café y mercados de fin de
                                    semana.</p>
                                <div class="d-flex gap-3 small text-muted mb-3">
                                    <span><i class="bi bi-clock me-1"></i>2 días</span>
                                    <span><i class="bi bi-geo-alt me-1"></i>50 km</span>
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-primary fw-bold">Explorar Ruta</a>
                                    <a href="{{ route('reserva') }}"
                                        class="btn btn-accent btn-sm fw-bold">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ruta de la Paz -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-img-top-bg"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAuTJKi1vU0LanrKXbLarcKYR9z_UQdM_Ej_8AbwpzTIyiFox86kOPy8dABzR-QeCo2WCa8YwikuTOnXlSabOD_WZNhrrKOd63wXk4zpQyJeZV8FK-Q_ehSw8oYeHmD9PBhj0VTxWwsceLdrsBf25YOrO_i_Zf8z8gARSupVsAbdcRHxuf8FKJMg9_wzyw8GN_jImEVM8sJWUtTqhUskIne8v93VHGyXcDD9hVRMHkb62PZNrM_RIZlBYnde6vUTempz1npU-QwK5tz'); min-height: 200px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-primary">Ruta de la Paz</h5>
                                <p class="text-muted">Viaje a través de sitios históricos en el departamento de
                                    Morazán.</p>
                                <div class="d-flex gap-3 small text-muted mb-3">
                                    <span><i class="bi bi-clock me-1"></i>3 días</span>
                                    <span><i class="bi bi-geo-alt me-1"></i>120 km</span>
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-primary fw-bold">Explorar Ruta</a>
                                    <a href="{{ route('reserva') }}"
                                        class="btn btn-accent btn-sm fw-bold">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ruta del Sol y Playa -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-img-top-bg"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDNNnjP_nFH5SLfpg6jiQywWJYm7P8MGPQ5jcmrgFaWIUaaaqtivcxaa52V-z2aT1zapx-EVNFwWaE5NnFxa14Jyk3jo12BuMOHg-A-Tta3eHTFPvUT1-KM4IyG2STRao2yWamYEyawWvtxPySHvb58i776eOmpdfF1zeZcupacP0EGljno8YFepcd3ogZI9eCTtjQz2C3Zl3tLk2SFkDrYS0JaZH7llsR4H3h-2bzgGhL9NHLR30AIYPTTElT_iaZm9LsNjZYJqwYh'); min-height: 200px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-primary">Ruta del Sol y Playa</h5>
                                <p class="text-muted">Descubra las mejores playas y pueblos costeros de La Libertad.
                                </p>
                                <div class="d-flex gap-3 small text-muted mb-3">
                                    <span><i class="bi bi-clock me-1"></i>1–4 días</span>
                                    <span><i class="bi bi-geo-alt me-1"></i>80 km</span>
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-primary fw-bold">Explorar Ruta</a>
                                    <a href="{{ route('reserva') }}"
                                        class="btn btn-accent btn-sm fw-bold">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ruta Arqueológica -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-img-top-bg"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBGxoAGppXh5-TbmTO5r3FLDmULTr3i4p7DtfHU_D6g9s2LBMJsSY5wA5qAxO02bhxPgbdcWaX6NC98_wiwizUXvwTmDw0xZz6RwJ-cNUrG0HoHSOxV-TkpFCxqhoxh4XYSLglzv_i7k2ry3982NHtnj4gxT29Vn-RylbiDIuWiGNtsfpa5-3bq3DBitKhcHXszEzgUh21fukc_1tDvuPlDEApzqTmnFOHkT6L6hgUdMGl5lxbw4bqCu346UXu8zNjYUqhoL0InFHQN'); min-height: 200px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-primary">Ruta Arqueológica</h5>
                                <p class="text-muted">Explore sitios mayas clave como Joya de Cerén y Tazumal.</p>
                                <div class="d-flex gap-3 small text-muted mb-3">
                                    <span><i class="bi bi-clock me-1"></i>1 día</span>
                                    <span><i class="bi bi-geo-alt me-1"></i>60 km</span>
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-primary fw-bold">Explorar Ruta</a>
                                    <a href="{{ route('reserva') }}"
                                        class="btn btn-accent btn-sm fw-bold">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ruta del Café -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-img-top-bg"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBSLhrIRFrSXXwvfq4j9wGkOKayk44fkrjOFdTtXcanftZFRgkLiUgTkqtWlGDn8XzwC9XkCApR77B1YXyk7-ql7U6EoJMW8HDcelGBcD2DSItug8fgMidwld1RxnFRUsnkBTSw8m6Eb3sMBb-8cf8Rb_HPUw-yFJUYnDux0eyrDl1b6LY5nm_VUcygE5D7LQHz5iarhIcpVqSi-3QKqyJ7RdStVVfwgXCh4KFo_CvkIEiCkBDdJwuL1_JTXawq6ipz18MNmM5mi8w0'); min-height: 200px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-primary">Ruta del Café</h5>
                                <p class="text-muted">Visite fincas de café de altura y pruebe granos de clase mundial.
                                </p>
                                <div class="d-flex gap-3 small text-muted mb-3">
                                    <span><i class="bi bi-clock me-1"></i>1–2 días</span>
                                    <span><i class="bi bi-geo-alt me-1"></i>75 km</span>
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-primary fw-bold">Explorar Ruta</a>
                                    <a href="{{ route('reserva') }}"
                                        class="btn btn-accent btn-sm fw-bold">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ruta de los Volcanes -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-img-top-bg"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDN5UVG014PkOmPrH5aYugTw-iTVMFg28OlpfMuGCWtN81PxObjpjJ_evVj9YHfBySqHbEyg0fpRVGraPieqt6YEVy5Ka4NIb4-sEB5Lqer1mKBm0qJ0unmSfSoh9FZZoVZXwKI553EotooB49_vvo5BNhSmshN7jlErz3_6rYCjgp9eodtifJTVdzYT16kF98Ra8UG4CWXQyKBh7PjPGUrtvh20tUyRHj_5Hh6WmonatNp6NLhlvgdL0qiGXsqanBswNRJffwwFAks'); min-height: 200px;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold text-primary">Ruta de los Volcanes</h5>
                                <p class="text-muted">Escale majestuosos volcanes y disfrute de vistas panorámicas.</p>
                                <div class="d-flex gap-3 small text-muted mb-3">
                                    <span><i class="bi bi-clock me-1"></i>2 días</span>
                                    <span><i class="bi bi-geo-alt me-1"></i>90 km</span>
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-primary fw-bold">Explorar Ruta</a>
                                    <a href="{{ route('reserva') }}"
                                        class="btn btn-accent btn-sm fw-bold">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- 🔹 Ancla invisible para "Sobre Nosotros" (no cambia el diseño) -->
        <span id="nosotros" aria-hidden="true" style="display:block;height:0;"></span>

    </main>

    <!-- 🔹 ID agregado: contacto -->
    <footer id="contacto" class="bg-primary text-white pt-5 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold">SOFÍA RENTA CAR</h5>
                    <p class="text-muted-dark small">Tu llave para explorar El Salvador con libertad y estilo.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold">Enlaces Rápidos</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted-dark"
                                href="#vehiculos">Vehículos</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted-dark"
                                href="#servicios">Servicios</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted-dark" href="#nosotros">Sobre
                                Nosotros</a></li>
                        <li class="nav-item mb-2"><a class="nav-link p-0 text-muted-dark"
                                href="#contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold">Contáctanos</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2 d-flex align-items-center text-muted-dark small">
                            <span class="material-symbols-outlined me-2">call</span>
                            <span>+503 2555-1234</span>
                        </li>
                        <li class="nav-item mb-2 d-flex align-items-center text-muted-dark small">
                            <span class="material-symbols-outlined me-2">mail</span>
                            <span>hola@sofiarent.com.sv</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold">Síguenos</h5>
                    <div class="d-flex">
                        <a class="text-muted-dark me-3" href="#">
                            <svg aria-hidden="true" class="bi" fill="currentColor" height="24"
                                width="24">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                </path>
                            </svg>
                        </a>
                        <a class="text-muted-dark me-3" href="#">
                            <svg aria-hidden="true" class="bi" fill="currentColor" height="24"
                                width="24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.299 1.634 4.208 3.803 4.649-.608.166-1.254.204-1.86.074.593 1.875 2.32 3.24 4.35 3.275-1.78 1.48-4.01 2.28-6.35 2.2-2.02-.122-4.09-.756-6.02-1.725 2.2 1.523 4.89 2.38 7.78 2.38 9.25 0 14.3-7.82 13.9-14.64.98-.71 1.83-1.6 2.5-2.6z">
                                </path>
                            </svg>
                        </a>
                        <a class="text-muted-dark" href="#">
                            <svg aria-hidden="true" class="bi" fill="currentColor" height="24"
                                width="24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3 border-secondary border-opacity-25" />
            <div class="text-center">
                <p class="mb-0 text-muted-dark small">© {{ date('Y') }} SOFÍA RENTA CAR. Todos los derechos
                    reservados.</p>
            </div>
        </div>
    </footer>
    <script crossorigin="anonymous" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
