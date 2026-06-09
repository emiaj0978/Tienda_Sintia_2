<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registro de Producto</title>

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
        <span>Productos</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Registro</span>
    </nav>

    <div class="main-content">

        <section class="registro-form">

            <h1>Registrar producto</h1>

            <form action="<?php echo BASE_URL; ?>/empleados/guardar" method="post">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div>

                <div class="form-group">
                    <label for="precio_compra">Precio compra</label>
                    <input type="number" step="0.01" id="precio_compra" name="precio_compra" required>
                </div>

                <div class="form-group">
                    <label for="precio_venta">Precio venta</label>
                    <input type="number" step="0.01" id="precio_venta" name="precio_venta" required>
                </div>

                <div class="form-group">
                    <label for="stock_actual">Stock</label>
                    <input type="number" id="stock_actual" name="stock_actual" required>
                </div>

                <div class="form-group">
                    <label for="qrs">Código QR</label>
                    <input type="text" id="qrs" name="qrs" required maxlength="13">
                </div>

                <div class="form-group">
                        <label for="IDcategoria">Cargo</label>
                        <select name="IDcategoria"> 
                            <?php foreach ($categorias as $c): ?>
                                    <option value="<?php echo ($c['IDcategoria']) ?>">
                                        <?php echo ($c['nombre_categoria']); ?>
                                    </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Guardar producto
                </button>

            </form>

        </section>

    </div>

</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>
</html>