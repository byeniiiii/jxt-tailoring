<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <title>JXT Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Burger Menu Button -->
<nav class="navbar navbar-light bg-light">
    <button class="btn btn-outline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="home.php">
        <img src="images/2.png" alt="Clickable Image" style="width: 50px; height: auto; padding: 8px;" />
    </a>
</nav>

<!-- Sidebar  -->
<?php include 'includes/sidebar.php'; ?>

<!-- Main Content -->
<div class="container-fluid mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Manage Staff</li>
        </ol><br>
    </nav>

    <!-- Add New Staff Button -->
    <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#addStaffModal">Add New Staff</button>

    <!-- Modal Form -->
    <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">Add New Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addStaffForm">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="Staff">Staff</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                                <option value="Sublimator">Sublimator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div id="successNotification" class="alert alert-success d-none" role="alert">
        Staff added successfully!
    </div>

    <!-- Staff Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="staffTableBody">
                <!-- Dynamic rows will be added here -->
            </tbody>
        </table>
    </div>
</div>

<script>
// Fetch existing staff data from the database on page load
document.addEventListener('DOMContentLoaded', function () {
    fetch('staff_backend.php?action=fetch')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('staffTableBody');
            tableBody.innerHTML = '';
            data.forEach(staff => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${staff.full_name}</td>
                    <td>${staff.role}</td>
                    <td>${staff.email}</td>
                    <td>${staff.contact_number}</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching staff:', error));
});

// Handle form submission for adding staff
document.getElementById('addStaffForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('staff_backend.php?action=add', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const fullName = formData.get('fullName');
                const role = formData.get('role');
                const email = formData.get('email');
                const contactNumber = formData.get('contactNumber');

                const tableBody = document.getElementById('staffTableBody');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${fullName}</td>
                    <td>${role}</td>
                    <td>${email}</td>
                    <td>${contactNumber}</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);

                const successNotification = document.getElementById('successNotification');
                successNotification.classList.remove('d-none');
                setTimeout(() => successNotification.classList.add('d-none'), 3000);

                // Reset the form and hide the modal
                document.getElementById('addStaffForm').reset();
                const modal = bootstrap.Modal.getInstance(document.getElementById('addStaffModal'));
                modal.hide();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding staff.');
        });
});
</script>

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    .btn-warning {
        background-color: orange;
        border-color: orange;
        color: white;
    }

    .btn-warning:hover {
        background-color: darkorange;
        border-color: darkorange;
    }

    .btn-primary, .btn-danger {
        color: white;
    }
</style>

</body>
</html>
