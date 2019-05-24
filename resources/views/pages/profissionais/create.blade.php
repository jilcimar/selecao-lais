@extends('layouts.base')
@section('head-extra')
    <!-- Dropzone Css -->
    <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{ asset('plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{ asset('plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ asset('plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/images/ui-icons_444444_256x240.png">

@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        CADASTRAR UM NOVO PROFISSIONAL NO SISTEMA
                    </h2>
                </div>
                <div class="body">
                    <form class="form-material" action="#" method="post" enctype="multipart/form-data">
                        @csrf

                        <label for="nome">Nome</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do profissionao" required>
                            </div>
                        </div>

                        <label for="cns">CNS</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="cns" name="cns" class="form-control" placeholder="Digite o número CNS" required>
                            </div>
                        </div>

                        <label for="data_atribuicao">Data de Atribuição</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="data_atribuicao" name="data_atribuicao" class="form-control" placeholder="Digite a data de atribuição" required>
                            </div>
                        </div>

                        <label for="data_atribuicao">CH</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" placeholder="Digite a Carga Horária" required>
                            </div>
                        </div>

                        <label for="sus">SUS?</label>
                        <div class="form-group">
                            <div class="form-line">
                                <div class="switch">
                                    <label>NÃO<input type="checkbox" id="sus"  value="{{true}}"><span class="lever"></span>SIM</label>
                                </div>
                            </div>
                        </div>

                        <label for="cbo">CBO</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id="cbo" data-live-search="true" name="cbo" required>
                                    <option disabled value="" selected>Selecione um CBO</option>
                                    <option  value="1">CBO 1 - FAKE</option>
                                    <option  value="2">CBO 2 - FAKE</option>
                                    {{--@foreach($cbos as $cbo)--}}
                                        {{--<option value="{{$cbo->id}}">{!!$cbo->descricao!!}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                        </div>

                        <label for="tipo_id">Tipo</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id="tipo_id" data-live-search="true" name="tipo_id" required>
                                    <option disabled value="" selected>Selecione um Tipo</option>
                                    <option  value="1">TIPO 1 - FAKE</option>
                                    <option  value="2">TIPO 2 - FAKE</option>
                                    {{--@foreach($tipos as $tipo)--}}
                                    {{--<option value="{{$tipo->id}}">{!!$tipo->descricao!!}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                        </div>

                        <label for="vinculacao_id">Vinculação</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id="vinculacao_id" data-live-search="true" name="vinculacao_id" required>
                                    <option disabled value="" selected>Selecione um Vínculo</option>
                                    <option  value="1">VINCULO 1 - FAKE</option>
                                    <option  value="2">VINCULO 2 - FAKE</option>
                                    {{--@foreach($tipos as $tipo)--}}
                                    {{--<option value="{{$tipo->id}}">{!!$tipo->descricao!!}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">CADASTRAR</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-extra')

    <script src="{{ asset('js/pages/examples/sign-up.js') }}"></script>

    <script>
        function format(mascara, documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i)

            if (texto.substring(0, 1) != saida) {
                documento.value += texto.substring(0, 1);
            }

        }
    </script>

    <script>$('#mdp-demo').multiDatesPicker();</script>
    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ asset('plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ asset('plugins/nouislider/nouislider.js') }}"></script>

    <!-- Custom Page Js -->
    <script src="{{ asset('js/pages/forms/advanced-form-elements.js') }}"></script>

@endsection
