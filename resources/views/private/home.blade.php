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
    <link href="assets/img/logo-ortographic.webp" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css" rel="stylesheet')}}">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('assets/css/home.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="index-page">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{route('home')}}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{asset('assets/img/logo-ortographic(1000x10000).webp')}}" alt="">
                <h1 class="sitename">Ortographic</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="" class="active">Inicio<br></a></li>
                    <li><a href="/acerca-de">Acerca de Ortographic</a></li>
                    <li><a href="/galeria">Galeria de imagenes</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="#" onclick="showNameChangeDialog()"> {{Auth::user()->name}} </a></li>
                    <li><a href="#salas">Empezar a practicar</a></li>
                    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                    @else
                    <li class="dropdown"><a href="#"><span>Acciones de usuario</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                            <li><a href="{{route('registro')}}">Registrarse</a></li>
                            <li><a href="{{route('invitado')}}">Jugar como invitado</a></li>
                        </ul>
                    </li>
                    @endauth
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
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
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        @if (Route::has('login'))
                        @auth
                        <h1 data-aos="fade-up">¡Bienvenido {{ Auth::user()->name }} a Ortographic!</h1>
                        @else
                        <h1 data-aos="fade-up">¡Bienvenido a Ortographic!</h1>
                        @endauth
                        @endif
                        <p data-aos="fade-up" data-aos-delay="100">La app que hace de la ortografía un juego</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#salas" class="btn-get-started">Empezar a practicar<i class="bi bi-arrow-right"></i></a>
                            <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{asset('assets/img/logo-ortographic(1000x10000).webp')}}" class="img-fluid animated" alt="" style="width: 500px">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Values Section -->
        <section id="salas" class="values section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Salas</h2>
                <p>Sala global y salas personalizadas<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100"></div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card glob">
                            <img src="{{asset('assets/img/Education.svg')}}" class="img-fluid" alt="">
                            <h3>Sala global</h3>
                            <p>La Sala Global es una funcionalidad diseñada exclusivamente para la práctica en tiempo real. Los usuarios pueden acceder a minijuegos y retos interactivos de ortografía, pero no se guarda ningún progreso</p>
                            <button class="btn btn-outline-primary" style="position:absolute; bottom:10px" id="btn1">Entrar</button>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card p">
                            <img src="{{asset('assets/img//Task list.svg')}}" class="img-fluid" alt="">
                            <h3>Salas personalizadas</h3>
                            <p>Las Salas Personalizadas son espacios creados por docentes para un aprendizaje más estructurado y adaptado a las necesidades de sus estudiantes. En estas salas, se guarda el progreso de cada estudiante, permitiéndoles visualizar su nivel de mejora a lo largo del tiempo. Además, los docentes pueden aplicar evaluaciones, tanto diagnósticas como de fin de curso, para medir el avance y el dominio de las habilidades ortográficas.</p>
                            <button id="btnEntrar" class="btn btn-outline-primary" style="position:absolute; bottom:10px" data-bs-toggle="modal" data-bs-target="#salasModal">Entrar</button>
                        </div>
                    </div><!-- End Card Item -->
                    <div class="col-lg-2" data-aos="fade-up" data-aos-delay="100"></div>
                </div>

            </div>

        </section><!-- /Values Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container " data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-2"></div>
                    @php
                    $usuariosRegistrados = \App\Models\User::count();
                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $usuariosRegistrados }}" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Usuarios</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->


                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-journal-richtext color-orange flex-shrink-0" style="color: #ee6c20;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Modos de practica</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
                <div class="col-lg-2"></div>
            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="stats section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>¿Comó funciona Ortographic?</h2>
                <p>Puedes dercargar cualquiera de nuestros dos manuales en cualquier momento.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-cloud-arrow-down color-orange flex-shrink-0" style="color:rgb(178, 22, 22);"></i>
                            <div>
                                <p>Modos de practica</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-cloud-arrow-down color-orange flex-shrink-0" style="color:rgb(13, 26, 150);"></i>
                            <div>
                                <p>Modos de practica</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
                <div class="col-lg-2"></div>
            </div>

        </section><!-- /Services Section -->

        <!-- Alt Features Section -->
        <section id="alt-features" class="alt-features section">

            <div class="container">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>¿Qué ofrecemos?</h2>
                    <p>Ortographic tiene.</p>
                </div><!-- End Section Title -->

                <div class="row gy-5">

                    <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

                        <div class="row align-self-center gy-5">

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-award"></i>
                                <div>
                                    <!-- <h4>Entretenimiento</h4> -->
                                    <h4>Aprendizaje divertido con <strong>minijuegos interactivos</strong></h4>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-card-checklist"></i>
                                <div>
                                    <h4>Más de <strong>50 reactivos</strong> para mejorar la ortografía</h4>
                                    <!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p> -->
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-book"></i>
                                <div>
                                    <h4>Seguimiento personalizado</strong> del progreso del estudiante</h4>
                                    <!-- <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p> -->
                                </div>
                            </div><!-- End Feature Item -->

                            <!-- <div class="col-md-6 icon-box">
                                <i class="bi bi-lightning-charge"></i>
                                <div>
                                    <h4>Logros y <strong>recompensas</strong> para motivarte a aprender</h4>
                                </div>
                            </div> -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-patch-check"></i>
                                <div>
                                    <h4>Diseño <strong>intuitivo</strong> y accesible desde cualquier
                                        dispositivo</h4>
                                    <!-- <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p> -->
                                </div>
                            </div><!-- End Feature Item -->

                        </div>

                    </div>

                    <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{asset('assets/img/alt-features.png')}}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>

        </section><!-- /Alt Features Section -->


        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>información</h2>
                <p>Retroalimentación sobre la ortografía y sus ramas.<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <i class="bi bi-activity icon"></i>
                            <h3>¿Qué es la Ortografía?</h3>
                            <p>La ortografía es el conjunto de reglas que regulan la escritura correcta de las palabras. Es esencial para garantizar una comunicación clara y efectiva en cualquier idioma.</p>
                            <a href="#salas" class="read-more stretched-link"><span>Practicar</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item item-orange position-relative">
                            <i class="bi bi-broadcast icon"></i>
                            <h3>Acentuación</h3>
                            <p>La acentuación es una de las reglas fundamentales de la ortografía. Define cuándo y cómo se deben colocar las tildes en las palabras, lo cual puede cambiar su significado.</p>
                            <a href="#salas" class="read-more stretched-link"><span>Practicar</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item item-teal position-relative">
                            <i class="bi bi-easel icon"></i>
                            <h3>Uso de Mayúsculas</h3>
                            <p>Las mayúsculas se utilizan al inicio de una oración, para nombres propios, y en ciertos casos de énfasis. Su uso correcto es crucial para evitar confusiones y errores gramaticales.</p>
                            <a href="#salas" class="read-more stretched-link"><span>Practicar</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item item-red position-relative">
                            <i class="bi bi-bounding-box-circles icon"></i>
                            <h3>Signos de Puntuación</h3>
                            <p>El uso adecuado de los signos de puntuación (como comas, puntos, signos de interrogación y exclamación) es clave para darle sentido y estructura a los textos.</p>
                            <a href="#salas" class="read-more stretched-link"><span>Practicar</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item item-indigo position-relative">
                            <i class="bi bi-calendar4-week icon"></i>
                            <h3>Homófonos y Parónimos</h3>
                            <p>Las palabras homófonas suenan igual pero tienen significados diferentes, mientras que los parónimos son palabras que se parecen en su forma pero no son idénticas. Ambas pueden causar errores comunes al escribir.</p>
                            <a href="#salas" class="read-more stretched-link"><span>Practicar</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item item-pink position-relative">
                            <i class="bi bi-chat-square-text icon"></i>
                            <h3>Uso de la S y la C</h3>
                            <p>El uso correcto de las letras "s" y "c" es esencial en muchas palabras. La confusión entre estas puede alterar el significado de una palabra y generar errores ortográficos.</p>
                            <a href="#salas" class="read-more stretched-link"><span>Practicar</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->


                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Ortographic Premium</h2>
                <p>Pendiente<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <!-- <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pricing-tem">
                            <h3 style="color: #20c997;">Free Plan</h3>
                            <div class="price"><sup>$</sup>0<span> / mo</span></div>
                            <div class="icon">
                                <i class="bi bi-box" style="color: #20c997;"></i>
                            </div>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pricing-tem">
                            <span class="featured">Featured</span>
                            <h3 style="color: #0dcaf0;">Starter Plan</h3>
                            <div class="price"><sup>$</sup>19<span> / mo</span></div>
                            <div class="icon">
                                <i class="bi bi-send" style="color: #0dcaf0;"></i>
                            </div>
                            <ul>
                                <li>Aida dere</li>
                                <li>Nec feugiat nisl</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div> -->

                </div><!-- End pricing row -->

            </div>

        </section><!-- /Pricing Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonios</h2>
                <p>¿Que te parecio Ortographic?<br></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 1
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contacto</h2>
                <p>Contactanos</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <!-- <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street</p>
                                    <p>New York, NY 535022</p>
                                </div>
                            </div> -->

                            <!-- <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                    <p>+1 6678 254445 41</p>
                                </div>
                            </div> -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Correo eletronico</h3>
                                    <p>soporte.ortographic@gmail.com</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Usuario" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Correo electronico" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Asunto" required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Mensaje" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">cargando</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Su mensaje se envio con exito.</div>

                                    <button type="submit">Enviar mensaje</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

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
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{asset('assets/js/home.js')}}"></script>

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
                    // Llamada AJAX para actualizar
                    axios.put('/update-username', {
                            name: result.value
                        })
                        .then(response => {
                            Swal.fire('Éxito!', response.data.message, 'success');
                            // Actualizar el nombre en la vista
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