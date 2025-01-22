@extends('layouts.home')

@section('title', 'Ortographic - la app que hace de la ortografía un juego')

@section('nav')
<ul>
    <li><a href="" class="active">Inicio<br></a></li>
    <li><a href="/acerca-de">Acerca de Ortographic</a></li>
    <li><a href="/galeria">Galeria de imagenes</a></li>
    <li class="dropdown"><a href="#"><span>Acciones de usuario</span> <i
                class="bi bi-chevron-down toggle-dropdown"></i></a>
        <ul>
            <li><a href="#">Iniciar sesión</a></li>
            <li><a href="#">Registrarse</a></li>
            <li><a href="{{route('invitado')}}">Jugar como invitado</a></li>
        </ul>
    </li>
</ul>
@endsection


@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <img src="assets/img/hero-bg.webp" alt="" data-aos="fade-in">

    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h1 data-aos="fade-up">Ortographic</h1>
                <h5>La app que hace de la ortografía un juego</h5>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <p>Ortographic es una plataforma diseñada para ayudarte a mejorar tu ortografía de una
                        manera divertida y educativa. Nos comprometemos a ofrecerte una experiencia interactiva
                        que haga que aprender ortografía sea más fácil y entretenido que nunca.</p>
                </blockquote>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="" class="btn-get-started">Empezar a practicar</a>
                    <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                </div>
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->

<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>¿Comó funciona Ortographic?</h2>
        <p>Puedes dercargar cualquiera de nuestros dos manuales en cualquier momento.</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.54/build/spline-viewer.js"></script>

            <div class="col-lg-6 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="icon flex-shrink-0"><i class="bi bi-cloud-arrow-down" style="color: #15a04a;"></i>
                </div>
                <div>
                    <h4 class="title">Manual de usuario.</h4>
                    <p class="description">Obtén consejos y trucos útiles en nuestra guía del usuario para
                        aprovechar al máximo Ortographic.</p>
                    <a href="#" class="readmore stretched-link"><span>Descargar</span><i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
                <div class="icon flex-shrink-0"><i class="bi bi-cloud-arrow-down" style="color: #1335f5;"></i>
                </div>
                <div>
                    <h4 class="title">Manual de instalación.</h4>
                    <p class="description">Descarga nuestra guía de instalación para configurar rápidamente
                        Ortographic en tu dispositivo.</p>
                    <a href="#" class="readmore stretched-link"><span>Descargar</span><i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div><!-- End Service Item -->

        </div>

    </div>

</section><!-- /Services Section -->

<!-- Features Section -->
<section id="features" class="features section">

    <div class="container">
        <div class="row">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <h3 class="mb-0"></h3>
                <h3>¿Qué ofrecemos?</h3>

                <div class="row gy-4">

                    <div class="col-md-6 autoBLur">
                        <div class="icon-list d-flex">
                            <i class="bi bi-controller" style="color: #5578ff;"></i>
                            <span>Aprendizaje divertido con <strong>minijuegos interactivos</strong></span>
                        </div>
                    </div><!-- End Icon List Item-->

                    <div class="col-md-6 autoBLur">
                        <div class="icon-list d-flex">
                            <i class="bi bi-graph-up" style="color: #e80368;"></i>
                            <span><strong>Seguimiento personalizado</strong> del progreso del estudiante</span>
                        </div>
                    </div><!-- End Icon List Item-->

                    <div class="col-md-6 autoBLur">
                        <div class="icon-list d-flex">
                            <i class="bi bi-book" style="color: #ffa76e;"></i>
                            <span>Más de <strong>50 reactivos</strong> para mejorar la ortografía</span>
                        </div>
                    </div><!-- End Icon List Item-->

                    <div class="col-md-6 autoBLur">
                        <div class="icon-list d-flex">
                            <i class="bi bi-laptop" style="color: #11dbcf;"></i>
                            <span>Diseño <strong>intuitivo</strong> y accesible desde cualquier
                                dispositivo</span>
                        </div>
                    </div><!-- End Icon List Item-->

                    <div class="col-md-6 autoBLur">
                        <div class="icon-list d-flex">
                            <i class="bi bi-award" style="color: #ff33dd;"></i>
                            <span>Logros y <strong>recompensas</strong> para motivarte a aprender</span>
                        </div>
                    </div><!-- End Icon List Item-->
                </div>
            </div>

            <div class="col-lg-5 position-relative autoBLur" data-aos="zoom-out" data-aos-delay="200">
                <div class="phone-wrap">
                    <img src="assets/img/logo-ortographic.webp" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>

    </div>

    <div class="details">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <h4>Importancia de la buena ortografía.</h4>
                    <p style="text-align: justify;">La ortografía correcta es esencial para una comunicación
                        escrita clara y efectiva. No solo facilita la comprensión del mensaje, sino que también
                        muestra atención al detalle y respeto por el lector. En contextos profesionales,
                        académicos y personales, una buena ortografía puede diferenciar entre una comunicación
                        exitosa y una que no lo es. Mejora tu credibilidad, imagen y puede abrir nuevas
                        oportunidades, por lo que invertir tiempo en mejorar tus habilidades ortográficas es muy
                        valioso.</p>
                    <a href="{{route('invitado')}}" class="btn-get-started">Practica en modo invitado</a>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Features Section -->
@endsection

@section('preloader')
<!-- Preloader -->
<div id="preloader"></div>
@endsection