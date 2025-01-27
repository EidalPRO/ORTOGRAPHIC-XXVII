<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
                    <li><a href=""> {{Auth::user()->name}} </a></li>
                    <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">¡Bienvenido {{ Auth::user()->name }} a Ortographic!</h1>
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
                            <button class="btn btn-outline-primary" style="position:absolute; bottom:10px" data-bs-toggle="modal" data-bs-target="#salasModal">Entrar</button>
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
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
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
                            <a href="#" class="read-more stretched-link"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
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
                                    <a class="btn btn-danger btn-sm" onclick="confirmarSalida('${sala.id_sala}')">Salir</a>
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
                            location.reload();
                            // Abrir el modal de salas personalizadas
                            $('#salasModal').modal('show');
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
    </script>

</body>

</html>