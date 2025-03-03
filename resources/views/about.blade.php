@extends('layouts.home')

@section('title', 'Ortographic - acerca de')

@section('nav')
<ul>
@if (Route::has('login'))
        @auth
            <li><a href="/">Inicio<br></a></li>
        @else
            <li><a href="/">Inicio<br></a></li>
        @endauth
    @endif
    <li><a href="/acerca-de" class="active">Acerca de Ortographic</a></li>
    <li><a href="/galeria">Galería de imágenes</a></li>
    @if (Route::has('login'))
        @auth
        <li><a href="{{ route('home') }}">Empezar a practicar</a></li>
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
@endsection

@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/hero-bg.webp);">
    <div class="container">
        <h1>Acerca de Ortographic</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Inicio</a></li>
                <li class="current">Acerca de Ortographic</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container">

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-5">
                <img src="assets/img/logo-ortographic(1000x10000).webp" class="img-fluid" alt="Logo de Ortographic">
            </div>
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>¿Qué es Ortographic?</h3>
                    <p>
                        Ortographic es una plataforma diseñada para ayudarte a mejorar tu ortografía de una
                        manera divertida y educativa. Nos comprometemos a ofrecerte una experiencia interactiva
                        que haga que aprender ortografía sea más fácil y entretenido que nunca.
                    </p>
                    <ul>
                        <h4>Contamos con:</h4>
                        <li><i class="bi bi-check-circle-fill" style="color: #5578ff;"></i> <span>Más de <strong>50 reactivos</strong> para practicar y perfeccionar tus habilidades ortográficas.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #e80368;"></i> <span><strong>Sistema de salas globales y privadas</strong> para aprender y divertirte con tus amigos.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #ffa76e;"></i> <span>Minijuegos interactivos diseñados para <strong>practicar ortografía de manera divertida</strong>.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #11dbcf;"></i> <span>Serie de lecciones estructuradas para aprender reglas ortográficas <strong>de manera efectiva</strong>.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #4233ff;"></i> <span>Modo de práctica accesible <strong>sin necesidad de iniciar sesión</strong>.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #00b894;"></i> <span>Modo de evaluación para medir y seguir tu progreso.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #fdcb6e;"></i> <span><strong>Seguimiento personalizado</strong> de tu desempeño, con estadísticas detalladas.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #74b9ff;"></i> <span>Acceso desde cualquier dispositivo gracias a su <strong>diseño intuitivo y responsivo</strong>.</span></li>
                        <li><i class="bi bi-check-circle-fill" style="color: #6c5ce7;"></i> <span>Sistema de <strong>recompensas y logros</strong> que te motivarán a seguir aprendiendo.</span></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->

<!-- Why Us Section
<section id="why-us" class="why-us section">

    <div class="container">

        <div class="row g-0">
            <h1 class="section-title">Preguntas frecuentes</h1>

            <div class="col-xl-5 img-bg" data-aos="fade-up" data-aos-delay="100">
                <img src="assets/img/why.jpg" alt="">
            </div>

            <div class="col-xl-7 slides position-relative" data-aos="fade-up" data-aos-delay="200">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "centeredSlides": true,
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Let's grow your business together</h3>
                                <h4 class="mb-3">Optio reiciendis accusantium iusto architecto at quia minima maiores quidem, dolorum.</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, ipsam perferendis asperiores explicabo vel tempore velit totam, natus nesciunt accusantium dicta quod quibusdam ipsum maiores nobis non, eum. Ullam reiciendis dignissimos laborum aut, magni voluptatem velit doloribus quas sapiente optio.</p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Unde perspiciatis ut repellat dolorem</h3>
                                <h4 class="mb-3">Amet cumque nam sed voluptas doloribus iusto. Dolorem eos aliquam quis.</h4>
                                <p>Dolorem quia fuga consectetur voluptatem. Earum consequatur nulla maxime necessitatibus cum accusamus. Voluptatem dolorem ut numquam dolorum delectus autem veritatis facilis. Et ea ut repellat ea. Facere est dolores fugiat dolor.</p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Aliquid non alias minus</h3>
                                <h4 class="mb-3">Necessitatibus voluptatibus explicabo dolores a vitae voluptatum.</h4>
                                <p>Neque voluptates aut. Soluta aut perspiciatis porro deserunt. Voluptate ut itaque velit. Aut consectetur voluptatem aspernatur sequi sit laborum. Voluptas enim dolorum fugiat aut.</p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="item">
                                <h3 class="mb-3">Necessitatibus suscipit non voluptatem quibusdam</h3>
                                <h4 class="mb-3">Tempora quos est ut quia adipisci ut voluptas. Deleniti laborum soluta nihil est. Eum similique neque autem ut.</h4>
                                <p>Ut rerum et autem vel. Et rerum molestiae aut sit vel incidunt sit at voluptatem. Saepe dolorem et sed voluptate impedit. Ad et qui sint at qui animi animi rerum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>

    </div>

</section> -->

<!-- como esta construido  -->
<!-- <section>

</section> -->


<!-- Team Section -->
<section id="team" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Equipo de trabajo</h2>
        <p>Conoce a nuestro equipo de trabajo.</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('assets/img/team/autor1.webp') }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href="https://www.facebook.com/eidal.marquezambrosio?locale=es_LA" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/eimar.dev_/" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Eidal Marquez Ambrosio</h4>
                        <span>Autor 1 - Programador junior</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('assets/img/team/autor2.webp') }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>

                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Maia Michelle Morales Ramíres</h4>
                        <span>Autor 2 - Programadora junior</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('assets/img/team/acesor1.webp') }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/roberrume?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4 style="margin-top: 20px;">Roberto Ruiz Mendoza</h4>
                        <span>Asesor técnico</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('assets/img/team/acesor2.webp') }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Elva Yuridia Morales Luis</h4>
                        <span>Asesor metodológico</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

        </div>

    </div>

</section><!-- /Team Section -->

@endsection

@section('preloader')
<!-- Preloader -->
<div id="preloader"></div>
@endsection