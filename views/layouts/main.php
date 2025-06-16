<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo URL_ROOT; ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4><?php echo SITE_NAME; ?></h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo (!isset($_GET['controller']) || $_GET['controller'] == 'dashboard') ? 'active' : ''; ?>" 
                   href="<?php echo URL_ROOT; ?>?controller=dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['controller']) && $_GET['controller'] == 'denuncias') ? 'active' : ''; ?>" 
                   href="<?php echo URL_ROOT; ?>?controller=denuncias">
                    <i class="fas fa-list"></i>
                    <span>Denuncias</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL_ROOT; ?>?controller=denuncias&action=crear">
                    <i class="fas fa-plus"></i>
                    <span>Nueva Denuncia</span>
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link text-info" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">
                    <i class="fas fa-info-circle"></i>
                    <span>Acerca del Sistema</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="container-fluid">
                <button class="btn btn-link" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>

        <!-- Content -->
        <div class="content">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php 
            // Incluye el contenido de la vista
            if(isset($view)) {
                require_once 'views/' . $view . '.php';
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.body.classList.toggle('sidebar-collapsed');
        });
    </script>
</body>
</html> 