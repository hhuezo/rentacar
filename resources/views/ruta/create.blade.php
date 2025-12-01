@extends ('menu')
@section('content')


    <!-- Toastr CSS -->
    <link href="{{ asset('assets/libs/toast/toastr.min.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('assets/libs/toast/toastr.min.js') }}"></script>

    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>


    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Nueva ruta
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ url('ruta/create') }}" class="btn btn-primary">Nuevo</a>


                    </div>
                </div>
                <form method="POST" action="{{ route('ruta.store') }}" enctype="multipart/form-data">
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
                                    <label for="input-label" class="form-label">Categoria:</label>
                                    <select name="categoria_id" class="form-select">
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Precio:</label>
                                    <input type="number" class="form-control" name="precio" value="{{ old('precio') }}"
                                        required>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Duración:</label>
                                    <input type="text" class="form-control" name="duracion"
                                        value="{{ old('duracion') }}" required>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <label for="input-label" class="form-label">Descripción:</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <label class="form-label">Foto portada:</label>
                                    <input type="file" class="form-control" name="foto" accept="image/*"
                                        id="fotoInput" required>

                                    <!-- PREVIEW -->
                                    <img id="previewFoto" src="#" alt="Vista previa"
                                        class="mt-2 img-fluid rounded d-none"
                                        style="max-height: 180px; border:1px solid #ddd;">
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <label class="form-label">Imágenes del contenido:</label>

                                    <!-- Área de arrastrar -->
                                    <div id="dropArea" class="border border-primary rounded p-4 text-center"
                                        style="cursor:pointer; background:#f8f9fa;">
                                        <p class="mb-0">Arrastra tus imágenes aquí o haz clic para seleccionarlas</p>
                                    </div>

                                    <!-- Input oculto -->
                                    <input type="file" name="imagenes[]" id="imagenesInput" accept="image/*" multiple
                                        class="d-none">

                                    <!-- Previews -->
                                    <div id="previewContainer" class="row mt-3"></div>
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

        $(document).ready(function() {
            $('#descripcion').summernote({
                placeholder: 'Escribe aquí tu contenido...',
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', []], // ❌ Vacío: NO permite imágenes, videos, enlaces, etc.
                    ['view', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onPaste: function(e) {
                        // ❌ Bloquea pegar imágenes
                        let clipboardData = e.originalEvent.clipboardData;
                        if (clipboardData && clipboardData.items) {
                            for (let i = 0; i < clipboardData.items.length; i++) {
                                if (clipboardData.items[i].type.indexOf("image") !== -1) {
                                    e.preventDefault();
                                    return false;
                                }
                            }
                        }
                    }
                }
            });

        });
    </script>


<script>
    const dropArea = document.getElementById("dropArea");
    const imagenesInput = document.getElementById("imagenesInput");
    const previewContainer = document.getElementById("previewContainer");

    // Array donde realmente gestionamos los archivos
    let selectedFiles = [];

    // --- ABRIR EXPLORADOR AL CLIC ---
    dropArea.addEventListener("click", () => imagenesInput.click());

    // --- DETECTAR CAMBIO INPUT (selección manual) ---
    imagenesInput.addEventListener("change", function () {
        addFiles(this.files);
    });

    // --- EVITAR COMPORTAMIENTO POR DEFECTO ---
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, e => e.preventDefault());
        document.body.addEventListener(eventName, e => e.preventDefault());
    });

    // --- RESALTAR CUANDO HAY DRAG ---
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.classList.add('bg-light');
            dropArea.style.borderColor = "#0d6efd";
        });
    });

    // --- QUITAR RESALTADO ---
    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.classList.remove('bg-light');
            dropArea.style.borderColor = "#0d6efd";
        });
    });

    // --- CUANDO SUELTAN ARCHIVOS (drag & drop) ---
    dropArea.addEventListener("drop", function (e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        addFiles(files);
    });

    // =========================
    //  AGREGAR ARCHIVOS AL ARRAY
    // =========================
    function addFiles(files) {
        Array.from(files).forEach(file => {
            if (file.type.startsWith("image/")) {
                selectedFiles.push(file);
            }
        });

        renderPreviews();
        syncInputFiles();
    }

    // =========================
    //  RENDER DE PREVIEWS
    // =========================
    function renderPreviews() {
        previewContainer.innerHTML = "";

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                let col = document.createElement("div");
                col.classList.add("col-md-3", "mb-3");

                col.innerHTML = `
                    <div class="card shadow-sm">
                        <img src="${e.target.result}" class="card-img-top" style="height:140px; object-fit:cover;">
                        <div class="card-body p-2 text-center">
                            <button type="button" class="btn btn-danger btn-sm w-100 removeImage" data-index="${index}">
                                Eliminar
                            </button>
                        </div>
                    </div>
                `;

                previewContainer.appendChild(col);

                // Asignar evento al botón eliminar
                col.querySelector('.removeImage').addEventListener('click', function () {
                    const idx = this.getAttribute('data-index');
                    removeImage(idx);
                });
            };
            reader.readAsDataURL(file);
        });
    }

    // =========================
    //  ELIMINAR IMAGEN DEL ARRAY
    // =========================
    function removeImage(index) {
        index = parseInt(index);
        selectedFiles.splice(index, 1); // quitar del array
        renderPreviews();               // volver a dibujar previews
        syncInputFiles();               // sincronizar input file
    }

    // =========================
    //  SINCRONIZAR INPUT FILE
    // =========================
    function syncInputFiles() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        imagenesInput.files = dt.files;
    }
</script>






    <!-- End:: row-1 -->
@endsection
