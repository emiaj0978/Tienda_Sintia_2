<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Los assets usan rutas absolutas con BASE_URL para que funcionen sin importar la URL actual -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/landing.css">
</head>


<body>
    <!-- Fade overlay para transición de botón Ver demo -->
    <div id="fadeOverlay"></div>

    <!-- Menú móvil (overlay) fuera del nav para que position:fixed funcione siempre -->
    <?php include __DIR__ . '/../layouts/header-home.php'; ?>

    <!-- Sección principal con video de fondo -->
    <section class="stage">

        <video class="hero-video" autoplay muted loop playsinline>
            <source src="<?php echo BASE_URL; ?>/public/video/tienda.mp4" type="video/mp4">
        </video>

        <!-- Navbar -->
        <nav class="navbar" id="navbar">
            <a class="brand" href="#">Tienda Sintia</a>

            <button class="menu-btn" id="menuBtn" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
        </nav>

        <!-- Contenido hero -->
        <div class="hero-content">
            <button class="cta-btn demo-trigger" id="verDemo">Ver Productos</button>
        </div>

        <!-- Scroll indicator -->
        <div class="scroll-indicator" id="scrollIndicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>

    </section>

    <!-- Sección proyectos -->
    <section class="projects-section">

        <div class="project-card">
            <div class="project-img-wrap">
                <img src="<?php echo BASE_URL; ?>/public/img/23.png" alt="Registro con DNI" class="project-img">
            </div>
            <h3 class="project-title">Todo sobre la limpieza del hogar</h3>
            <p class="project-desc">Encuentra productos de limpieza, detergentes, desinfectantes y todo lo necesario para mantener tu hogar limpio y ordenado todos los días.</p>
            <a href="#" class="project-link">Ver <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="project-card">
            <div class="project-img-wrap">
                <img src="<?php echo BASE_URL; ?>/public/img/24.png" alt="Panel de Control" class="project-img project-img--admin">
            </div>
            <h3 class="project-title">Obten una vida saludable</h3>
            <p class="project-desc">Descubre frutas, verduras, alimentos saludables y productos naturales para mejorar tu bienestar y cuidar tu salud diariamente.</p>
            <a href="#" class="project-link">Ver <i class="bi bi-arrow-right"></i></a>
        </div>

    </section>

    
        <!-- =============================================================================================================== -->


        <!-- Carrousell -->

<div class="container d-flex justify-content-center mt-5">
    <div id="carouselExample" class="carousel slide w-75">

        <div class="carousel-inner rounded shadow">
            <div class="carousel-item active">
                <img src="public/img/20.png" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="public/img/21.png" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="public/img/22.png" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>


        <!-- =============================================================================================================== -->

    
       <div class="container py-5">

        <!-- Título -->
    <div class="row mb-2">
        <div class="col-12 text-center">
            <h2 class="font-weight-bold text-white bg-success py-1 rounded">
                Solo por hoy!!!
            </h2>
        </div>
    </div>

    <!-- Primera fila -->
    <div class="row g-4" style="margin-bottom: 100px;">
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="public/img/17.png" class="card-img-top" alt="Producto">
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="public/img/19.png" class="card-img-top" alt="Producto">
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="public/img/18.png" class="card-img-top" alt="Producto">
            </div>
        </div>
    </div>


        <!-- =============================================================================================================== -->


    <!-- Segunda fila -->
    <div class="row g-3">

        <!-- Título -->
    <div class="row mb-2">
        <div class="col-12 text-center">
            <h2 class="font-weight-bold text-white bg-success py-3 rounded">
                Ofertas
            </h2>
        </div>
    </div>

        <div class="col-md-6">
            <div class="card h-90 shadow-sm">
                <img src="public/img/1.png" class="card-img-top" alt="Producto">
                
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-90 shadow-sm">
                <img src="public/img/2.png" class="card-img-top" alt="Producto">
                
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-90 shadow-sm">
                <img src="public/img/3.png" class="card-img-top" alt="Producto">
                
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-90 shadow-sm">
                <img src="public/img/4.png" class="card-img-top" alt="Producto">
                
            </div>
        </div>
    </div>
