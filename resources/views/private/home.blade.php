<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ortographic - Inicio</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo-ortographic.webp') }}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Questrial:wght@400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ortographic</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="" class="active">Inicio<br></a></li>
                    <li><a href="/acerca-de">Acerca de Ortographic</a></li>
                    <li><a href="/galeria">Galeria de imagenes</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="#" onclick="showNameChangeDialog()" class="no-spinner"> {{Auth::user()->name}} </a></li>
                    <li><a href="#jugar" class="no-spinner">Empezar a practicar</a></li>
                    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                    @else
                    <li class="dropdown"><a href="#"><span>Acciones de usuario</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                            <li><a href="{{route('login')}}">Registrarse</a></li>
                            <li><a href="{{route('invitado')}}">Jugar como invitado</a></li>
                        </ul>
                    </li>
                    @endauth
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>

        </div>
    </header>

    <main class="main">
        <!-- slider -->
        <div id="spinner" class="spinner-container">
            <!-- From Uiverse.io by Nawsome -->
            <div class="loader">
                <div>
                    <ul>
                        <li>
                            <svg fill="currentColor" viewBox="0 0 90 120">
                                <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                            </svg>
                        </li>
                        <li>
                            <svg fill="currentColor" viewBox="0 0 90 120">
                                <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                            </svg>
                        </li>
                        <li>
                            <svg fill="currentColor" viewBox="0 0 90 120">
                                <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                            </svg>
                        </li>
                        <li>
                            <svg fill="currentColor" viewBox="0 0 90 120">
                                <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                            </svg>
                        </li>
                        <li>
                            <svg fill="currentColor" viewBox="0 0 90 120">
                                <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                            </svg>
                        </li>
                        <li>
                            <svg fill="currentColor" viewBox="0 0 90 120">
                                <path d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z"></path>
                            </svg>
                        </li>
                    </ul>
                </div><span>Cargando</span>
            </div>
        </div>

        <!-- Hero Section -->
        <section id="hero" class="hero section mt-0">

            <div class="container mt-0" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center content">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h2>Ortographic</h2>
                        <p class="lead">
                            @if (Route::has('login'))
                            @auth
                            ¡Bienvenido {{ Auth::user()->name }} a Ortographic - La app que hace de la ortografía un juego!
                            @else
                            ¡Bienvenido a Ortographic - La app que hace de la ortografía un juego!
                            @endauth
                            @endif
                        </p>
                        <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
                            <a href="#jugar" class="btn btn-primary no-spinner">Jugar</a>
                            @if (Route::has('login'))
                            @auth
                            <a href="{{ route('logout') }}" class="btn btn-outline">Cerrar sesión</a>
                            @else
                            <a href="{{route('invitado')}}" class="btn btn-outline">Jugar como invitado</a>
                            @endauth
                            @endif
                        </div>
                        <div class="hero-stats" data-aos="fade-up" data-aos-delay="400">
                            @php
                            $usuariosRegistrados = \App\Models\User::count();
                            @endphp
                            <div class="stat-item">
                                <span class="stat-number">{{ $usuariosRegistrados }}</span>
                                <span class="stat-label">Usuarios registrados</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3</span>
                                <span class="stat-label">Modos de practica</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3</span>
                                <span class="stat-label">Minijuegos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image">
                            <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="Portfolio Hero Image" class="img-fluid" data-aos="zoom-out" data-aos-delay="300">
                            <div class="shape-1"></div>
                            <div class="shape-2"></div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Hero Section -->


        <!-- Services Section -->
        <section id="jugar" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Jugar</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <p>Sala global y salas personalizadas</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bold mb-4 servies-title">Diviertete practicando la Ortografía</h2>
                        <p class="mb-4">En las salas perzonalizadas, se guarda el progreso de cada estudiante, permitiéndoles visualizar su nivel de mejora a lo largo del tiempo. Además, los docentes pueden aplicar evaluaciones, tanto diagnósticas como de fin de curso, para medir el avance y el dominio de las habilidades ortográficas.</p>
                        <!-- <a href="#"  class="btn btn-outline-primary">See all services</a> -->
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-4">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="service-item">
                                    <i class="icon"><img src="{{asset('assets/img/Education.svg')}}" class="img-fluid" alt=""></i>
                                    <h3><a>Sala global</a></h3>
                                    <p>La Sala Global es una funcionalidad diseñada exclusivamente para la práctica en tiempo real. Los usuarios pueden acceder a minijuegos y retos interactivos de ortografía, pero no se guarda ningún progreso.</p>
                                    <button class="btn btn-outline-primary" id="btn1">Entrar</button>
                                </div>
                            </div><!-- End Service Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="service-item">
                                    <i class="icon"><img src="{{asset('assets/img//Task list.svg')}}" class="img-fluid" alt=""></i>
                                    <h3><a>Salas personalizadas</a></h3>
                                    <p>Las Salas Personalizadas son espacios creados por docentes para un aprendizaje más estructurado y adaptado a las necesidades de sus estudiantes. </p>
                                    <button id="btnEntrar" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#salasModal">Entrar</button>
                                </div>
                            </div><!-- End Service Item -->
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Manuales</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <p>Descarga nuestros manuales</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up">
                <div class="col-12">
                    <div class="row g-4">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200" id="descargarManual" class="no-spinner" style="cursor: pointer;">
                            <div class="service-item">
                                <i class="bi bi-cloud-arrow-down"></i>
                                <h3>Descargar</h3>
                                <p>Manual de usuario</p>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200" id="descargarManual2" class="no-spinner" style="cursor: pointer;">
                            <div class="service-item">
                                <i class="bi bi-cloud-arrow-down"></i>
                                <h3>Descargar</h3>
                                <p>Manual de instalación</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /Starter Section Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Acerca de</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <!-- <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem</p> -->
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6 position-relative" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-image">
                            <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="Profile Image" class="img-fluid rounded-4">
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-content">
                            <span class="subtitle">Acerca de </span>

                            <h2>Ortographic</h2>

                            <p class="lead mb-4">Ortographic es una plataforma diseñada para ayudarte a mejorar tu ortografía de una manera divertida y educativa. Nos comprometemos a ofrecerte una experiencia interactiva que haga que aprender ortografía sea más fácil y entretenido que nunca.</p>

                            <!-- <p class="mb-4">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p> -->

                            <div class="personal-info">
                                <div class="row g-4">
                                    <div class="col-6">
                                        <div class="info-item">
                                            <!-- <span class="label">Name</span> -->
                                            <span class="value">Aprendizaje divertido con <strong>minijuegos interactivos</strong></span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="info-item">
                                            <!-- <span class="label">Phone</span> -->
                                            <span class="value">Más de <strong>50 reactivos</strong> para mejorar la ortografía</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="info-item">
                                            <!-- <span class="label">Age</span> -->
                                            <span class="value">Seguimiento personalizado</strong> del progreso del estudiante</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="info-item">
                                            <!-- <span class="label">Email</span> -->
                                            <span class="value">Diseño <strong>intuitivo</strong> y accesible desde cualquier
                                                dispositivo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="signature mt-4">
                                <div class="signature-image">
                                    <img src="{{asset('assets/img/laravel-logo.webp')}}" alt="" class="img-fluid">
                                </div>
                                <div class="signature-info">
                                    <h4>Tecnologías utilizadas</h4>
                                    <p>El proyecto fue creado principalmente con el Framework de php Laravel, este en su versioón 11. Y para la base de datos se útilizo MySQL.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 skills-animation">

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="skill-box">
                            <h3>HTML</h3>
                            <p>Para el Front End.</p>
                            <span class="text-end d-block">35%</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="skill-box">
                            <h3>CSS + Bootstrap</h3>
                            <p>Para el Front End.</p>
                            <span class="text-end d-block">25%</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="skill-box">
                            <h3>JavaScript</h3>
                            <p>Para darle dinamismo al Front End.</p>
                            <span class="text-end d-block">15%</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="skill-box">
                            <h3>PHP</h3>
                            <p>Para el Back End.</p>
                            <span class="text-end d-block">35%</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Skills Section -->

        <!-- Resume Section -->
        <section id="resume" class="resume section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Retroalimentación</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <p>Información importante.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-12">
                        <div class="resume-wrapper">
                            <div class="resume-block" data-aos="fade-up">
                                <h2>Información</h2>
                                <div class="timeline">
                                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                                        <div class="timeline-left">
                                            <h4 class="company">Ortografía</h4>
                                            <span class="period">Actualidad</span>
                                        </div>
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-right">
                                            <h3 class="position">Importancia</h3>
                                            <p class="description">La ortografía es el conjunto de reglas que regulan la escritura correcta de las palabras. Es esencial para garantizar una comunicación clara y efectiva en cualquier idioma.</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                                        <div class="timeline-left">
                                            <h4 class="company">Acentuación</h4>
                                            <span class="period">Actualidad</span>
                                        </div>
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-right">
                                            <h3 class="position">Reglas fundamentales</h3>
                                            <p class="description">La acentuación define cuándo y cómo se deben colocar las tildes en las palabras, lo cual puede cambiar su significado.</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                                        <div class="timeline-left">
                                            <h4 class="company">Signos de Puntuación</h4>
                                            <span class="period">Actualidad</span>
                                        </div>
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-right">
                                            <h3 class="position">Estructura y sentido</h3>
                                            <p class="description">El uso adecuado de los signos de puntuación es clave para darle sentido y estructura a los textos.</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                                        <div class="timeline-left">
                                            <h4 class="company">Homófonos y Parónimos</h4>
                                            <span class="period">Actualidad</span>
                                        </div>
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-right">
                                            <h3 class="position">Diferencias clave</h3>
                                            <p class="description">Las palabras homófonas suenan igual pero tienen significados diferentes, mientras que los parónimos se parecen en su forma pero no son idénticos.</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
                                        <div class="timeline-left">
                                            <h4 class="company">Uso de la S y la C</h4>
                                            <span class="period">Actualidad</span>
                                        </div>
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-right">
                                            <h3 class="position">Reglas ortográficas</h3>
                                            <p class="description">El uso correcto de las letras "s" y "c" es esencial en muchas palabras. La confusión entre estas puede generar errores ortográficos.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Resume Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Imagenes</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <p>Estas son algunas de nuestras actividades recientes.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                        <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-web">
                            <div class="portfolio-card">
                                <div class="portfolio-image">
                                    <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="" loading="lazy">
                                    <div class="portfolio-overlay">
                                        <div class="portfolio-actions">
                                            <a href="assets/img/portfolio/app-1.jpg" class="glightbox preview-link" data-gallery="portfolio-gallery-web"><i class="bi bi-eye"></i></a>
                                            <!-- <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-content">
                                    <span class="category">Web Design</span>
                                    <h3>Modern Dashboard Interface</h3>
                                    <p>Maecenas faucibus mollis interdum sed posuere consectetur est at lobortis.</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-graphics">
                            <div class="portfolio-card">
                                <div class="portfolio-image">
                                    <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="" loading="lazy">
                                    <div class="portfolio-overlay">
                                        <div class="portfolio-actions">
                                            <a href="assets/img/portfolio/product-1.jpg" class="glightbox preview-link" data-gallery="portfolio-gallery-graphics"><i class="bi bi-eye"></i></a>
                                            <!-- <a href="portfolio-details.html" class="details-link"><i class="bi bi-arrow-right"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-content">
                                    <span class="category">Graphics</span>
                                    <h3>Creative Brand Identity</h3>
                                    <p>Vestibulum id ligula porta felis euismod semper at vulputate.</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->
                    </div><!-- End Portfolio Container -->
                </div>
            </div>

        </section><!-- /Portfolio Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonios</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <p>¿Qué te parecio Ortographic?</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="testimonials-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "slidesPerView": 1,
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 4000
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            }
                        }
                    </script>

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h2>Sed ut perspiciatis unde omnis</h2>
                                        <p>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                        </p>
                                        <p>
                                            Beatae magnam dolore quia ipsum. Voluptatem totam et qui dolore dignissimos. Amet quia sapiente laudantium nihil illo et assumenda sit cupiditate. Nam perspiciatis perferendis minus consequatur. Enim ut eos quo.
                                        </p>
                                        <div class="profile d-flex align-items-center">
                                            <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="profile-img" alt="">
                                            <div class="profile-info">
                                                <h3>Saul Goodman</h3>
                                                <span>Client</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="featured-img-wrapper">
                                            <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="featured-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Testimonial Item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h2>Sed ut perspiciatis unde omnis</h2>
                                        <p>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                        </p>
                                        <p>
                                            Beatae magnam dolore quia ipsum. Voluptatem totam et qui dolore dignissimos. Amet quia sapiente laudantium nihil illo et assumenda sit cupiditate. Nam perspiciatis perferendis minus consequatur. Enim ut eos quo.
                                        </p>
                                        <div class="profile d-flex align-items-center">
                                            <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="profile-img" alt="">
                                            <div class="profile-info">
                                                <h3>Saul Goodman</h3>
                                                <span>Client</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="featured-img-wrapper">
                                            <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="featured-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Testimonial Item -->
                    </div>

                    <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section><!-- /Testimonials Section -->



        <!-- Faq Section -->
        <section id="faq" class="faq section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Preguntas frecuentes</h2>
                <div class="title-shape">
                    <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </div>
                <!-- <p>Encuentra respuestas a las preguntas más frecuentes sobre el uso de nuestra plataforma.</p> -->
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3>¿Cómo puedo iniciar sesión?</h3>
                                <div class="faq-content">
                                    <p>Para iniciar sesión, haz clic en <strong>Iniciar sesión</strong>, que se encuentra dentro de <strong>Acciones de usuario</strong> en la barra de navegación.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item -->

                            <div class="faq-item">
                                <h3>¿Cómo puedo entrar a una sala?</h3>
                                <div class="faq-content">
                                    <p>Para entrar a una sala, debes ingresar el código de sala proporcionado por el creador de la misma.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item -->

                            <div class="faq-item">
                                <h3>¿Necesito una cuenta para jugar un minijuego?</h3>
                                <div class="faq-content">
                                    <p>Sí, debes tener una cuenta creada y haber iniciado sesión para poder jugar un minijuego.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item -->

                            <div class="faq-item">
                                <h3>¿Cómo puedo cambiar mi nombre de usuario?</h3>
                                <div class="faq-content">
                                    <p>Para cambiar tu nombre de usuario, haz clic en tu nombre que aparece en la barra de navegación y selecciona la opción de edición.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item -->

                            <div class="faq-item">
                                <h3>¿Qué hacer si olvidé mi contraseña?</h3>
                                <div class="faq-content">
                                    <p>Puedes restablecer tu contraseña haciendo clic en <strong>¿Olvidaste tu contraseña?</strong> en la página de inicio de sesión y siguiendo las instrucciones.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item -->
                        </div>
                    </div><!-- End Faq Column -->
                </div>
            </div>
        </section><!-- /Faq Section -->

        <!-- Modales -->
        <div class="modal fade" id="salasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Salas personalizadas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul id="listaSalasDisponibles" class="list-group">
                            <!-- Aquí se mostrarán las salas -->
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" data-bs-target="#agregarSalaModal" data-bs-toggle="modal">Agregar sala</button>
                        <button type="button" class="btn btn-warning" data-bs-target="#crearSalaModal" data-bs-toggle="modal">Crear sala</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="crearSalaModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Crear sala</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="crearSalaForm" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la sala</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="container" style="margin-top: 20px; text-align:justify;">
                                <p>Al crear una sala, se generará automáticamente una evaluación diagnóstica compuesta por 15 preguntas, seleccionadas de manera aleatoria entre los reactivos disponibles. Además, tendrás la opción de crear evaluaciones adicionales dentro de la misma sala. También podrás consultar las estadísticas de los resultados obtenidos, así como realizar comparaciones entre los diferentes resultados de las evaluaciones.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-target="#salasModal" data-bs-toggle="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="agregarSalaModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Agregar sala</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="agregarSalaForm" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="codigo">Código de la sala</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-target="#salasModal" data-bs-toggle="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
    </main>

    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-about">
                        <a href="" class="logo d-flex align-items-center">
                            <span class="sitename">Ortographic</span>
                        </a>
                        <p>© 2024 Copyright DGETI - CBTis No. 150.</p>
                        <div class="social-links d-flex mt-4">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-6 footer-links">
                        {{-- <h4>Useful Links</h4> --}}
                        <ul>
                            <p>Proyecto presentado como prototipo de software para la DEGETI.</p>
                            <p>CBTis No 150.</p>
                            <p>Ocotlán de Morelos, Oaxaca, México.</p>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container copyright text-center">
            <!-- <p>© <span>Copyright</span> <strong class="px-1 sitename">Nova</strong> <span>All Rights
            Reserved</span></p> -->
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <button href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></button>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main2.js') }}"></script>

    <script>
        // Mostrar spinner al inicio de la carga
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('spinner').style.display = 'flex';
        });

        // Ocultar cuando todo esté cargado (imágenes, etc.)
        window.addEventListener('load', () => {
            document.getElementById('spinner').style.display = 'none';
        });

        let activeRequests = 0;

        const showSpinner = () => {
            activeRequests++;
            document.getElementById('spinner').style.display = 'flex';
        };

        const hideSpinner = () => {
            activeRequests--;
            if (activeRequests <= 0) {
                document.getElementById('spinner').style.display = 'none';
            }
        };

        // Interceptar Fetch API
        const originalFetch = window.fetch;
        window.fetch = async (...args) => {
            showSpinner();
            try {
                const response = await originalFetch(...args);
                return response;
            } finally {
                hideSpinner();
            }
        };

        // Interceptar XMLHttpRequest
        const originalOpen = XMLHttpRequest.prototype.open;
        XMLHttpRequest.prototype.open = function(...args) {
            this.addEventListener('loadend', hideSpinner);
            showSpinner();
            originalOpen.apply(this, args);
        };

        document.addEventListener('click', (e) => {
            const target = e.target.closest('a, [data-spinner]');
            if (target && !target.hasAttribute('data-ignore-spinner')) {

                if (!target || target.hasAttribute('data-ignore-spinner') || target.classList.contains('no-spinner')) {
                    return;
                }

                showSpinner();
            }
        });

        // Opcional: Ocultar spinner en errores de navegación
        window.addEventListener('beforeunload', () => {
            document.getElementById('spinner').style.display = 'flex';
        });

        // Resetear spinner al cargar/recargar la página
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                document.getElementById('spinner').style.display = 'none';
            }
        });

        document.getElementById('descargarManual').addEventListener('click', function(event) {
            event.preventDefault();

            const url = "{{ asset('assets/pdf/Manual_de_usuario_Ortographic.pdf') }}";
            const filename = 'Manual-de-Usuario-Ortographic.pdf';

            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            hideSpinner();
        });
        document.getElementById('descargarManual2').addEventListener('click', function(event) {
            event.preventDefault();

            const url = "{{ asset('assets/pdf/Manual de instalación.pdf') }}";
            const filename = 'Manual-de-Instalación-Ortographic.pdf';

            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            hideSpinner();
        });
        document.addEventListener('DOMContentLoaded', function() {
            fetch("{{ route('salas.get') }}")
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const salas = data.salas;
                        const rol = data.rol;
                        const esPremium = data.esPremium;
                        const user = data.user;
                        const listaSalas = document.getElementById('listaSalasDisponibles');

                        if (salas.length > 0) {
                            salas.forEach(sala => {
                                let listItem = document.createElement('li');
                                listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'mb-2');

                                listItem.innerHTML = `
                                <div class="texto-salas">
                                    <strong>${sala.codigo_sala}</strong><br>
                                    ${sala.nombre}
                                </div>
                                <div>
                                    <a href="/sala/personalizada/${sala.codigo_sala}" class="btn btn-success btn-sm">Entrar</a>
                                    <button class="btn btn-danger btn-sm" onclick="confirmarSalida('${sala.id_sala}')">Salir</button>
                                </div>
                            `;
                                listaSalas.appendChild(listItem);
                            });
                        } else {
                            listaSalas.innerHTML = '<li class="list-group-item">No se encontraron salas para este usuario.</li>';
                        }

                        // Manejar la lógica para mostrar/ocultar botones según el rol y el tipo de cuenta
                        const crearSalaButton = document.querySelector('.btn-warning[data-bs-target="#crearSalaModal"]');
                        const agregarSalaButton = document.querySelector('.btn-primary[data-bs-target="#agregarSalaModal"]');

                        // Administradores pueden crear salas
                        if (rol === 3) {
                            crearSalaButton.style.display = 'block';
                            agregarSalaButton.style.display = 'block';
                        }

                        // Docentes pueden crear salas
                        if (rol === 2) {
                            if (esPremium) {
                                crearSalaButton.style.display = 'block';
                                agregarSalaButton.style.display = 'block';
                            } else {
                                // Límite de 5 salas para docentes con cuenta gratuita
                                if (salas.length < 5) {
                                    crearSalaButton.style.display = 'block';
                                } else {
                                    crearSalaButton.style.display = 'none';
                                }
                                agregarSalaButton.style.display = 'block';
                            }
                        }

                        // Alumnos no pueden crear salas
                        if (rol === 1) {
                            if (esPremium) {
                                // Límite de 10 salas creadas para alumnos con cuenta premium
                                if (salas.length < 10) {
                                    crearSalaButton.style.display = 'block';
                                } else {
                                    crearSalaButton.style.display = 'none';
                                }
                                agregarSalaButton.style.display = 'block';
                            } else {
                                // Límite de 2 salas para alumnos con cuenta gratuita
                                if (salas.length < 2) {
                                    agregarSalaButton.style.display = 'block';
                                } else {
                                    agregarSalaButton.style.display = 'none';
                                }
                                crearSalaButton.style.display = 'none';
                            }
                        }
                    }
                })
                .catch(error => {
                    console.error('Error al obtener las salas:', error);
                });
        });
        document.getElementById('crearSalaForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let nombre = formData.get('nombre');

            fetch("{{ route('sala.create') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        user_id: '{{ Auth::id() }}' // Incluir el ID del usuario autenticado
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Sala creada',
                            text: `El código de la sala es: ${data.sala.codigo_sala}`,
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Copiar código',
                            cancelButtonText: 'Cerrar'
                        }).then((result) => {
                            // Cerrar el modal de creación de sala
                            $('#crearSalaModal').modal('hide');

                            if (result.isConfirmed) {
                                navigator.clipboard.writeText(data.sala.codigo_sala);
                                Swal.fire('Copiado!', 'El código ha sido copiado al portapapeles.', 'success');
                            }

                            // Abrir el modal de salas personalizadas
                            $('#salasModal').modal('show');
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message,
                            icon: 'error'
                        }).then(() => {
                            // Cerrar el modal de creación de sala
                            $('#crearSalaModal').modal('hide');

                            // Abrir el modal de salas personalizadas
                            $('#salasModal').modal('show');
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error al crear la sala.',
                        icon: 'error'
                    }).then(() => {
                        // Cerrar el modal de creación de sala
                        $('#crearSalaModal').modal('hide');

                        // Abrir el modal de salas personalizadas
                        $('#salasModal').modal('show');
                    });
                });
        });

        document.getElementById('agregarSalaForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let codigo = formData.get('codigo');

            fetch("{{ route('sala.agregar') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        codigo: codigo,
                        user_id: '{{ Auth::id() }}' // Incluir el ID del usuario autenticado
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Éxito',
                            text: data.message,
                            icon: 'success'
                        }).then(() => {
                            // location.reload();
                            // $('#salasModal').modal('show');
                            window.location.href = `/sala/personalizada/${codigo}`
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message,
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ha ocurrido un error al agregar la sala.',
                        icon: 'error'
                    }).then(() => {
                        // Cerrar el modal de agregar sala
                        $('#agregarSalaModal').modal('hide');

                        // Abrir el modal de salas personalizadas
                        $('#salasModal').modal('show');
                    });
                });
        });
        const gb = document.getElementById('btn1');
        gb.addEventListener('click', function() {
            window.location.href = "{{route('entrarGlobal')}}";
        });

        function confirmarSalida(salaId) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Si sales de la sala, se eliminarán todos tus datos en ella.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, salir",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Petición al backend para eliminar registros y salir de la sala
                    fetch(`/salir-sala/${salaId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Eliminado", "Has salido de la sala correctamente.", "success")
                                    .then(() => location.reload()); // Recargar la página para actualizar la lista de salas
                            } else {
                                Swal.fire("Error", "No se pudo salir de la sala.", "error");
                            }
                        })
                        .catch(error => {
                            Swal.fire("Error", "Hubo un problema en el servidor.", "error");
                        });
                }
            });
        }


        var isLogged = @json(auth() -> check());

        document.getElementById('btnEntrar').addEventListener('click', function(e) {
            if (!isLogged) {
                e.preventDefault(); // Evita que se abra el modal

                Swal.fire({
                    icon: 'warning',
                    title: 'Debes iniciar sesión',
                    text: 'Para continuar, por favor inicia sesión.',
                    confirmButtonText: 'Aceptar',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    }
                });
            }
        });
    </script>
    @if (Route::has('login'))
    @auth
    <script>
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function showNameChangeDialog() {
            document.getElementById('spinner').style.display = 'none';

            Swal.fire({
                title: 'Cambiar nombre de usuario',
                input: 'text',
                inputValue: '{{ Auth::user()->name }}',
                showCancelButton: true,
                confirmButtonText: 'Actualizar',
                cancelButtonText: 'Cancelar',
                inputValidator: (value) => {
                    if (!value) {
                        return 'El nombre no puede estar vacío!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put('/update-username', {
                            name: result.value
                        })
                        .then(response => {
                            Swal.fire('Éxito!', response.data.message, 'success');
                            document.querySelector('[href="#"]').textContent = result.value;
                        })
                        .catch(error => {
                            Swal.fire('Error', error.response.data.message, 'error');
                        });
                }
            });
        }
    </script>
    @endauth
    @endif


</body>

</html>