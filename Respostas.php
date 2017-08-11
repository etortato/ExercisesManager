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
       data-tipo="ListaRespostas"
       data-questao-id="<?php print $_GET["questaoid"]; ?>"
       data-url="./rules/ListaRespostas.php?questaoid=<?php print $_GET["questaoid"]; ?>">
    <thead>
    <tr>
        <th data-width="30px" data-formatter="formatterRespondeRespostas"></th>
        <th data-field="descricao" data-sortable="true">Respostas</th>
        <th data-width="50px" data-align="center" data-cell-style="formatterCelulaAcoes"
            data-formatter="formatterRespostas" data-events="eventsRespostas">Ações
        </th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaRespostas][data-questao-id=<?php print $_GET["questaoid"]; ?>]").bootstrapTable(
        {
            onPostBody: function(data) {
                $('[type=radio][name=radioRespostasQuestao<?php print $_GET["questaoid"]; ?>]').click(function() {
                    $.ajax({
                        url: "./rules/RespondeResposta.php",
                        method: "POST",
                        data: {
                            respostaid: $(this).data("resposta-id"),
                            questaoid: <?php print $_GET["questaoid"]; ?>
                        },
                    })
                        .done(function () {
                            new Noty({
                                text: 'Resposta correta atualizada!',
                                type: 'success',
                                timeout: 4000,
                                closeWith: ['click', 'button'],
                            }).show();
                        })
                        .fail(function () {
                            new Noty({
                                text: 'Ocorreu um erro ao tentar atualizar a resposta correta.',
                                type: 'error',
                                timeout: 4000,
                                closeWith: ['click', 'button'],
                            }).show();
                        });
                });
            }
        }
    );
    function formatterRespondeRespostas(value, row, index) {
        ret = '<input data-resposta-id=';
        ret = ret +  row.id;
        ret = ret + ' name="radioRespostasQuestao';
        ret = ret +  row.idquestao;
        ret = ret + '" type="radio"';
        if (row.correta == "1")
            ret = ret + ' checked="checked"';
        ret = ret + '>';
        return ret;
    }
    function formatterRespostas(value, row, index) {
        return '<i title="Deletar Resposta" class="deletaResposta link-pointer glyphicon glyphicon-trash"></i>' +
            '<i data-toggle="modal" title="Editar Resposta" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaResposta" data-resposta-id="' + row.id + '" data-resposta-descricao="' + row.descricao + '" data-resposta-questao="' + row.idquestao + '"></i>'
    }
    window.eventsRespostas = {
        'click .deletaResposta': function (e, value, row, index) {
            if (confirm("Você tem certeza que gostaria de deletar essa resposta?"))
                $.ajax({
                    url: "./rules/DeletaResposta.php",
                    method: "POST",
                    data: {respostaid: row.id},
                })
                    .done(function () {
                        $("[data-tipo=ListaRespostas][data-questao-id=<?php print $_GET["questaoid"]; ?>]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Resposta deletada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar a resposta.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
</script>
