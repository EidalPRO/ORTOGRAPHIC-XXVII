<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="icon">
    <link href="{{asset('assets/img/logo-ortographic.webp')}}" rel="apple-touch-icon">
    <title>Ortographic - Administrar Sala</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/admin.css')}}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <img src="{{asset('assets/img/logo-ortographic.webp')}}" alt="">
                <span class="d-none d-lg-block">Administrar sala: </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="" alt="Profile" class="rounded-circle"> -->
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" id="reg" style="cursor: pointer;">
                    <i class="bi bi-grid"></i>
                    <span>Regresar</span>
                </a>
            </li>

            <li class="nav-heading">Acciones</li>

            <li class="nav-item">
                @if ($sala->user_id === auth()->user()->id)
                <a class="nav-link collapsed" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#crearEvaluacionModal">
                    <i class="bi bi-person"></i>
                    <span>Crear evaluación</span>
                </a>
                @endif
            </li>
        </ul>
    </aside>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1 id="sala-codigo"></h1>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios <span>| En sala</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $usuariosParaSala }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Customers Card -->


                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filtrar</h6>
                                        </li>
                                        <li><a class="dropdown-item filter-option" href="#" data-filter="all">Todos</a></li>
                                        @foreach ($evaluaciones as $evaluacion)
                                        <li><a class="dropdown-item filter-option" href="#" data-filter="{{ $evaluacion->id_evaluacion }}">{{ $evaluacion->tipo }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Usuarios <span>| Evaluaciones</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Evaluación</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Acertados</th>
                                                <th scope="col">Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody id="evaluaciones-table-body">
                                            @foreach ($tablaDatos as $dato)
                                            <tr data-evaluacion-id="{{ $dato['evaluacion_id'] }}">
                                                <th scope="row">{{ $dato['numero'] }}</th>
                                                <td>{{ $dato['evaluacion'] }}</td>
                                                <td>{{ $dato['usuario'] }}</td>
                                                <td>{{ $dato['aciertos'] }}</td>
                                                <td><span class="badge {{ $dato['estatus_color'] }}">{{ $dato['estatus'] }}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->


                <!-- Right side columns -->
                <div class="col-lg-4">
                </div>
        </section>

        <!-- modales seccion  -->
        <!-- Modal crear evaluación -->
        <div class="modal fade" id="crearEvaluacionModal" tabindex="-1" aria-labelledby="crearEvaluacionLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearEvaluacionLabel">Crear Evaluación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campo para escribir el tipo de evaluación -->
                        <div class="mb-3">
                            <label for="tipoEvaluacion" class="form-label">Tipo de Evaluación:</label>
                            <input type="text" id="tipoEvaluacion" class="form-control" placeholder="Escribe el tipo de evaluación">
                        </div>


                        <label for="rec" class="form-label">Selecciona tus reactivos</label>
                        <!-- Filtro para cantidad de reactivos por página -->
                        <div class=" d-flex justify-content-between align-items-center" id="rec">
                            <label for="reactivosPorPagina" class="form-label me-2">Mostrar:</label>
                            <select id="reactivosPorPagina" class="form-select w-auto">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                        </div>

                        <!-- Tabla de reactivos -->
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Seleccionar</th>
                                    <th scope="col">Pregunta</th>
                                    <th scope="col">Respuesta Correcta</th>
                                </tr>
                            </thead>
                            <tbody id="tablaReactivos">
                                <!-- Los datos se generarán dinámicamente -->
                            </tbody>
                        </table>

                        <!-- Navegación para paginación -->
                        <nav>
                            <ul class="pagination justify-content-center" id="paginacionReactivos">
                                <!-- Los botones de paginación se generarán dinámicamente -->
                            </ul>
                        </nav>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="guardarEvaluacion">Guardar Evaluación</button>
                    </div>
                </div>
            </div>
        </div>


    </main><!-- End #main -->

    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-about">
                        <a href="" class="logo d-flex align-items-center">
                            <span class="sitename">Ortographic</span>
                        </a>
                        <p>© 2024 Copyright DGETI - CBTis No. 150.</p>
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

    <script>
        var datosSala = @json($sala);

        const menuToggle = document.getElementById('sala-codigo');
        menuToggle.innerHTML = `Administrar sala: ${datosSala.codigo_sala}`;

        const reg = document.getElementById('reg');
        reg.addEventListener('click', function() {
            window.location.href = `/sala/personalizada/${datosSala.codigo_sala}`;
        });

        document.addEventListener("DOMContentLoaded", function() {
            const tablaReactivos = document.getElementById("tablaReactivos");
            const paginacionReactivos = document.getElementById("paginacionReactivos");
            const reactivosPorPaginaSelect = document.getElementById("reactivosPorPagina");
            const guardarEvaluacionBtn = document.getElementById("guardarEvaluacion");
            const tipoEvaluacionInput = document.getElementById("tipoEvaluacion");

            let reactivos = [];
            let reactivosSeleccionados = [];
            let paginaActual = 1;
            let reactivosPorPagina = parseInt(reactivosPorPaginaSelect.value);

            // Cargar los reactivos desde el servidor
            async function cargarReactivos() {
                try {
                    const response = await fetch('/reactivos'); // Ruta al controlador
                    reactivos = await response.json();
                    renderTabla();
                } catch (error) {
                    console.error("Error al cargar los reactivos:", error);
                }
            }

            // Renderizar la tabla de reactivos
            function renderTabla() {
                const inicio = (paginaActual - 1) * reactivosPorPagina;
                const fin = inicio + reactivosPorPagina;
                const reactivosPagina = reactivos.slice(inicio, fin);

                tablaReactivos.innerHTML = reactivosPagina
                    .map(
                        (reactivo) => `
        <tr>
            <td>
                <input 
                    type="checkbox" 
                    value="${reactivo.id_reactivos}" 
                    ${reactivosSeleccionados.includes(reactivo.id_reactivos) ? "checked" : ""} 
                    onchange="seleccionarReactivo(${reactivo.id_reactivos}, this.checked)"
                >
            </td>
            <td>${reactivo.reactivo}</td>
            <td>${reactivo.respuesta}</td>
        </tr>
    `
                    )
                    .join("");

                renderPaginacion();
            }

            // Renderizar la paginación
            function renderPaginacion() {
                const totalPaginas = Math.ceil(reactivos.length / reactivosPorPagina);
                let html = "";

                for (let i = 1; i <= totalPaginas; i++) {
                    html += `
        <li class="page-item ${i === paginaActual ? "active" : ""}">
            <button class="page-link" onclick="cambiarPagina(${i})">${i}</button>
        </li>
    `;
                }

                paginacionReactivos.innerHTML = html;
            }

            // Cambiar de página
            window.cambiarPagina = function(pagina) {
                paginaActual = pagina;
                renderTabla();
            };

            // Seleccionar o deseleccionar un reactivo
            window.seleccionarReactivo = function(id, checked) {
                if (checked) {
                    reactivosSeleccionados.push(id);
                } else {
                    reactivosSeleccionados = reactivosSeleccionados.filter((rid) => rid !== id);
                }
            };

            // Manejar el cambio en el número de reactivos por página
            reactivosPorPaginaSelect.addEventListener("change", function() {
                reactivosPorPagina = parseInt(this.value);
                paginaActual = 1; // Reiniciar a la primera página
                renderTabla();
            });

            // Guardar la evaluación
            guardarEvaluacionBtn.addEventListener("click", async function() {
                const tipoEvaluacion = tipoEvaluacionInput.value.trim();

                if (!tipoEvaluacion) {
                    let timerInterval;
                    Swal.fire({
                        title: "Por favor, escribe un tipo de evaluación.",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log("I was closed by the timer");
                        }
                    });
                    return;
                }

                if (reactivosSeleccionados.length < 10) { // Cambiar a < 10
                    let timerInterval;
                    Swal.fire({
                        title: "Por favor, selecciona al menos 10 reactivos.",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log("I was closed by the timer");
                        }
                    });
                    return;
                }

                console.log(reactivosSeleccionados)
                console.log(datosSala.id_sala)

                try {
                    const response = await fetch('/guardar-evaluacion', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            tipoEvaluacion,
                            reactivos: reactivosSeleccionados,
                            sala_id: datosSala.id_sala, // Enviar sala_id desde el JavaScript
                        }),
                    });

                    if (response.ok) {
                        // Opcional: Reiniciar el formulario/modal
                        tipoEvaluacionInput.value = "";
                        reactivosSeleccionados = [];
                        cargarReactivos();
                        let timerInterval;
                        Swal.fire({
                            title: "Evaluación creada con exito.",
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;
                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log("I was closed by the timer");
                                const modal = bootstrap.Modal.getInstance(document.getElementById('crearEvaluacionModal'));
                                modal.hide();
                            }
                        });
                    } else {
                        alert("Error al guardar la evaluación.");
                    }
                } catch (error) {
                    console.error("Error al guardar la evaluación:", error);
                }
            });

            // Cargar reactivos al abrir el modal
            const crearEvaluacionModal = document.getElementById("crearEvaluacionModal");
            crearEvaluacionModal.addEventListener("show.bs.modal", cargarReactivos);
        });
    </script>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/admin.js')}}"></script>

</body>

</html>