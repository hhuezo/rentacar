
@extends('menu')

@php
    use Illuminate\Support\Str;
@endphp

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
                        Listado de Categorias de rutas
                    </div>
                    <div class="prism-toggle">
                        <a href="{{ url('categorias_rutas/create') }}" class="btn btn-primary">Nuevo</a>


                    </div>
                </div>
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

                    <div class="table-responsive">
                        <table id="datatable-basic" class="table table-striped text-nowrap w-100">
                            <thead class="table-dark">
                                <tr>

                                    <th>Nombre</th>
                                    <th>Icono</th>
                                    <th>Activo</th>
                                    <th>Opciones</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias_rutas as $item)
                                    <tr>
                                        <td>{{ $item->nombre }}</td>

                                        <td>
                                            @php
                                                // Validar si es imagen por la extensión
                                                $esImagen = Str::endsWith($item->icono, ['jpg', 'jpeg', 'png', 'webp']);
                                            @endphp

                                            @if ($esImagen)
                                                <img src="{{ asset('categorias_rutas_files/' . $item->icono) }}"
                                                    alt="icono"
                                                    style="width:40px; height:40px; object-fit:cover; border-radius:5px;">
                                            @else
                                                <i class="{{ $item->icono }}" style="font-size: 30px;"></i>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($item->activo == 1)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>

                                        <td>
                                            <button class="btn btn-sm btn-info btn-wave" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-{{ $item->id }}">
                                                <i class="ri-edit-line"></i>
                                            </button>

                                            <button class="btn btn-sm btn-danger btn-wave" data-bs-toggle="modal"
                                                data-bs-target="#modal-delete-{{ $item->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>








    <script src="{{ asset('assets/libs/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dataTables/dataTables.bootstrap5.min.js') }}"></script>

    <!-- Activar DataTable -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            expandMenuAndHighlightOption('catalogoMenu', 'estadoTurnoOption');

            $('#datatable-basic').DataTable({
                language: {
                    processing: "Procesando...",
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    infoFiltered: "(filtrado de un total de _MAX_ registros)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron resultados",
                    emptyTable: "Ningún dato disponible en esta tabla",
                    paginate: {
                        first: "<<",
                        previous: "<",
                        next: ">",
                        last: ">>"
                    },
                    aria: {
                        sortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sortDescending: ": Activar para ordenar la columna de manera descendente"
                    },
                    buttons: {
                        copy: 'Copiar',
                        colvis: 'Visibilidad',
                        print: 'Imprimir',
                        excel: 'Exportar Excel',
                        pdf: 'Exportar PDF'
                    }
                }
            });


        });
    </script>
    <!-- End:: row-1 -->
@endsection
