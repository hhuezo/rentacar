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
                        Nuevo vehiculo
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ url('vehiculo/create') }}" class="btn btn-primary">Nuevo</a>


                    </div>
                </div>
                <form method="POST" action="{{ route('vehiculo.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif

                        @if (session('error'))
                            <script>
                                toastr.error("{{ session('error') }}");
                            </script>
                        @endif

                        <div class="modal-body">
                            <div class="row gy-4">

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Marca:</label>
                                    <input type="text" class="form-control" name="marca" value="{{ old('marca') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Modelo:</label>
                                    <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Año:</label>
                                    <input type="number" class="form-control" name="anio" value="{{ old('anio') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Placa:</label>
                                    <input type="text" class="form-control" name="placa" value="{{ old('placa') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Color:</label>
                                    <input type="text" class="form-control" name="color" value="{{ old('color') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Tipo:</label>
                                    <input type="text" class="form-control" name="tipo" value="{{ old('tipo') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Capacidad:</label>
                                    <input type="number" class="form-control" name="capacidad"
                                        value="{{ old('capacidad') }}" required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Precio por día:</label>
                                    <input type="number" class="form-control" name="precio_dia"
                                        value="{{ old('precio_dia') }}" required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label class="form-label">Foto:</label>
                                    <input type="file" class="form-control" name="foto" accept="image/*"
                                        id="fotoInput" required>

                                    <!-- PREVIEW -->
                                    <img id="previewFoto" src="#" alt="Vista previa"
                                        class="mt-2 img-fluid rounded d-none"
                                        style="max-height: 180px; border:1px solid #ddd;">
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Descripción:</label>
                                    <input type="text" class="form-control" name="descripcion"
                                        value="{{ old('descripcion') }}" required>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>


            </div>

        </div>
    </div>




    <script>
        document.getElementById('fotoInput').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                let imgPreview = document.getElementById('previewFoto');
                imgPreview.src = URL.createObjectURL(file);
                imgPreview.classList.remove('d-none');
            }
        });
    </script>






    <!-- End:: row-1 -->
@endsection
