<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Empleados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/table-responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

    <!-- CONTENIDO PRINCIPAL -->
    <main>
        <nav class="breadcrumb">
            <span>Dashboard</span>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Registro</span>
            <i class="fa-solid fa-chevron-right"></i>
            <span id="breadcrumb-page">Salida</span>
        </nav>
        <div class="main-content">

    

        <div class="container-fluid mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">
                        Filtrar por fecha
                    </label>

                    <input
                        type="date"
                        name="fecha"
                        class="form-control"
                        value="<?php echo $fecha; ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Buscar
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo BASE_URL; ?>/salidas/reportes"
                       class="btn btn-secondary w-100">
                        Mostrar hoy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>



            <div class="table-responsive">
                <?php if (empty($lista_cargo)) : ?>
                    <p>No hay registro</p>
                <?php else: ?>
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_cargo as $cargitos): ?>
                                <tr>
                                    <td><?php echo $cargitos['IDsalida'] ?></td>
                                    <td><?php echo htmlspecialchars($cargitos['nombre']) ?></td>
                                    <td><?php echo htmlspecialchars($cargitos['fecha']) ?></td>
                                    <td><?php echo htmlspecialchars($cargitos['cantidad']) ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </main>


    <script>
        let BASE_URL = '<?php echo BASE_URL; ?>'
    </script>

    <script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>

</html>