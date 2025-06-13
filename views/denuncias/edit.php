<?php
$content = '
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Denuncia</h3>
            </div>
            <div class="card-body">
                <form action="index.php?action=edit&id=' . $this->denuncia->id . '" method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="' . htmlspecialchars($this->denuncia->titulo) . '" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>' . htmlspecialchars($this->denuncia->descripcion) . '</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="' . htmlspecialchars($this->denuncia->ubicacion) . '" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="pendiente" ' . ($this->denuncia->estado == 'pendiente' ? 'selected' : '') . '>Pendiente</option>
                            <option value="en proceso" ' . ($this->denuncia->estado == 'en proceso' ? 'selected' : '') . '>En Proceso</option>
                            <option value="resuelto" ' . ($this->denuncia->estado == 'resuelto' ? 'selected' : '') . '>Resuelto</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="ciudadano" class="form-label">Nombre del Ciudadano</label>
                        <input type="text" class="form-control" id="ciudadano" name="ciudadano" value="' . htmlspecialchars($this->denuncia->ciudadano) . '" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="telefono_ciudadano" class="form-label">Teléfono del Ciudadano</label>
                        <input type="tel" class="form-control" id="telefono_ciudadano" name="telefono_ciudadano" value="' . htmlspecialchars($this->denuncia->telefono_ciudadano) . '" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar Denuncia</button>
                        <a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';

include __DIR__ . '/../layouts/main.php';
?> 