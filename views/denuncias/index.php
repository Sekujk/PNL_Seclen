<?php
$content = '
<div class="row mb-4">
    <div class="col-md-6">
        <h2 class="mb-0">
            <i class="fas fa-list-alt me-2"></i>
            Lista de Denuncias
        </h2>
    </div>
    <div class="col-md-6">
        <form action="index.php" method="GET" class="d-flex search-box">
            <input type="hidden" name="action" value="index">
            <input type="text" name="search" class="form-control" placeholder="Buscar por título, ciudadano o ubicación..." value="' . htmlspecialchars($search) . '">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><i class="fas fa-heading me-1"></i> Título</th>
                        <th><i class="fas fa-align-left me-1"></i> Descripción</th>
                        <th><i class="fas fa-map-marker-alt me-1"></i> Ubicación</th>
                        <th><i class="fas fa-tasks me-1"></i> Estado</th>
                        <th><i class="fas fa-user me-1"></i> Ciudadano</th>
                        <th><i class="fas fa-phone me-1"></i> Teléfono</th>
                        <th><i class="fas fa-calendar me-1"></i> Fecha</th>
                        <th><i class="fas fa-cogs me-1"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $content .= '
            <tr>
                <td>' . htmlspecialchars($row['titulo']) . '</td>
                <td>' . htmlspecialchars($row['descripcion']) . '</td>
                <td>' . htmlspecialchars($row['ubicacion']) . '</td>
                <td>
                    <span class="badge bg-' . ($row['estado'] == 'pendiente' ? 'warning' : ($row['estado'] == 'en proceso' ? 'info' : 'success')) . '">
                        <i class="fas ' . ($row['estado'] == 'pendiente' ? 'fa-clock' : ($row['estado'] == 'en proceso' ? 'fa-spinner' : 'fa-check-circle')) . ' me-1"></i>
                        ' . htmlspecialchars($row['estado']) . '
                    </span>
                </td>
                <td>' . htmlspecialchars($row['ciudadano']) . '</td>
                <td>' . htmlspecialchars($row['telefono_ciudadano']) . '</td>
                <td>' . date('d/m/Y H:i', strtotime($row['fecha_registro'])) . '</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="index.php?action=edit&id=' . $row['id'] . '" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete&id=' . $row['id'] . '" class="btn btn-sm btn-danger delete-confirm" data-bs-toggle="tooltip" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>';
}

$content .= '
                </tbody>
            </table>
        </div>
    </div>
</div>';

// Pagination
if ($total_pages > 1) {
    $content .= '<nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">';
    
    // Previous button
    $content .= '<li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">
        <a class="page-link" href="index.php?action=index&page=' . ($page - 1) . '&search=' . urlencode($search) . '">
            <i class="fas fa-chevron-left me-1"></i>Anterior
        </a>
    </li>';
    
    // Page numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        $content .= '<li class="page-item ' . ($page == $i ? 'active' : '') . '">
            <a class="page-link" href="index.php?action=index&page=' . $i . '&search=' . urlencode($search) . '">' . $i . '</a>
        </li>';
    }
    
    // Next button
    $content .= '<li class="page-item ' . ($page >= $total_pages ? 'disabled' : '') . '">
        <a class="page-link" href="index.php?action=index&page=' . ($page + 1) . '&search=' . urlencode($search) . '">
            Siguiente<i class="fas fa-chevron-right ms-1"></i>
        </a>
    </li>';
    
    $content .= '</ul></nav>';
}

include __DIR__ . '/../layouts/main.php';
?> 