<?php
require_once 'views/layouts/main.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista de Denuncias</h1>
        <div>
            <a href="?controller=denuncias&action=crear" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Denuncia
            </a>
        </div>
    </div>

    <?php if(empty($denuncias)): ?>
        <div class="alert alert-info">
            No hay denuncias registradas.
        </div>
    <?php else: ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Ciudadano</th>
                                <th>Ubicación</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($denuncias as $denuncia): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($denuncia->id); ?></td>
                                    <td><?php echo htmlspecialchars($denuncia->titulo); ?></td>
                                    <td><?php echo htmlspecialchars($denuncia->ciudadano); ?></td>
                                    <td><?php echo htmlspecialchars($denuncia->ubicacion); ?></td>
                                    <td>
                                        <span class="badge <?php 
                                            echo $denuncia->estado === 'pendiente' ? 'bg-warning' : 
                                                ($denuncia->estado === 'en_proceso' ? 'bg-info' : 'bg-success'); 
                                        ?>">
                                            <?php echo htmlspecialchars($denuncia->estado); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('d/m/Y', strtotime($denuncia->fecha_registro)); ?></td>
                                    <td>
                                        <a href="?controller=denuncias&action=editar&id=<?php echo $denuncia->id; ?>" 
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?controller=denuncias&action=eliminar&id=<?php echo $denuncia->id; ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('¿Está seguro de eliminar esta denuncia?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
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

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        }
    });
});
</script> 