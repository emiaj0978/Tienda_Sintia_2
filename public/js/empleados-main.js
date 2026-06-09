document.addEventListener("DOMContentLoaded", () => {

    // ================= ELIMINAR PRODUCTO =================
    const botonesEliminar = document.querySelectorAll(".btn-eliminar");

    botonesEliminar.forEach(btn => {
        btn.addEventListener("click", function () {

            let id = this.dataset.id;

            fetch(BASE_URL + "/empleados/eliminar", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "id=" + id
            })
            .then(r => r.json())
            .then(data => {
                if (data.eliminar) {
                    alert("Producto eliminado correctamente");
                    location.reload();
                } else {
                    alert("No se pudo eliminar el producto");
                }
            });

        });
    });

    // ================= MODAL EDITAR PRODUCTO =================
    const overlay = document.getElementById("modalEditarOverlay");
    const btnCerrar = document.getElementById("modalCerrar");
    const btnGuardar = document.querySelector(".btn-guardar-modal");

    document.querySelectorAll(".btn-editar").forEach(btn => {
        btn.addEventListener("click", function () {

            document.getElementById("edit-id").value = this.dataset.id;
            document.getElementById("edit-nombre").value = this.dataset.nombre;
            document.getElementById("edit-descripcion").value = this.dataset.descripcion;
            document.getElementById("edit-precio_compra").value = this.dataset.precio_compra;
            document.getElementById("edit-precio_venta").value = this.dataset.precio_venta;
            document.getElementById("edit-stock_actual").value = this.dataset.stock_actual;
            document.getElementById("edit-qrs").value = this.dataset.qrs;
            document.getElementById("edit-categoria").value = this.dataset.idcategoria;

            overlay.classList.add("active");
        });
    });

    btnCerrar.addEventListener("click", () => {
        overlay.classList.remove("active");
    });

    overlay.addEventListener("click", (e) => {
        if (e.target === overlay) {
            overlay.classList.remove("active");
        }
    });

    // ================= GUARDAR EDICIÓN =================
    btnGuardar.addEventListener("click", function () {

        const body = new URLSearchParams({
            IDproducto: document.getElementById("edit-id").value,
            nombre: document.getElementById("edit-nombre").value,
            descripcion: document.getElementById("edit-descripcion").value,
            precio_compra: document.getElementById("edit-precio_compra").value,
            precio_venta: document.getElementById("edit-precio_venta").value,
            stock_actual: document.getElementById("edit-stock_actual").value,
            qrs: document.getElementById("edit-qrs").value,
            IDcategoria: document.getElementById("edit-categoria").value
        });

        fetch(BASE_URL + "/empleados/editar", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: body.toString()
        })
        .then(r => r.json())
        .then(data => {
            if (data.ok) {
                alert("Producto actualizado correctamente");
                location.reload();
            } else {
                alert("Error al actualizar producto");
            }
        });

    });

});