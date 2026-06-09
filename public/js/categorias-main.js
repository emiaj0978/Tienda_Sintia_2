document.addEventListener("DOMContentLoaded", () => {

    // ================= ELIMINAR CATEGORÍA =================
    const botonesEliminar = document.querySelectorAll(".btn-eliminar");

    botonesEliminar.forEach(btn => {
        btn.addEventListener("click", function () {

            let id = this.dataset.id;

            fetch(BASE_URL + "/cargos/eliminar", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "id=" + id
            })
            .then(r => r.json())
            .then(data => {
            if (data.eliminar.ok) {
            alert(data.eliminar.mensaje);
            location.reload();
            } else {
            alert(data.eliminar.mensaje);
            }
        });

        });
    });

    // ================= MODAL EDITAR CATEGORÍA =================
    const overlay = document.getElementById("modalEditarOverlay");
    const btnCerrar = document.getElementById("modalCerrar");
    const btnGuardar = document.querySelector(".btn-guardar-modal");

    document.querySelectorAll(".btn-editar").forEach(btn => {
        btn.addEventListener("click", function () {

            document.getElementById("edit-id").value = this.dataset.id;
            document.getElementById("edit-nombre").value = this.dataset.nombre_categoria;
            document.getElementById("edit-descripcion").value = this.dataset.descripcion;

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
            IDcategoria: document.getElementById("edit-id").value,
            nombre_categoria: document.getElementById("edit-nombre").value,
            descripcion: document.getElementById("edit-descripcion").value
        });

        fetch(BASE_URL + "/cargos/editar", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: body.toString()
        })
        .then(r => r.json())
        .then(data => {
            if (data.ok) {
                alert("Categoría actualizada correctamente");
                location.reload();
            } else {
                alert("Error al actualizar categoría");
            }
        });

    });

});