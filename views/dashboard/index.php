<?php
require_once 'views/layouts/main.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Panel de Control</h1>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total de Denuncias</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Denuncias Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['pendientes']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                En Proceso</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['en_proceso']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Denuncias Resueltas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['resueltas']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Denuncias Recientes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Denuncias Recientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
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
                        <?php if(empty($denuncias_recientes)): ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay denuncias recientes</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($denuncias_recientes as $denuncia): ?>
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
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 