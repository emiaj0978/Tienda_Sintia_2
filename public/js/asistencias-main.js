document.addEventListener("DOMContentLoaded", () => {
  // RELOJ EN TIEMPO REAL
  const reloj = document.getElementById("reloj");
  function actualizarReloj() {
    reloj.textContent = new Date().toLocaleTimeString("es-PE", {
      hour12: false,
    });
  }
  actualizarReloj();
  setInterval(actualizarReloj, 1000);
  // INPUT DEL QR
  const inputqr = document.getElementById("codigo");
  const nombreProducto = document.getElementById("empleado-nombre");
  const msj = document.getElementById("msj");
  inputqr.addEventListener("input", function () {
    // Tu columna qrs es VARCHAR(13)
    if (inputqr.value.length === 13) {
      let qr = inputqr.value;
      buscarProducto(qr);
      inputqr.value = "";
    }
  });

  document.addEventListener("click", function () {
    inputqr.focus();
  });
  // BUSCAR PRODUCTO POR QR
  function buscarProducto(qr_parametro) {
    fetch(BASE_URL + "/asistencias/buscar", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "qrs=" + qr_parametro,
    })
      .then(function (respuesta) {
        return respuesta.json();
      })
      .then(function (datos) {
        console.log(datos);
        if (datos.encontrado) {
          nombreProducto.textContent =
            datos.producto.nombre + " - " + datos.producto.descripcion;
          registrarSalidaProducto(datos.producto.IDproducto);
        } else {
          nombreProducto.textContent = "Producto no encontrado";
          msj.textContent = "Código QR no registrado";
        }
      });
  }

  // REGISTRAR SALIDA
  function registrarSalidaProducto(idProducto) {
    fetch(BASE_URL + "/asistencias/registradito", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "id_producto=" + idProducto,
    })
      .then(function (respuesta) {
        return respuesta.json();
      })
      .then(function (datos) {
        console.log(datos);
        if (datos.registrado) {
          msj.textContent = "Salida registrada correctamente";
        }
        setTimeout(function () {
          nombreProducto.textContent = "— — —";
          msj.textContent = "";
        }, 5000);
      });
  }
});