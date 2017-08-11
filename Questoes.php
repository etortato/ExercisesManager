<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:45
 */

include_once "rules/ValidaLogin.php";
?>
<table data-toggle="table"
       data-tipo="ListaQuestoes"
       data-assunto-id="<?php print $_GET["assuntoid"]; ?>"
       data-url="./rules/ListaQuestoes.php?assuntoid=<?php print $_GET["assuntoid"]; ?>"
       data-query-params="queryParamsQuestoes"
       data-detail-view="true"
       data-detail-formatter="detailListaResposta">
    <thead>
    <tr>
        <th data-field="descricao" data-sortable="true">Questões</th>
        <th data-width="100px" data-align="center" data-field="curtidas" data-sortable="true">Curtidas</th>
        <th data-width="100px" data-align="center" data-sortable="true" data-formatter="formatterQuestoesRespondidas">
            Respondida
        </th>
        <th data-width="100px" data-align="center" data-cell-style="formatterCelulaAcoes"
            data-formatter="formatterQuestoes" data-events="eventsQuestoes">Ações
        </th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaQuestoes][data-assunto-id=<?php print $_GET["assuntoid"]; ?>]").bootstrapTable();
    function queryParamsQuestoes(params) {
        object = {};
        object.txtQuestao = $("#txtQuestao").val();
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function detailListaResposta(index, row, detail) {
        detail.load('./Respostas.php?questaoid=' + row.id);
    }
    function formatterQuestoesRespondidas(value, row, index) {
        if (row.respondida == 0)
            return '<i title="Questão respondida!" class="glyphicon glyphicon-ok"></i>';
        else
            return '<i title="Essa questão ainda não foi respondida!" class="glyphicon glyphicon-asterisk"></i>';
    }
    function formatterQuestoes(value, row, index) {
        ret = '';
        ret = ret + '<i title="Deletar Questão" class="deletaQuestao link-pointer glyphicon glyphicon-trash"></i>';
        ret = ret + '<i data-toggle="modal" title="Editar Questão" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaQuestao" data-questao-id="' + row.id + '" data-questao-descricao="' + row.descricao + '" data-questao-assunto="' + row.idassunto + '"></i>';

        if (row.curtiu == 0)
            ret = ret + '<i data-toggle="modal" title="Descurtir Questão" class="descurtirQuestao link-pointer ml5 glyphicon glyphicon-heart-empty" data-questao-id="' + row.id + '"></i>';
        else
            ret = ret + '<i data-toggle="modal" title="Curtir Questão" class="curtirQuestao link-pointer ml5 glyphicon glyphicon-heart" data-questao-id="' + row.id + '"></i>';

        ret = ret + '<i data-toggle="modal" title="Adicionar Resposta" class="link-pointer ml5 glyphicon glyphicon-plus" data-target="#dialogCadastraResposta" data-questao-id="' + row.id + '"></i>';
        return ret;
    }
    window.eventsQuestoes = {
        'click .deletaQuestao': function (e, value, row, index) {
            if (confirm("Ao deletar uma questão você apagará também todos os registros relacionados a ela. Você tem certeza que gostaria de fazer isso?"))
                $.ajax({
                    url: "./rules/DeletaQuestao.php",
                    method: "POST",
                    data: {questaoid: row.id},
                })
                    .done(function () {
                        $("[data-tipo=ListaQuestoes][data-assunto-id=<?php print $_GET["assuntoid"]; ?>]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Questão deletada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar a questão.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        },
        'click .descurtirQuestao': function (e, value, row, index) {
            $.ajax({
                url: "./rules/DescurtirQuestao.php",
                method: "POST",
                data: {questaoid: row.id},
            })
                .done(function () {
                    $("[data-tipo=ListaQuestoes][data-assunto-id=<?php print $_GET["assuntoid"]; ?>]").bootstrapTable('refresh');
                    new Noty({
                        text: 'Questão descurtida!',
                        type: 'success',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar descurtir a questão.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        },
        'click .curtirQuestao': function (e, value, row, index) {
            $.ajax({
                url: "./rules/CurtirQuestao.php",
                method: "POST",
                data: {questaoid: row.id},
            })
                .done(function () {
                    $("[data-tipo=ListaQuestoes][data-assunto-id=<?php print $_GET["assuntoid"]; ?>]").bootstrapTable('refresh');
                    new Noty({
                        text: 'Questão curtida!',
                        type: 'success',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar curtir a questão.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        }
    }
</script>
