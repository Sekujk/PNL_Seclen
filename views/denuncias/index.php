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

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        }
    });
});
</script> 