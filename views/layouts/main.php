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

    <!-- Modal Acerca de -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="aboutModalLabel">
                        <i class="fas fa-info-circle me-2"></i>
                        Sistema de Gestión de Denuncias Ciudadanas
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center mb-4">
                                <i class="fas fa-shield-alt fa-4x text-primary mb-3"></i>
                                <h4 class="text-primary">Sistema de Gestión de Denuncias Ciudadanas</h4>
                                <p class="text-muted">Plataforma integral para la gestión y seguimiento de denuncias ciudadanas</p>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fas fa-star text-warning me-2"></i>Características Principales</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    Registro y seguimiento de denuncias
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    Gestión de estados en tiempo real
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    Panel de control con estadísticas
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    Interfaz intuitiva y responsiva
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    Sistema de notificaciones
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    Reportes y estadísticas
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fas fa-code text-primary me-2"></i>Tecnologías Utilizadas</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <i class="fab fa-php fa-2x text-primary me-2"></i>
                                                    <span class="align-middle">PHP 8.0</span>
                                                </li>
                                                <li class="mb-2">
                                                    <i class="fab fa-bootstrap fa-2x text-primary me-2"></i>
                                                    <span class="align-middle">Bootstrap 5</span>
                                                </li>
                                                <li class="mb-2">
                                                    <i class="fas fa-database fa-2x text-primary me-2"></i>
                                                    <span class="align-middle">MySQL</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <i class="fab fa-js fa-2x text-primary me-2"></i>
                                                    <span class="align-middle">JavaScript</span>
                                                </li>
                                                <li class="mb-2">
                                                    <i class="fab fa-font-awesome fa-2x text-primary me-2"></i>
                                                    <span class="align-middle">Font Awesome</span>
                                                </li>
                                                <li class="mb-2">
                                                    <i class="fas fa-table fa-2x text-primary me-2"></i>
                                                    <span class="align-middle">DataTables</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="fas fa-info-circle text-info me-2"></i>Información del Proyecto</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong><i class="fas fa-user me-2"></i>Desarrollador:</strong><br>
                                            Alejandro Seclen Leonardo</p>
                                            <p><strong><i class="fas fa-code-branch me-2"></i>Versión:</strong><br>
                                            1.0.0</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><i class="fas fa-calendar-alt me-2"></i>Última actualización:</strong><br>
                                            <?php echo date('d/m/Y'); ?></p>
                                            <p><strong><i class="fas fa-envelope me-2"></i>Contacto:</strong><br>
                                            alejoseclen@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.body.classList.toggle('sidebar-collapsed');
        });
    </script>
</body>
</html> 