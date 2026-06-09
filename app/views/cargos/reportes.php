<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Categorías</title>

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
        <span>Categoría</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Categorías</span>
    </nav>

    <div class="main-content">
        <div class="table-responsive">

            <?php if (empty($categorias)) : ?>
                <p>No hay categorías registradas</p>
            <?php else: ?>

            <table class="table table-bordered text-center align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre categoría</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($categorias as $c): ?>
                    <tr>

                        <td><?= $c['IDcategoria'] ?></td>
                        <td><?= htmlspecialchars($c['nombre_categoria']) ?></td>
                        <td><?= htmlspecialchars($c['descripcion']) ?></td>

                        <td>

                            <!-- EDITAR -->
                            <button class="btn-editar"
                                data-id="<?= $c['IDcategoria'] ?>"
                                data-nombre_categoria="<?= $c['nombre_categoria'] ?>"
                                data-descripcion="<?= $c['descripcion'] ?>">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <!-- ELIMINAR -->
                            <button class="btn-eliminar"
                                data-id="<?= $c['IDcategoria'] ?>">
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

<!-- MODAL EDITAR CATEGORÍA -->
<div class="modal-overlay" id="modalEditarOverlay">
    <div class="modal-editar">

        <button class="modal-cerrar" id="modalCerrar">&times;</button>

        <h2 class="modal-titulo">Editar categoría</h2>

        <form class="modal-form">

            <input type="hidden" id="edit-id">

            <div class="form-group">
                <label>Nombre categoría</label>
                <input type="text" id="edit-nombre">
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <input type="text" id="edit-descripcion">
            </div>

            <button type="button" class="btn-guardar-modal">
                Guardar cambios
            </button>

        </form>

    </div>
</div>

<script>
let BASE_URL = "<?= BASE_URL ?>";
</script>

<!-- JS de categorías -->
<script src="<?php echo BASE_URL; ?>/public/js/categorias-main.js"></script>

</body>
</html>