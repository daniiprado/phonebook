@extends('themes.material.layouts.dashboard')

@section('title', '- Directorio')

@section('page-title', 'Directorio')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-header">
                                <h4 class="card-title">Modal</h4>
                            </div>
                            <button class="btn btn-primary btn-raised btn-round" data-toggle="modal" data-target="#add-user">
                                <i class="material-icons">assignment_ind</i> Nuevo Contacto
                            </button>
                            <!-- Classic Modal -->
                            <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="addUser" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="col-md-12">
                                            <div class="card">
                                                {{ Form::open(['id' => 'RegisterValidation', 'method' => 'POST', 'route' => 'create']) }}
                                                <div class="card-header card-header-icon" data-background-color="green">
                                                    <i class="material-icons">assignment_ind</i>
                                                </div>
                                                <div class="card-content">
                                                    <h4 class="card-title">Regisrar Nuevo Usuario</h4>

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
                            <!--  End Modal -->
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
@endpush

@push('functions')
  <script src="{{ asset('js/custom.js') }}"></script>
  <script type="text/javascript">
      jQuery(document).ready(function() {
          FormValidation.init();
      });
  </script>
@endpush