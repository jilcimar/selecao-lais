@extends('layouts.base')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Detalhes do Profissional
                    <small>Cadastrado em {{$profissional->created_at->format('d/m/Y')}} às {{$profissional->created_at->format('H:i')}} </small>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <!--INFORMAÇÕES DA PROFISSIONAL -->
                    <div class="col-md-6">
                        <label>Nome</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">person</i>
                                {{$profissional->nome}}
                            </div>
                        </div>
                        <label>CNS</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">domain</i>
                                {{$profissional->cns}}
                            </div>
                        </div>
                        <label>Data de Atribuição</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">date_range</i>
                                {{$profissional->data_atribuicao->format('d/m/Y')}}
                            </div>
                        </div>
                        <label>Carga Horária Total</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">access_time</i>
                                {{$profissional->carga_horaria}} Hs
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <label>SUS ?</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">healing</i>
                                @if($profissional->sus)
                                    SIM
                                @else
                                    NÃO
                                @endif

                            </div>
                        </div>

                        <label>CBO</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">label_outline</i>
                                {{$profissional->cbo->descricao}}
                            </div>
                        </div>

                        <label>Tipo (Vínculo Empregatício)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">description</i>
                                {{$profissional->tipo->descricao}}
                            </div>
                        </div>

                        <label>Vinculação (Vínculo Empregatício)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <i class="material-icons">done</i>
                                {{$profissional->vinculacao->descricao}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection