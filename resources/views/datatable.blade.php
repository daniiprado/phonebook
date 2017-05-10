@extends('themes.material.layouts.dashboard')

@section('title', '- Directorio')

@section('page-title', 'Directorio')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header card-header-icon" data-background-color="green">
                                <i class="material-icons">assignment_ind</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Contáctos</h4>
                                <div class="material-datatables">
                                    <div id="controlPanel" class="text-right">

                                    </div>
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                           cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                            <th>E-mail</th>
                                            <th>Teléfono</th>
                                            <th>Creado</th>
                                            <th>Actualizado</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                            <th>E-mail</th>
                                            <th>Teléfono</th>
                                            <th>Creado</th>
                                            <th>Actualizado</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>

                            </div>
                            <!-- Start Add User Modal -->
                            <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="addUser"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="col-md-12">
                                            <div class="card">
                                                {{ Form::open(['id' => 'RegisterValidation', 'method' => 'POST', 'route' => 'create']) }}
                                                <div class="card-header card-header-icon" data-background-color="green">
                                                    <i class="material-icons">assignment_ind</i>
                                                </div>
                                                <div class="card-content">
                                                    <h4 class="card-title">Registrar Nuevo Usuario</h4>

                                                    {!! Field::text('full_name', ['required', 'auto' => 'off'], ['help' => 'Digita tu nombre completo.']) !!}
                                                    {!! Field::number('document', ['required', 'auto' => 'off'], ['help' => 'Digita tu número de documento.']) !!}
                                                    {!! Field::email('email', ['required', 'auto' => 'off'], ['help' => 'Digita un correo.']) !!}
                                                    {!! Field::tel('phone', ['required', 'auto' => 'off'], ['help' => 'Digita tu número de teléfono']) !!}

                                                    <div class="form-footer text-right">
                                                        {!! Form::button('Cancelar', ['class' => 'btn btn-danger btn-fill', 'data-dismiss' => 'modal']) !!}
                                                        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-fill']) !!}
                                                    </div>
                                                </div>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End Add User Modal -->
                            <!-- Start Edit User Modal -->
                            <div class="modal fade" id="edit-user" tabindex="-1" role="dialog"
                                 aria-labelledby="editUser" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="col-md-12">
                                            <div class="card">
                                                {{ Form::open(['id' => 'EditValidation', 'method' => 'POST', 'route' => 'edit']) }}
                                                <div class="card-header card-header-icon" data-background-color="green">
                                                    <i class="material-icons">assignment_ind</i>
                                                </div>
                                                <div class="card-content">
                                                    <h4 class="card-title">Editar Usuario</h4>
                                                    {!! Field::hidden('id_user') !!}
                                                    {!! Field::text('full_name', ['id' => 'full_name_edit', 'required', 'auto' => 'off'], ['help' => 'Digita tu nombre completo.']) !!}
                                                    {!! Field::number('document', ['id' => 'document_edit', 'required', 'auto' => 'off'], ['help' => 'Digita tu número de documento.']) !!}
                                                    {!! Field::email('email', ['id' => 'email_edit', 'required', 'auto' => 'off'], ['help' => 'Digita un correo.']) !!}
                                                    {!! Field::tel('phone', ['id' => 'phone_edit', 'required', 'auto' => 'off'], ['help' => 'Digita tu número de teléfono']) !!}

                                                    <div class="form-footer text-right">
                                                        {!! Form::button('Cancelar', ['class' => 'btn btn-danger btn-fill', 'data-dismiss' => 'modal']) !!}
                                                        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-fill']) !!}
                                                    </div>
                                                </div>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End Edit User Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
<script src="{{ asset('js/localization/messages_es.js') }}"></script>
<script src="{{ asset('js/sweetalert2.js') }}"></script>

<script src="{{ asset('https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/colreorder/1.3.3/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.28/pdfmake.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.28/vfs_fonts.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js') }}"></script>
@endpush

@push('functions')
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript">

    var dataTableServer = function () {
        var handleDataTable = function () {
            var table = $('#datatables');

            table.DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todo"]
                ],
                responsive: true,
                colReorder: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('table') }}',
                language: {
                    "sProcessing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> <span class="sr-only">Procesando...</span>',
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'document', name: 'document'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {
                     defaultContent: '<a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a><a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>',
                     data:'action',
                     name:'action',
                     title:'Acción',
                     orderable: false,
                     searchable: false,
                     exportable: false,
                     printable: false,
                     className: 'text-right',
                     render: null,
                     },
                ]
            }
    );


    };

    return {
        init: function () {
            handleDataTable();
        }
    };
    }
    ();

    jQuery(document).ready(function () {
        FormValidation.init();
        dataTableServer.init();

        var table = $('#datatables').DataTable();

        new $.fn.dataTable.Buttons( table, {
            ajax: '{{ route('table') }}',
            buttons: [
                {
                    text: '<i class="fa fa-plus"></i>',
                    className: 'btn btn-primary btn-xs',
                    action: function ( e, dt, node, config ) {
                        $('#add-user').modal('show');
                    }
                },
                {
                    extend: 'copy',
                    text: '<i class="fa fa-files-o"></i>',
                    className: 'btn btn btn-primary btn-xs'
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    className: 'btn btn-primary btn-xs',
                    attributes: ['data-toggle', 'Hola']
                },
                {
                    extend: 'csv',
                    text: '<i class="fa fa-file-text-o"></i>',
                    className: 'btn btn-primary btn-xs'
                },
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    className: 'btn btn-primary btn-xs'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    className: 'btn btn-primary btn-xs'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i> 2',
                    pageMargins: [ 1, 1, 1, 1],
                    orientation: 'landscape',
                    pageSize: 'LETTER',
                    className: 'btn btn-primary btn-xs',
                    background: 'simple text',
                    download: 'open'
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns" aria-hidden="true"></i>',
                    className: 'btn btn-primary btn-xs dropdown-toggle',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    }
                },
                {
                    text: '<i class="fa fa-refresh"></i>',
                    className: 'btn btn-primary btn-xs',
                    action: function ( e, dt, node, config ) {
                        dt.ajax.reload();
                    }
                },
            ]
        } );

        table
            .buttons()
            .container()
            .appendTo( '#controlPanel' );

        // Edit record
        table.on('click', '.edit', function () {

            $tr = $(this).closest('tr');
            var data = table.row($tr).data();

            $('#field_full_name_edit').addClass('is-focused');
            $('#field_document_edit').addClass('is-focused');
            $('#field_email_edit').addClass('is-focused');
            $('#field_phone_edit').addClass('is-focused');

            $('input[name="id_user"]').val(data.id);
            $('#full_name_edit').val(data.name);
            $('#document_edit').val(data.document);
            $('#email_edit').val(data.email);
            $('#phone_edit').val(data.phone);

            $('#edit-user').modal('show');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            var token = $('meta[name="csrf-token"]').val();
            var route = '{{ route('delete') }}';


            var f = new FormData();
            f.append("id", data.id);

            swal({
                title: '¿Estás seguro?',
                text: "Eliminaras a " + data.name + " y no podrás revertir los cambios",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Si, eliminar',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': token},
                    cache: false,
                    type: 'POST',
                    contentType: false,
                    data: f,
                    processData: false,

                    success: function (data) {
                        swal({
                            title: data.title,
                            text: data.message,
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-success",
                            type: data.success,
                        }).then(function () {
                            table.row($tr).remove().draw();
                        });
                    },
                    error: function (data) {
                        swal({
                            title: 'Algo pasó',
                            text: 'No se pudo eliminar los datos',
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-danger",
                            type: 'warning',
                        });
                    }
                });
            });
        });


        $('.card .material-datatables label').addClass('form-group');
    });
</script>
@endpush