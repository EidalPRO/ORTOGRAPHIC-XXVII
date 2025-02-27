@extends('layouts.home')

@section('title', 'Ortographic - Fotos')

@section('nav')
<ul>
    @if (Route::has('login'))
    @auth
    <li><a href="/">Inicio<br></a></li>
    @else
    <li><a href="/">Inicio<br></a></li>
    @endauth
    @endif
    <li><a href="/acerca-de">Acerca de Ortographic</a></li>
    <li><a href="/galeria" class="active">Galería de imágenes</a></li>
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
        <h1>Galería fotográfica</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Inicio</a></li>
                <li class="current">Galería de fotos</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/imagen5.webp') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Presentación</h4>
                        <p>Visitamos la secundaria técnica #38 para hablar de programación y mostrar Ortographic.</p>
                        <a href="{{ asset('assets/img/portfolio/imagen5.webp') }}" title="Presentación" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/imagen6.webp') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Usuario</h4>
                        <p>Usuario practicando su ortografía.</p>
                        <a href="{{ asset('assets/img/portfolio/imagen6.webp') }}" title="Usuario" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/imagen3.webp') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Presentación</h4>
                        <p>Alumnos de secundaria técnica #38 probando la Trivia Ortográfica.</p>
                        <a href="{{ asset('assets/img/portfolio/imagen3.webp') }}" title="Presentación" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/imagen1.webp') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Usuario</h4>
                        <p>Usuario practicando su ortografía.</p>
                        <a href="{{ asset('assets/img/portfolio/imagen1.webp') }}" title="Usuario" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/imagen2.webp') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Entrega de documentos</h4>
                        <p>Entrega y revisión de reactivos con la asesora metodológica.</p>
                        <a href="{{ asset('assets/img/portfolio/imagen2.webp') }}" title="Entrega de documentos" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->
            </div>

        </div>

</section><!-- /Portfolio Section -->

@endsection

@section('preloader')
<!-- Preloader -->
<div id="preloader"></div>
@endsection