<html>
    <head>
        <!-- Font Awesome Link -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
            <div class="offcanvas-header">
                <a href="home.php">
                    <img src="images/logo.png" alt="Clickable Image" style="width: 100px; height: auto;" />
                </a>
                <h5 id="offcanvasSidebarLabel">Management System</h5>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <hr class="text-secondary">
                <ul style="border-style: none; list-style: none; padding: 0;">
                    <li>
                        <a href="home.php" class="text-white" style="color: orange; text-decoration: none;">
                            <i class="fas fa-tachometer-alt"> </i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="manage-staff.php" class="text-white" style="color: orange; text-decoration: none;">
                            <i class="fas fa-users"></i> Manage Staff
                        </a>
                    </li>
                    <li>
                        <a href="inventory.php" class="text-white" style="color: orange; text-decoration: none;">
                            <i class="fas fa-boxes"></i> Inventory
                        </a>
                    </li>
                    <li>
                        <a href="manage_order.php" class="text-white" style="color: orange; text-decoration: none;">
                            <i class="fas fa-shopping-cart"></i> Manage Orders
                        </a>
                    </li>
                    <li>
                        <a href="charts.php" class="text-white" style="color: orange; text-decoration: none;">
                            <i class="fas fa-clipboard-list"></i> Activity Logs
                        </a>
                    </li>
                </ul>
                <hr class="text-secondary">
                <div style="color: orange;"> Jan Xyler <span class="fw-bold">Tailoring & Printing Services</span></div>
            </div>
        </div>

        <style>
            .offcanvas-body {
                color: orange;
            }

            .offcanvas-body ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .offcanvas-body li {
                border-style: none;
                padding: 10px 15px;
            }

            .offcanvas-body li a {
                color: orange;
                text-decoration: none;
                display: block;
            }

            .offcanvas-body li a i {
                margin-right: 10px;
            }

            .offcanvas-body li:hover {
                background-color: orange;
                border-radius: 5px;
            }

            .offcanvas-body li a:hover {
                color: white;
            }
        </style>

        <!-- Font Awesome Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    </body>
</html>
