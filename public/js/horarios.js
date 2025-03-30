document.addEventListener("DOMContentLoaded", function () { // Espera a que el DOM esté completamente cargado
    CargarHorarios(); // Llama a la función para cargar los horarios al cargar la página
});

// Función para cargar los horarios y mostrarlos en la tabla
function CargarHorarios() {
    fetch("http://127.0.0.1:8000/api/horarios")  // Cambia la URL según tu API
        .then(response => response.json())  // Convierte la respuesta a JSON
        .then(data => {  // Procesa los datos recibidos
            let tableBody = document.getElementById("horariosTable"); // Obtiene el cuerpo de la tabla
            tableBody.innerHTML = ""; // Limpia el contenido previo de la tabla

            data.forEach(horario => {  // Itera sobre cada horario recibido
                let row = `
                    <tr id="fila-${horario.id}">
                        <td>${horario.id}</td>
                        <td>${horario.fecha}</td>
                        <td>${horario.hora}</td>
                        <td id="estado-${horario.id}">${horario.disponible ? "Disponible" : "Reservado"}</td>
                        <td id="accion-${horario.id}">
                            ${horario.disponible ? 
                                `<button onclick="ReservarHorario(${horario.id})" class="btn btn-success">Reservar</button>` :
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

document.getElementById("formHorario").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar recarga

    let formData = {
        fecha: document.getElementById("fecha").value,
        hora: document.getElementById("hora").value
    };
    console.log(formData); // Verifica los datos del formulario
    

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
        alert("Horario agregado con éxito"); // Mensaje de éxito
        document.getElementById("formHorario").reset(); // Limpiar formulario
        var modal = new bootstrap.Modal(document.getElementById('modalHorario')); // Cerrar modal
        modal.hide();
        CargarHorarios(); // Recargar tabla de horarios
    })
    .catch(error => console.error("Error:", error));
}); // Escucha el evento de envío del formulario

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
