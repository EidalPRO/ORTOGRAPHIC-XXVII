@extends('layouts.home')

@section('title', 'Ortographic - Fotos')

@section('nav')
<ul>
    <li><a href="/">Inicio<br></a></li>
    <li><a href="/acerca-de">Acerca de Ortographic</a></li>
    <li><a href="/galeria" class="active">Galeria de imagenes</a></li>
    @if (Route::has('login'))
        @auth
        <li><a href="{{ route('home') }}">Empezar a practicar</a></li>
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
@endsection

@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/hero-bg.webp);">
    <div class="container">
        <h1>Galeria fotografica</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="/">Inicio</a></li>
                <li class="current">Galeria de fotos</li>
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
                    <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Product 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Branding 1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur</p>
                        <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

            </div><!-- End Porfolio Container -->

        </div>

    </div>

</section><!-- /Portfolio Section -->

@endsection

@section('preloader')
<!-- Preloader -->
<div id="preloader"></div>
@endsection