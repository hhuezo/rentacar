<form action="{{ route('categorias_rutas.update', $categorias_rutas->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row gy-3">

            {{-- Nombre --}}
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $categorias_rutas->nombre }}" required>
            </div>

            {{-- Icono --}}
            @if ($categorias_rutas->icono)
                <img src="{{ asset('categorias_rutas_files/' . $categorias_rutas->icono) }}" alt="Icono"
                    class="img-fluid mt-2" style="max-height: 80px;">
            @else
                <span class="text-muted">Sin icono</span>
            @endif

        </div>

        {{-- Estado --}}
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <label class="form-label">Activo:</label>
            <select name="activo" class="form-select" required>
                <option value="1" {{ $categorias_rutas->activo == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $categorias_rutas->activo == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <td>
            <!-- Botón EDITAR: abre modal de edición -->
            <button class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#modal-edit-{{ $categorias_rutas->id }}">
                Editar
            </button>

            <!-- Botón ELIMINAR: abre modal de eliminación -->
            <button class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#modal-delete-{{ $categorias_rutas->id }}">
                Eliminar
            </button>
        </td>

    </div>
    </div>

    <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary">Guardar cambios</button>
    </div>

</form>
</div>
</div>
</div>

{{-- Script preview --}}
<script>
    document.getElementById('iconInput{{ $categorias_rutas->id }}')?.addEventListener('change', function(e) {
        let file = e.target.files[0];
        if (file) {
            let prev = document.getElementById('iconPreview{{ $categorias_rutas->id }}');
            prev.src = URL.createObjectURL(file);
            prev.classList.remove('d-none');
        }
    });
</script>