</div>


        <!-- =============================================================================================================== -->


<div class="container py-5">

    <!-- Título -->
    <div class="row mb-2">
        <div class="col-12 text-center">
            <h2 class="font-weight-bold text-white bg-success py-3 rounded">
                Productos Destacados
            </h2>
        </div>
    </div>

    <div class="row g-1">

        <div class="col-lg-2 col-md-4 col-63">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/5.png" class="card-img-top p-3" alt="TV">
                <div class="card-body">
                    <h5 class="card-title">
                        Aceite Vegetal del Cielo Botella 900 mL
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/6.50
                        <span class="fs-6 text-dark">UN</span>
                        <span class="badge bg-danger">
                            -6%
                        </span>
                    </div>
                    <p class="text-secondary text-decoration-line-through fs-5">
                        S/6.90
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/6.png" class="card-img-top p-3" alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">
                        Detergente Líquido Skip Doypack 3 L
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/49.40
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/7.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Fideos Spaghetti Molitalia Bolsa 950 g
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/6.50
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/8.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Filete de Atún Tottus en Aceite Lata 140 g
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/4.80
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/9.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Agua San Luis Sin Gas Caja 20 L
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/23.50
                        <span class="fs-6 text-dark">UN</span>
                        <span class="badge bg-danger">
                            -10%
                        </span>
                    </div>
                    <p class="text-secondary text-decoration-line-through fs-5">
                        S/25.90
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/10.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Mantequilla con Sal Gloria Envase 390 g
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/17.50
                        <span class="fs-6 text-dark">UN</span>
                        <span class="badge bg-danger">
                            -19%
                        </span>
                    </div>
                    <p class="text-secondary text-decoration-line-through fs-5">
                        S/21.50
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- =============================================================================================================== -->

<div class="container py-5">
    <div class="row g-1">

        <div class="col-lg-2 col-md-4 col-63">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/11.png" class="card-img-top p-3" alt="TV">
                <div class="card-body">
                    <h5 class="card-title">
                        Papel Higiénico Elite Clásico Doble Hoja Empaque 40 Und
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/26.90
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/12.png" class="card-img-top p-3" alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">
                        Papel Higiénico Higienol 40 m Mega Doble Hoja Empaque 24 Und
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/39.50
                        <span class="fs-6 text-dark">UN</span>
                        <span class="badge bg-danger">
                            -6%
                        </span>
                    </div>
                    <p class="text-secondary text-decoration-line-through fs-5">
                        S/41.90
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/13.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Detergente en Polvo Ariel Pro Cuidado Bolsa 5.8 kg
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/62.93
                        <span class="fs-6 text-dark">UN</span>
                        <span class="badge bg-danger">
                            -30%
                        </span>
                    </div>
                    <p class="text-secondary text-decoration-line-through fs-5">
                        S/89.90
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/14.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Pañal Babysec Super Premium Talla XXG Empaque 58 Und
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/59.90
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/15.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Agua Micelar Garnier Skin Active Todo en 1 Envase 400 mL
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/47.50
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6">
            <div class="card text-center h-100 border-0 shadow-sm">
                <img src="public/img/16.png" class="card-img-top p-3" alt="Celular">
                <div class="card-body">
                    <h5 class="card-title">
                        Hidratante Facial Neutrogena Hydro Boost Envase 50 g
                    </h5>
                    <div class="fs-3 text-danger fw-bold">
                        S/60.90
                        <span class="fs-6 text-dark">UN</span>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
    <?php include __DIR__ . '/../layouts/footer-home.php'; ?>
    <script src="<?php echo BASE_URL; ?>/public/js/landing.js"></script>
    </body>
</html>
