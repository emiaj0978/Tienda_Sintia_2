<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registro de Categoría</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/botones.css">
</head>

<body>

    <?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

    <main>

        <nav class="breadcrumb">
            <span>Dashboard</span>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Categoría</span>
            <i class="fa-solid fa-chevron-right"></i>
            <span id="breadcrumb-page">Agregar categoria</span>
        </nav>

        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow border-0">
                        <div class="card-header text-center header-categoria">
                            <h4 class="mb-0">
                                Registrar categoría
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo BASE_URL; ?>/cargos/guardar" method="post">

                                <div class="mb-3">
                                    <label for="nombre_categoria" class="form-label">
                                        Nombre de categoría
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        id="nombre_categoria"
                                        name="nombre_categoria"
                                        placeholder="Ingrese el nombre"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">
                                        Descripción
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        id="descripcion"
                                        name="descripcion"
                                        placeholder="Ingrese la descripción"
                                        required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg btn-guardar">
                                        Guardar categoría
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>

</html>