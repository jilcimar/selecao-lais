@extends('layouts.base')
@section('head-extra')
    <!-- Colorpicker Css -->
    <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet"/>

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

    <!-- Datepicker -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link id="bsdp-css" href="{{asset('bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>

@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EDITAR INFORMAÇÃO DO PROFISSIONAL
                    </h2>
                </div>
                <div class="body">
                    <form class="form-material" action="{{route('profissionais.update' , ['id'=>$profissional->id]) }}" method="POST">
                        @csrf
                        @method('put')

                        <label for="nome">Nome</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nome" value="{{$profissional->nome}}" name="nome" class="form-control" placeholder="Digite o nome do profissionao" required>
                            </div>
                            @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>


                        <label for="cns">CNS</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" value="{{$profissional->cns}}" id="cns" name="cns" class="form-control" onkeyup="validar(this,'num');" maxlength="15" placeholder="Digite o número CNS" required>
                            </div>
                            @if ($errors->has('cns'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('cns') }}</strong>
                            </span>
                            @endif
                        </div>


                        <label for="sandbox-container" id="sandbox-container">Data de Atribuição</label>
                        <div id="data_unica" style="display: block;">
                            <div class="form-group">
                                <div class="form-line" id="sandbox-container">
                                    <input type="text" id="sandbox-container" name="data_atribuicao" class="form-control date"  value="{{$profissional->data_atribuicao->format('d/m/Y')}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <!--Script calendário -->
                        <script>
                            $('#sandbox-container input').datepicker({
                                language: 'pt-BR',
                                multidate: false
                            });
                        </script>


                        <label for="data_atribuicao">CH</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" value="{{$profissional->carga_horaria}}" id="carga_horaria" name="carga_horaria" class="form-control" placeholder="Digite a Carga Horária" required>
                            </div>
                            @if ($errors->has('carga_horaria'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('carga_horaria') }}</strong>
                            </span>
                            @endif
                        </div>

                        <label for="sus">SUS?</label>
                        <div class="form-group">
                            <div class="form-line">
                                <div class="switch">
                                    <input name="sus" value="1" type="radio" id="sim" {{$profissional->sus==1?'checked':''}}>
                                    <label for="sim">SIM</label>
                                    <br>
                                    <input name="sus" value="0" type="radio" id="nao" {{$profissional->sus==0?'checked':''}}>
                                    <label for="nao">NÃO</label>
                                </div>
                            </div>
                            @if ($errors->has('sus'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('sus') }}</strong>
                            </span>
                            @endif
                        </div>

                        <label for="cbo_id">CBO</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id="cbo_id"  data-live-search="true" name="cbo_id" required>
                                    <option disabled value="" selected>Selecione um CBO</option>
                                    @foreach($cbos as $cbo)
                                        <option value="{{$cbo->id}}" {{$cbo->id==$profissional->cbo_id?'selected':''}}>{!!$cbo['descricao']!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('cbo_id'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('cbo_id') }}</strong>
                            </span>
                            @endif
                        </div>

                        <label for="tipo_id">Tipo</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id="tipo_id" data-live-search="true" name="tipo_id" required>
                                    <option disabled value="" selected>Selecione um Tipo</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->id}}"  {{$tipo->id==$profissional->tipo_id?'selected':''}}> {!!$tipo['descricao']!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('tipo_id'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('tipo_id') }}</strong>
                            </span>
                            @endif
                        </div>


                        <label for="vinculacao_id">Vinculação</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" id="vinculacao_id" data-live-search="true" name="vinculacao_id" required>
                                    <option disabled value="" selected>Selecione um Vínculo</option>
                                    @foreach($vinculos as $vinculo)
                                        <option value="{{$vinculo->id}}" {{$vinculo->id==$profissional->vinculacao_id?'selected':''}}>{!!$vinculo['descricao']!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('vinculacao_id'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('vinculacao_id') }}</strong>
                            </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">ATUALIZAR</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-extra')

    <script>$('#mdp-demo').multiDatesPicker();</script>

    <script src="{{ asset('js/pages/examples/sign-up.js') }}"></script>

    <script>

        function validar(dom,tipo){
            switch(tipo){
                case'num':var regex=/[A-Za-z]/g;break;
                case'text':var regex=/\d/g;break;
            }
            dom.value=dom.value.replace(regex,'');
        }
    </script>

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


@endsection
