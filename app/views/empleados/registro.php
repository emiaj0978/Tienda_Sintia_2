<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registro de Producto</title>

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
            <span>Producto</span>
            <i class="fa-solid fa-chevron-right"></i>
            <span id="breadcrumb-page">Agregar productos</span>
        </nav>

        <div class="main-content">

            <section class="container my-4">

                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">

                        <div class="card shadow border-0 rounded-4">

                            <div class="card-header text-center header-producto">
                                <h3 class="mb-0">Registrar producto</h3>
                            </div>

                            <div class="card-body p-4">

                                <form action="<?php echo BASE_URL; ?>/empleados/guardar" method="post">

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Precio compra</label>
                                            <input type="number" step="0.01" name="precio_compra" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Precio venta</label>
                                            <input type="number" step="0.01" name="precio_venta" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Stock</label>
                                            <input type="number" name="stock_actual" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Código QR</label>
                                            <input type="text" name="qrs" class="form-control" maxlength="13" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Categoría</label>
                                            <select name="IDcategoria" class="form-select" required>
                                                <?php foreach ($categorias as $c): ?>
                                                    <option value="<?php echo $c['IDcategoria']; ?>">
                                                        <?php echo $c['nombre_categoria']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>

                                    <button class="btn btn-custom w-100 py-2 fw-bold">
                                        Guardar producto
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>

            </section>

        </div>

    </main>

    <script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>

</html>