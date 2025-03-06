# Client Management CRUD Application

This project is a simple Client Management CRUD (Create, Read, Update, Delete) application built with PHP, MySQL, HTML, CSS, and JavaScript. The application allows users to add, view, update, and delete client records stored in a MySQL database.

## Features
- **Create**: Add new clients to the database.
- **Read**: Display a list of all clients.
- **Update**: Edit client details.
- **Delete**: Remove clients from the database.

## Prerequisites
Before running the project, ensure you have the following installed:
- PHP (>=7.x)
- MySQL Server
- Apache or any other local server (e.g., XAMPP, WAMP, MAMP)
- A web browser

## Database Setup
1. Create a new database in MySQL named `code_pills`.
2. Run the following SQL query to create the required table:

```sql
CREATE TABLE listado_clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL
);
```

## Project Structure
```
API-REST/
│── includes/
│   ├── Database.class.php      # Database connection class
│   ├── Client.class.php        # Client CRUD class
│── api-rest/
│   ├── create_client.php       # API to insert a client
│   ├── delete_client.php       # API to delete a client
│   ├── update_client.php       # API to update a client
│── index.php                   # Main interface (list clients)
│── edit.php                    # Client edit form
│── style.css                    # Stylesheet
│── app.js                       # JavaScript for frontend actions
```

## How It Works
### Insert a Client
1. Open `index.php` in the browser.
2. Fill out the form with client details (Email, Name, City, Telephone).
3. Click "Add Client" to save the client to the database.

### View Clients
- The client list is automatically displayed on the main page (`index.php`).
- Data is fetched from the `get_all_clients()` function in `Client.class.php`.

### Update a Client
1. Click the "Edit" button next to a client.
2. You will be redirected to `edit.php` with the client’s details pre-filled.
3. Modify the data and submit the form to update the client.

### Delete a Client
1. Click the "Delete" button next to a client.
2. A confirmation alert will appear.
3. If confirmed, the client will be removed from the database.

## API Endpoints
| Method | Endpoint                 | Description |
|--------|--------------------------|-------------|
| POST   | api-rest/create_client.php | Adds a new client |
| GET    | api-rest/get_clients.php   | Retrieves all clients |
| POST   | api-rest/update_client.php | Updates a client’s details |
| POST   | api-rest/delete_client.php | Deletes a client |

## Installation & Setup
1. Clone this repository:
   ```bash
   git clone https://github.com/yourusername/client-management.git
   ```
2. Move to the project directory:
   ```bash
   cd client-management
   ```
3. Start your local server (XAMPP, WAMP, etc.).
4. Import the SQL database (`code_pills`) and create the `listado_clientes` table.
5. Open `index.php` in your browser.

## Technologies Used
- **PHP**: Backend logic
- **MySQL**: Database management
- **HTML/CSS**: UI design
- **JavaScript**: Frontend actions (optional AJAX for future improvements)

## Notes
- Ensure your MySQL server is running before using the application.
- Update database credentials in `Database.class.php` if necessary.
- You can extend this project by adding validation, authentication, or AJAX for a smoother experience.

## Author
Sebastian Nope 🚀

---
Feel free to modify or extend this project as needed! 🎯
