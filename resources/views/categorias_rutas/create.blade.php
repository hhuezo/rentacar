@extends ('menu')
@section('content')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/dataTables/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="{{ asset('assets/libs/toast/toastr.min.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('assets/libs/toast/toastr.min.js') }}"></script>



    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Nuevo Categorias de rutas
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ url('categorias_rutas/create') }}" class="btn btn-primary">Nuevo</a>


                    </div>
                </div>
                <form method="POST" action="{{ route('categorias_rutas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-3">

                        {{-- Nombre --}}
                        <div class="col-md-6">
                            <label class="form-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                        </div>

                        {{-- Icono --}}
                        <div class="col-md-6">
                            <label class="form-label">Icono:</label>
                            <input type="file" name="icono" class="form-control" accept="image/*" id="iconInputCreate">

                            {{-- Preview de la imagen --}}
                            <img id="iconPreviewCreate" class="mt-2 img-fluid rounded d-none" style="max-height: 80px;">

                            <small class="text-muted">Si quieres, también puedes poner un icono de Bootstrap</small>
                            <input type="text" name="icono_bootstrap" class="form-control mt-1" placeholder="bi bi-sun">
                        </div>

                        {{-- Estado --}}
                        <div class="col-md-6">
                            <label class="form-label">Activo:</label>
                            <select name="activo" class="form-select" required>
                                <option value="1" {{ old('activo') == 1 ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('activo') == 0 ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </form>



            </div>

        </div>
    </div>




    <script>
        document.getElementById('iconInputCreate')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const preview = document.getElementById('iconPreviewCreate');
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        });
    </script>







    <!-- End:: row-1 -->
@endsection
