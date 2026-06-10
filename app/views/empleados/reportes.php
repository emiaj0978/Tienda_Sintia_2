<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Productos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/table-responsive.css">
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
        <span id="breadcrumb-page">Productos</span>
    </nav>

    <div class="main-content">
        <div class="table-responsive">

            <?php if (empty($productos)) : ?>
                <p>No hay productos registrados</p>
            <?php else: ?>

            <table class="table table-bordered text-center align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Compra</th>
                        <th>Venta</th>
                        <th>Stock</th>
                        <th>QR</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($productos as $p): ?>
                    <tr>

                        <td><?= $p['IDproducto'] ?></td>
                        <td><?= htmlspecialchars($p['nombre']) ?></td>
                        <td><?= htmlspecialchars($p['descripcion']) ?></td>
                        <td><?= htmlspecialchars($p['precio_compra']) ?></td>
                        <td><?= htmlspecialchars($p['precio_venta']) ?></td>
                        <td><?= htmlspecialchars($p['stock_actual']) ?></td>
                        <td><?= htmlspecialchars($p['qrs']) ?></td>
                        <td><?= htmlspecialchars($p['nombre_categoria']) ?></td>

                        <td>

                            <!-- EDITAR -->
                            <button class="btn-editar"
                                data-id="<?= $p['IDproducto'] ?>"
                                data-nombre="<?= $p['nombre'] ?>"
                                data-descripcion="<?= $p['descripcion'] ?>"
                                data-precio_compra="<?= $p['precio_compra'] ?>"
                                data-precio_venta="<?= $p['precio_venta'] ?>"
                                data-stock_actual="<?= $p['stock_actual'] ?>"
                                data-qrs="<?= $p['qrs'] ?>"
                                data-idcategoria="<?= $p['IDcategoria'] ?>">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <!-- ELIMINAR -->
                            <button class="btn-eliminar"
                                data-id="<?= $p['IDproducto'] ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </td>

                    </tr>
                <?php endforeach; ?>

                </tbody>

            </table>

            <?php endif; ?>

        </div>
    </div>

</main>

<!-- MODAL EDITAR -->
<div class="modal-overlay" id="modalEditarOverlay">
    <div class="modal-editar">

        <button class="modal-cerrar" id="modalCerrar">&times;</button>

        <h2 class="modal-titulo">Editar producto</h2>

        <form class="modal-form">
            <?php if (empty($categorias)) : ?>
            <?php else: ?>

            <input type="hidden" id="edit-id">

            <div class="form-row">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="edit-nombre">
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" id="edit-descripcion">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Precio compra</label>
                    <input type="text" id="edit-precio_compra">
                </div>

                <div class="form-group">
                    <label>Precio venta</label>
                    <input type="text" id="edit-precio_venta">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" id="edit-stock_actual">
                </div>

                <div class="form-group">
                    <label>QR</label>
                    <input type="text" id="edit-qrs">
                </div>
            </div>

            <div class="form-group">
                <label>Categoría</label>
                <select id="edit-categoria">
                    <?php foreach ($categorias as $c): ?>
                        <option value="<?= $c['IDcategoria'] ?>">
                            <?= $c['nombre_categoria'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="button" class="btn-guardar-modal">
                Guardar cambios
            </button>
            <?php endif; ?>

        </form>

    </div>
</div>

<script>
let BASE_URL = "<?= BASE_URL ?>";
</script>

<script src="<?php echo BASE_URL; ?>/public/js/empleados-main.js"></script>

</body>
</html>