document.addEventListener("DOMContentLoaded", function () { // Espera a que el DOM esté completamente cargado
    CargarHorarios(); // Llama a la función para cargar los horarios al cargar la página
});

// Función para cargar los horarios y mostrarlos en la tabla
function CargarHorarios() {

    console.log("Sesión en JS:", usuarioSesion.nombre);

    if (usuarioSesion.cargo == 1) {
        console.log("El usuario es admin. Puede editar horarios.");
    } else {
        console.log("El usuario no tiene permisos para editar horarios.");
    }
    
    fetch("http://127.0.0.1:8000/api/horarios")  // Cambia la URL según tu API
        .then(response => response.json())  // Convierte la respuesta a JSON
        .then(data => {  // Procesa los datos recibidos
            let tableBody = document.getElementById("horariosTable"); // Obtiene el cuerpo de la tabla
            tableBody.innerHTML = ""; // Limpia el contenido previo de la tabla

            data.forEach(horario => {  // Itera sobre cada horario recibido
                if (usuarioSesion.cargo == 1) {
                    botoneliminar =`
                    <button onclick="Eliminar(${horario.id}, '${horario.fecha}', '${horario.hora}')" class="btn btn-danger">Eliminar</button>`

                    botoneditar= `
                    <button onclick="CargarDatosEdicion(${horario.id}, '${horario.fecha}', '${horario.hora}')" class="btn btn-warning">Editar</button>`
                }
                else{
                    botoneditar = "";
                    botoneliminar = "";

                }
                let row = `
                    <tr id="fila-${horario.id}">
                        <td>${horario.id}</td>
                        <td>${horario.fecha}</td>
                        <td>${horario.hora}</td>
                        <td id="estado-${horario.id}">${horario.disponible ? "Disponible" : "Reservado"}</td>
                        <td>${horario.created_at}</td>
                        <td>${horario.updated_at}</td>
                        <td id="accion-${horario.id}">
                        ${botoneditar}
                        ${botoneliminar}
                         ${horario.disponible ? 
                                // Si el horario está disponible, muestra el botón de reservar
                                // y oculta el botón de cancelar
                                `<button onclick="ReservarHorario(${horario.id})" class="btn btn-success">Reservar</button>` :
                                // Si el horario está reservado, muestra el botón de cancelar
                                `<button onclick="CancelarReserva(${horario.id})" class="btn btn-danger">Cancelar</button>` 
                            }
                            </td>
                    </tr>
                `; // Crea una fila para la tabla con los datos del horario
                tableBody.innerHTML += row; // Agrega la fila al cuerpo de la tabla
            });
        })
        .catch(error => console.error("Error:", error)); // Maneja errores en la solicitud
}
function AgregarHorario() { // Función para agregar un nuevo horario

    let fecha = document.getElementById("fecha").value; // Obtener fecha del formulario
    let hora = document.getElementById("hora").value; // Obtener hora del formulario

    if (!fecha || !hora) { // Validar campos
        alert("Por favor, completa todos los campos."); // Mensaje de error
        return; // Salir de la función si hay campos vacíos
        
    }

    let formData = { // Crear objeto con los datos del formulario
        fecha: fecha,
        hora: hora,
    }
    

    fetch("http://127.0.0.1:8000/api/horarios", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content") // Asegúrate de tener el token CSRF en el <head>
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        // Mensaje de éxito
        alert("Horario agregado con éxito"); 
        
        // Limpiar formulario
        document.getElementById("formHorario").reset(); 

        // Cerrar modal
        var modal = new bootstrap.Modal(document.getElementById('modalHorario')); 
        modal.hide();

        // Recargar tabla de horarios
        CargarHorarios(); 
    })
    .catch(error => console.error("Error:", error));
}

function CargarDatosEdicion(id, fecha, hora) {
    document.getElementById("editId").value = id;
    document.getElementById("editFecha").value = fecha;
    document.getElementById("editHora").value = hora;

    // Mostrar el modal de edición
    var modal = new bootstrap.Modal(document.getElementById('modalEditarHorario'));
    modal.show();
}


function Editar(){
    let id = document.getElementById("editId").value;
    let fecha = document.getElementById("editFecha").value;
    let hora = document.getElementById("editHora").value;

    if (!fecha || !hora) {
        alert("Por favor, completa todos lo campos");
    }

    let formData = {
        fecha : fecha,
        hora : hora
    }
    fetch(`http://127.0.0.1:8000/api/horarios/Editar/${id}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content") // Asegúrate de tener el token CSRF en el <head>
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        alert("Horario actualizado correctamente");
        CargarHorarios();

    })
    .catch(error => console.log("Error :",error));
}

// Función para reservar un horario sin recargar la página
function ReservarHorario(id) { 
    fetch(`http://127.0.0.1:8000/api/horarios/reservar/${id}`, { method: "PUT" }) // Cambia la URL según tu API
    .then(response => response.json()) // Convierte la respuesta a JSON
    .then(data => { // Procesa la respuesta
        alert("Horario reservado con éxito"); // Muestra un mensaje de éxito

        // Actualizar solo la fila del horario sin recargar la página
        document.getElementById(`estado-${id}`).innerText = "Reservado"; // Cambia el estado a "Reservado"
        document.getElementById(`accion-${id}`).innerHTML = 
            `<button onclick="CancelarReserva(${id})" class="btn btn-danger">Cancelar</button>`;
    }) // Maneja la respuesta
    .catch(error => console.error("Error:", error)); // Maneja errores en la solicitud
}

// Función para cancelar una reserva sin recargar la página
function CancelarReserva(id) {
    fetch(`http://127.0.0.1:8000/api/horarios/cancelar/${id}`, { method: "PUT" }) // Cambia la URL según tu API
    .then(response => response.json())
    .then(data => { // Procesa la respuesta
        alert("Reserva cancelada con éxito"); // Muestra un mensaje de éxito

        // Actualizar solo la fila del horario sin recargar la página
        document.getElementById(`estado-${id}`).innerText = "Disponible"; // Cambia el estado a "Disponible"
        document.getElementById(`accion-${id}`).innerHTML = 
            `<button onclick="ReservarHorario(${id})" class="btn btn-success">Reservar</button>`;
            
    }) // Maneja la respuesta
    .catch(error => console.error("Error:", error)); // Maneja errores en la solicitud
}
function Eliminar(id){

    let comfirmar = confirm('¿Estás seguro de eliminar este usuario?');

    if (!comfirmar) {
        return;
    }

    fetch (`http://127.0.0.1:8000/api/horarios/Eliminar/${id}`, { method: "DELETE" }) // Cambia la URL según tu API
    .then(response => response.json())
    .then(data => { // Procesa la respuesta
        alert("Horario eliminado con éxito"); // Muestra un mensaje de éxito
        CargarHorarios();
    }) // Maneja la respuesta
    .catch(error => console.error("Error:", error)); // Maneja errores en la solicitud

}
