@extends('layouts.home')


@section('title', 'Ortographic - Inicio')

@section('nav')
<ul>
    <li><a href="/home" class="active">Inicio<br></a></li>
    <li><a href="/acerca-de">Acerca de Ortographic</a></li>
    <li><a href="/galeria">Galeria de imagenes</a></li>
    @if (Route::has('login'))
    @auth
    <li><a href="">{{ Auth::user()->name }}</a></li>
    @endauth
    @endif

    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
</ul>
@endsection

@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/hero-bg.webp);">
    <div class="container">
        <h1>Bienvenido, {{ Auth::user()->name }}</h1>
    </div>
</div><!-- End Page Title -->

<section id="tutoliares" class="tutoliares section" data-aos="fade-up">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Salas</h2>
        <p>Si deseas practicar puedes ingresar a nuestra sala global, pero si tu profesor te ha desafiado, ingresa a una sala mediante su código</p>
    </div><!-- End Section Title -->


    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sala Global</h5>
                        <p class="card-text">La Sala Global es una funcionalidad destinada a la práctica en tiempo real. Permite a los usuarios participar en ejercicios interactivos y minijuegos de ortografía, fomentando el aprendizaje dinámico y colaborativo. Sin embargo, no almacena el progreso ni registra resultados, ofreciendo un espacio exclusivamente para practicar y mejorar habilidades de manera libre..</p>
                        <p class="card-text">Código de sala: ORT001</p>
                        <a href="{{ route('entrarGlobal') }}" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Salas personalizadas</h5>
                        <p class="card-text">Las Salas Personalizadas son espacios creados por docentes para un aprendizaje más estructurado y adaptado a las necesidades de sus estudiantes. En estas salas, se guarda el progreso de cada estudiante, permitiéndoles visualizar su nivel de mejora a lo largo del tiempo. Además, los docentes pueden aplicar evaluaciones, tanto diagnósticas como de fin de curso, para medir el avance y el dominio de las habilidades ortográficas. Esta funcionalidad combina seguimiento personalizado con herramientas de evaluación para un aprendizaje efectivo.</p>
                        <a href="#" class="btn btn-primary">Agregar una sala</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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
@endsection