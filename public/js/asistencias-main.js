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


    // CARRITO
  let carrito = [];
  let total = 0;


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
          carrito.push(datos.producto);
          total += parseFloat(datos.producto.precio_venta);
          document.getElementById("total").textContent =
            total.toFixed(2);
          mostrarCarrito();
        } else {
          nombreProducto.textContent = "Producto no encontrado";
          msj.textContent = "Código no registrado";
        }
      });
  }

  // MOSTRAR CARRITO
  function mostrarCarrito() {
    const lista = document.getElementById("lista-productos");
    lista.innerHTML = "";
    carrito.forEach(function (producto, index) {
      lista.innerHTML += `
        <div class="item-carrito">
          ${producto.nombre} - S/${producto.precio_venta}
          <button onclick="eliminarProducto(${index}) "title="Eliminar">
              <i class="fa-solid fa-trash"></i>
          </button>
        </div>
      `;
    });
  }

  // ELIMINAR PRODUCTO
  window.eliminarProducto = function (index) {
    total -= parseFloat(carrito[index].precio_venta);
    carrito.splice(index, 1);
    document.getElementById("total").textContent =
      total.toFixed(2);
    mostrarCarrito();
  };

  // CONFIRMAR COMPRA
  window.confirmarCompra = function () {
    if (carrito.length === 0) {
      msj.textContent = "No hay productos en el carrito";
      return;
    }
    fetch(BASE_URL + "/asistencias/guardarVenta", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(carrito),
    })
      .then(function (respuesta) {
        return respuesta.json();
      })
      .then(function (datos) {
        console.log(datos);
        if (datos.registrado) {
          msj.textContent = "Compra registrada correctamente";
          carrito = [];
          total = 0;
          document.getElementById("total").textContent = "0.00";
          document.getElementById("lista-productos").innerHTML = "";
          nombreProducto.textContent = "— — —";
        }
      });
  };

});

