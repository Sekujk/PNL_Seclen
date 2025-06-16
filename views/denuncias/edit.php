<?php
require_once 'views/layouts/main.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Denuncia</h1>
        <a href="?controller=denuncias" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="?controller=denuncias&action=editar&id=<?php echo $denuncia->id; ?>" method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" 
                           value="<?php echo htmlspecialchars($denuncia->titulo); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" 
                              rows="3" required><?php echo htmlspecialchars($denuncia->descripcion); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" 
                           value="<?php echo htmlspecialchars($denuncia->ubicacion); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="pendiente" <?php echo $denuncia->estado === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="en_proceso" <?php echo $denuncia->estado === 'en_proceso' ? 'selected' : ''; ?>>En Proceso</option>
                        <option value="resuelto" <?php echo $denuncia->estado === 'resuelto' ? 'selected' : ''; ?>>Resuelto</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ciudadano" class="form-label">Ciudadano</label>
                    <input type="text" class="form-control" id="ciudadano" name="ciudadano" 
                           value="<?php echo htmlspecialchars($denuncia->ciudadano); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="telefono_ciudadano" class="form-label">Teléfono del Ciudadano</label>
                    <input type="tel" class="form-control" id="telefono_ciudadano" name="telefono_ciudadano" 
                           value="<?php echo htmlspecialchars($denuncia->telefono_ciudadano); ?>" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 