document.addEventListener("DOMContentLoaded", fetchClients);
function fetchClients() {
    fetch('api.php?action=get_all_clients')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('clientTableBody');
            tbody.innerHTML = '';
            data.forEach(client => {
                tbody.innerHTML += `
                    <tr>
                        <td>${client.id}</td>
                        <td><input type="text" value="${client.email}" id="email_${client.id}"></td>
                        <td><input type="text" value="${client.name}" id="name_${client.id}"></td>
                        <td><input type="text" value="${client.city}" id="city_${client.id}"></td>
                        <td><input type="text" value="${client.telephone}" id="telephone_${client.id}"></td>
                        <td>
                            <button onclick="updateClient(${client.id})">Actualizar</button>
                            <button onclick="deleteClient(${client.id})">Eliminar</button>
                        </td>
                    </tr>`;
            });
        });
}

function addClient() {
    const email = document.getElementById('email').value;
    const name = document.getElementById('name').value;
    const city = document.getElementById('city').value;
    const telephone = document.getElementById('telephone').value;
    
    fetch('api.php?action=create_client', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ email, name, city, telephone })
    }).then(() => fetchClients());
}

function deleteClient(id) {
    fetch(`api.php?action=delete_client_by_id&id=${id}`, { method: 'DELETE' })
        .then(() => fetchClients());
}

function updateClient(id) {
    const email = document.getElementById(`email_${id}`).value;
    const name = document.getElementById(`name_${id}`).value;
    const city = document.getElementById(`city_${id}`).value;
    const telephone = document.getElementById(`telephone_${id}`).value;
    
    fetch('api.php?action=update_client', {
        method: 'PUT',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ id, email, name, city, telephone })
    }).then(() => fetchClients());
}