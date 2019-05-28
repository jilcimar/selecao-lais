@extends('layouts.base')
@section('head-extra')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        LISTAGEM DE TODOS OS PROFISSIONAIS DO SISTEMA
                        <a class="btn btn-primary  pull-right enviar_selecionados" title="Deletar selecionados">
                            DELETAR selecionados
                        </a>

                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table  table-striped js-basic-example dataTable" id="tabela_profissionais">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CNS</th>
                                <th>Data de atribuição</th>
                                <th>CH.</th>
                                <th>SUS</th>
                                <th>CBO</th>
                                <th>Tipo</th>
                                <th>Vinculação</th>
                                <th>
                                    Ações
                                </th>
                                <th>
                                    <input type="checkbox" class="selecionar_todos" id="selecionar_todos">
                                    <label for="selecionar_todos" title="Deletar TODOS os selecionados">Todos</label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($profissionais as $profissional)
                                    <tr>
                                        <td>{{$profissional['nome']}}</td>
                                        <td>{{$profissional['cns']}}</td>
                                        <td>{{\Carbon\Carbon::parse($profissional['data_atribuicao'])->format('d/m/Y')}}</td>
                                        <td>{{$profissional['carga_horaria']}}</td>
                                        <td> @if($profissional['sus']==1) SIM @else NÃO @endif </td>
                                        <td>{{$profissional['cbo']['codigo']}}</td>
                                        <td>{{$profissional['tipo']['descricao']}}</td>
                                        <td>{{$profissional['vinculacao']['descricao']}}</td>
                                        <td>
                                            <div class="table-options">
                                                <a class='linkbtn' href="{{route('profissionais.edit', ['id'=> $profissional['id']])}}"
                                                   title="Ver Profissional">
                                                    <i class="material-icons">search</i>
                                                </a>

                                                <a class='linkbtn' href="{{route('profissionais.edit', ['id'=> $profissional['id']])}}"
                                                   title="Editar Profissional">
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                {{--<a title="Deletar Profissional" class="waves-effect waves-block linkbtn destroy_profissional" data-profissional="{{$profissional['id']}}" type="submit">--}}
                                                    {{--<i class="material-icons">delete</i>--}}
                                                {{--</a>--}}
                                                {{--{!! Form::open(['id' => 'form-delete-profissional-' . $profissional['id'], 'route' => array('profissionais.destroy', $profissional['id']), 'method' => 'DELETE']) !!}--}}
                                                {{--{!! Form::close() !!}--}}
                                            </div>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="profissionais" value="{{$profissional['id']}}" id="{{$profissional['id']}}">
                                            <label for="{{$profissional['id']}}"></label>
                                        </td>
                                @empty
                                        <td colspan="10" style="text-align: center">Sem itens</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-extra')

    <script type="text/javascript">
        $('.selecionar_todos').change(function () {
            if ($(this).is(':checked')) {
                $("INPUT[type='checkbox']").prop('checked', true);
            }
            else
            {
                $("INPUT[type='checkbox']").prop('checked', false);
            }
        });
    </script>

    <script>
        $('.enviar_selecionados').click(function (e) {

            var arr = [];
            $("input:checkbox[name=profissionais]:checked").each(function(){
                arr.push($(this).val());
            });

            e.preventDefault();
            if (arr.length>0)
            {
                swal({
                    title: "Excluír Profissionais?",
                    text: "Você tem certeza que deseja excluir os profissionais selecionados? não será possível recuperar os dados!",
                    icon: "warning",
                    dangerMode: true,
                    closeModal: false,
                    closeOnCancel: true,
                    buttons: ["Não, cancele", "Sim, delete!"],
                }) .then((willDelete) => {
                    if (willDelete) {
                        console.log(arr);
                        $.ajax({
                            type: 'POST',
                            contentType: 'application/json',
                            url: 'api/v0/profissionais/delete/all',
                            data: JSON.stringify({ profissionais: arr}),
                            success: function(data)
                            {
                                console.log(data);
                                location.reload();
                            }
                        });
                    }
                });
            }

        });

        $('.destroy_profissional').click(function (e) {
            e.preventDefault();
            let id = $(this).data('profissional');
            let $form = $('#form-delete-profissional-' + id);
            swal({
                    title: "Excluír Profissional?",
                    text: "Você tem certeza que deseja excluir esse profissional? não será possível recuperar os dados!",
                    icon: "warning",
                    dangerMode: true,
                    closeModal: false,
                    closeOnCancel: true,
                    buttons: ["Não, cancele", "Sim, delete!"],
                }) .then((willDelete) => {
                if (willDelete) {
                    $form.submit();
                }
            });

        });
    </script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Page Js -->
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
