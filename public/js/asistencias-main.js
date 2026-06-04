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
  // BARCODE INPUT
  const inputdni = document.getElementById("codigo");
  const name_employer = document.getElementById("empleado-nombre");
  const msj = document.getElementById("msj");

  inputdni.addEventListener("input", function () {
    if (inputdni.value.length === 8) {
      let dninuevo = inputdni.value; //este es el DNI ya validado y correcto.
      buscarEmpleado(dninuevo); //guardo en el argumento de la función
      inputdni.value = ""; //luego limpio el input del DNI
    }
  });

  document.addEventListener("click", function () {
    inputdni.focus();
  });

  //Funcion para consultar o buscar DNI del empleado.
  function buscarEmpleado(dni_parametro) {
    //Enviamos los datos mediante ajax-fetch
    fetch(BASE_URL + "/asistencias/buscar", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "dni=" + dni_parametro,
    })
      .then(function (respuesta) {
        // Retornamos la respesta JSON
        return respuesta.json();
      })
      .then(function (datos) {
        console.log(datos); //sirve para los resultados en consola del navegador
        if (datos.encontrado) {
          // console.log("EMPLEADO CORRECTO")
          name_employer.textContent =
            datos.empleado.nombre + " " + datos.empleado.apellido;
          registrarAsistenciaEmpleado(datos.empleado.id_empleado); //ESTE ES MI FUNCION PARA REGISTRAR
        } else {
          //console.log("EMPLEADO NO ECONTRADO")
          name_employer.textContent = "Empleado no encontrado";
          msj.textContent = "Empleado no debe trabajar en esta empresa";
        }
      });
  }

  //Funcion para registrar el empleado, una vez consultado su DNI
  function registrarAsistenciaEmpleado(idEmpleado) {
    //Enviamos los datos mediante ajax-fetch
    fetch(BASE_URL + "/asistencias/registradito", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: "id_empleadito=" + idEmpleado,
    })
      .then(function (respuesta) {
        // Retornamos la respesta JSON
        return respuesta.json();
      })
      .then(function (datos) {
        console.log(datos); //sirve para los resultados en consola del navegador
        if (datos.registrado) {
          msj.textContent = "Asistencia registrada correctamente";
        }

        setInterval(function(){
          name_employer.textContent = "— — —";
          msj.textContent = '';
        }, 5000);
      });
  }

  

});
