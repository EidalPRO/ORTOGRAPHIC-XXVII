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

            <li class="nav-item">
                <a class="nav-link" id="reg" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-grid"></i>
                    <span>Generar reporte</span>
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
                </div><!-- End Left side columns -->
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
                            <div class="card-body">
                                <h5 class="card-title">Usuarios <span>| Evaluaciones</span></h5>
                                <!-- Agrega estos elementos de control debajo del título -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <select id="filterSelect" class="form-select form-select-sm">
                                            <option value="all">Todos</option>
                                            @foreach ($evaluaciones as $evaluacion)
                                            <option value="{{ $evaluacion->id_evaluacion }}">{{ $evaluacion->tipo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <select id="perPageSelect" class="form-select form-select-sm">
                                            <option value="5">5 por página</option>
                                            <option value="10">10 por página</option>
                                            <option value="15">15 por página</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Mantén tu tabla igual pero con el cuerpo vacío -->
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Evaluación</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Acertados</th>
                                            <th scope="col">Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody"></tbody>
                                </table>

                                <!-- Controles de paginación -->
                                <div class="d-flex justify-content-center">
                                    <nav>
                                        <ul class="pagination" id="paginationControls">
                                        </ul>
                                    </nav>
                                </div>

                                <!-- Script de manejo -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Datos originales desde PHP
                                        const allData = @json($tablaDatos);
                                        let currentPage = 1;
                                        let currentFilter = 'all';
                                        let perPage = 5;

                                        // Elementos del DOM
                                        const tableBody = document.getElementById('tableBody');
                                        const filterSelect = document.getElementById('filterSelect');
                                        const perPageSelect = document.getElementById('perPageSelect');
                                        const paginationControls = document.getElementById('paginationControls');

                                        function renderTable() {
                                            // Filtrar datos
                                            let filteredData = currentFilter === 'all' ?
                                                allData :
                                                allData.filter(item => item.evaluacion_id == currentFilter);

                                            // Calcular paginación
                                            const totalPages = Math.ceil(filteredData.length / perPage);
                                            const start = (currentPage - 1) * perPage;
                                            const end = start + perPage;
                                            const pageData = filteredData.slice(start, end);

                                            // Renderizar filas
                                            tableBody.innerHTML = pageData.map((item, index) => `
            <tr>
                <th scope="row">${start + index + 1}</th>
                <td>${item.evaluacion}</td>
                <td>${item.usuario}</td>
                <td>${item.aciertos}</td>
                <td><span class="badge ${item.estatus_color}">${item.estatus}</span></td>
            </tr>
        `).join('');

                                            // Renderizar controles de paginación
                                            let paginationHTML = '';
                                            if (currentPage > 1) {
                                                paginationHTML += `
                <li class="page-item">
                    <button class="page-link" onclick="changePage(${currentPage - 1})">Anterior</button>
                </li>`;
                                            }

                                            for (let i = 1; i <= totalPages; i++) {
                                                paginationHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <button class="page-link" onclick="changePage(${i})">${i}</button>
                </li>`;
                                            }

                                            if (currentPage < totalPages) {
                                                paginationHTML += `
                <li class="page-item">
                    <button class="page-link" onclick="changePage(${currentPage + 1})">Siguiente</button>
                </li>`;
                                            }

                                            paginationControls.innerHTML = paginationHTML;
                                        }

                                        window.changePage = (newPage) => {
                                            currentPage = newPage;
                                            renderTable();
                                        }

                                        // Event Listeners
                                        filterSelect.addEventListener('change', function() {
                                            currentFilter = this.value;
                                            currentPage = 1;
                                            renderTable();
                                        });

                                        perPageSelect.addEventListener('change', function() {
                                            perPage = parseInt(this.value);
                                            currentPage = 1;
                                            renderTable();
                                        });

                                        // Render inicial
                                        renderTable();
                                    });
                                </script>

                                <style>
                                    .page-item.active .page-link {
                                        background-color: #007bff;
                                        border-color: #007bff;
                                    }

                                    .page-link {
                                        color: #007bff;
                                        cursor: pointer;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 mt-4">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Usuarios <span>| Minijuegos</span></h5>
                            <div class="d-flex gap-2">
                                <!-- Filtro -->
                                <select class="form-select form-select-sm" id="minijuegosFilterSelect">
                                    <option value="all">Todos</option>
                                    @foreach ($minijuegos as $minijuego)
                                    <option value="{{ $minijuego->idminijuegos }}">{{ $minijuego->nombre }}</option>
                                    @endforeach
                                </select>

                                <!-- Elementos por página -->
                                <select class="form-select form-select-sm" id="minijuegosPerPageSelect">
                                    <option value="5">5 por página</option>
                                    <option value="10">10 por página</option>
                                    <option value="15">15 por página</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Minijuego</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Acertados</th>
                                        <th scope="col">Fallados</th>
                                        <th scope="col">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody id="minijuegos-table-body"></tbody>
                            </table>

                            <!-- Paginación -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center" id="minijuegosPagination"></ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const minijuegosData = @json($tablaDatosMinijuegos);
                        let currentMinijuegoPage = 1;
                        let minijuegosFilter = 'all';
                        let minijuegosPerPage = 5;

                        // Elementos del DOM
                        const minijuegosTableBody = document.getElementById('minijuegos-table-body');
                        const minijuegosFilterSelect = document.getElementById('minijuegosFilterSelect');
                        const minijuegosPerPageSelect = document.getElementById('minijuegosPerPageSelect');
                        const minijuegosPagination = document.getElementById('minijuegosPagination');

                        function renderMinijuegosTable() {
                            let filteredData = minijuegosFilter === 'all' ?
                                minijuegosData :
                                minijuegosData.filter(item => {
                                    // Verificar si existe minijuego_id
                                    const itemId = item.minijuego_id ? item.minijuego_id.toString() : '';
                                    const filterId = minijuegosFilter.toString();
                                    return itemId === filterId;
                                });
                            // Calcular paginación
                            const totalPages = Math.ceil(filteredData.length / minijuegosPerPage);
                            const start = (currentMinijuegoPage - 1) * minijuegosPerPage;
                            const end = start + minijuegosPerPage;
                            const pageData = filteredData.slice(start, end);

                            // Renderizar filas
                            minijuegosTableBody.innerHTML = pageData.map((item, index) => `
            <tr>
                <th scope="row">${start + index + 1}</th>
                <td>${item.minijuego}</td>
                <td>${item.usuario}</td>
                <td>${item.aciertos}</td>
                <td>${item.fallos}</td>
                <td><span class="badge ${item.estatus_color}">${item.estatus}</span></td>
            </tr>
        `).join('');

                            // Renderizar controles de paginación
                            let paginationHTML = '';
                            if (currentMinijuegoPage > 1) {
                                paginationHTML += `
                <li class="page-item">
                    <button class="page-link" onclick="changeMinijuegosPage(${currentMinijuegoPage - 1})">Anterior</button>
                </li>`;
                            }

                            for (let i = 1; i <= totalPages; i++) {
                                paginationHTML += `
                <li class="page-item ${i === currentMinijuegoPage ? 'active' : ''}">
                    <button class="page-link" onclick="changeMinijuegosPage(${i})">${i}</button>
                </li>`;
                            }

                            if (currentMinijuegoPage < totalPages) {
                                paginationHTML += `
                <li class="page-item">
                    <button class="page-link" onclick="changeMinijuegosPage(${currentMinijuegoPage + 1})">Siguiente</button>
                </li>`;
                            }

                            minijuegosPagination.innerHTML = paginationHTML;
                        }

                        window.changeMinijuegosPage = (newPage) => {
                            currentMinijuegoPage = newPage;
                            renderMinijuegosTable();
                        }

                        // Event Listeners
                        minijuegosFilterSelect.addEventListener('change', function() {
                            minijuegosFilter = this.value;
                            currentMinijuegoPage = 1;
                            renderMinijuegosTable();
                        });

                        minijuegosPerPageSelect.addEventListener('change', function() {
                            minijuegosPerPage = parseInt(this.value);
                            currentMinijuegoPage = 1;
                            renderMinijuegosTable();
                        });

                        // Render inicial
                        renderMinijuegosTable();
                    });
                </script>

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

        <!-- modal crear reporte -->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Generar Reporte de Evaluación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Seleccionar Evaluación:</label>
                            <select class="form-select" id="selectEvaluacion">
                                @forelse($sala->evaluaciones as $evaluacion)
                                <option value="{{ $evaluacion->id_evaluacion }}">{{ $evaluacion->tipo }}</option>
                                @empty
                                <option disabled>No hay evaluaciones en esta sala</option>
                                @endforelse
                            </select>
                        </div>

                        <div id="previewReporte" class="mt-3">
                            <!-- Aquí se mostrará la previsualización -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnGenerarPdf" disabled>Generar PDF</button>
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
                            <p>Proyecto presentado como prototipo de software para la DGETI.</p>
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


        document.addEventListener('DOMContentLoaded', function() {
            const selectEvaluacion = document.getElementById('selectEvaluacion');
            const btnGenerarPdf = document.getElementById('btnGenerarPdf');

            function verificarSeleccion() {
                btnGenerarPdf.disabled = !selectEvaluacion.value || selectEvaluacion.value === "null";
            }

            selectEvaluacion.addEventListener('change', verificarSeleccion);
            verificarSeleccion();

            btnGenerarPdf.addEventListener('click', function() {
                const evaluacionId = selectEvaluacion.value;
                if (evaluacionId) {
                    window.open(`/generar-reporte/${evaluacionId}`, '_blank');
                }
            });
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