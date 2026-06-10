<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Panel de Administración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<!-- CONTENIDO PRINCIPAL -->
<main>
    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Dashboard</span>
    </nav>
    <div class="main-content">

    <div class="row g-4">

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Productos por acabarse
                    </h5>
                </div>

                <div class="card-body">

                    <h1 class="display-4 text-danger">
                        <?php if (empty($productosBajoStock)) : ?>
                    </h1>

                    <ul class="list-group">
                        <?php foreach($productosBajoStock as $p): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?php echo $p['nombre']; ?></span>
                                <span class="badge bg-danger">
                                    <?php echo $p['stock_actual']; ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-chart-line"></i>
                        Productos más vendidos hoy
                    </h5>
                </div>

                <div class="card-body">

                    <ul class="list-group">
                        <?php foreach($productosVendidos as $p): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><?php echo $p['nombre']; ?></span>
                                <span class="badge bg-success">
                                    <?php echo $p['total_vendido']; ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
                <?php else: ?>
            </div>
        </div>

    </div>

    </div>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>

</html>
