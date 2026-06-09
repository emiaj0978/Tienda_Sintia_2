<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registro de Categoría</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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

        <section class="registro-form">

            <h1>Registrar categoría</h1>

            <form action="<?php echo BASE_URL; ?>/cargos/guardar" method="post">

                <div class="form-group">
                    <label for="nombre_categoria">Nombre de categoría</label>
                    <input type="text"
                           id="nombre_categoria"
                           name="nombre_categoria"
                           required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text"
                           id="descripcion"
                           name="descripcion"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Guardar categoría
                </button>

            </form>

        </section>

    </div>

</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>
</html>