<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 19/04/2017
 * Time: 19:45
 */

include_once "rules/ValidaLogin.php";

if(!isset($_SESSION)) {
    session_start();
}
?>
<table data-toggle="table"
       data-tipo="ListaRespostas"
       data-questao-id="<?php print $_GET["questaoid"]; ?>"
       data-url="./rules/ListaRespostasQuestionarioResponder.php?questaoid=<?php print $_GET["questaoid"]; ?>">
    <thead>
    <tr>
        <th data-width="30px" data-formatter="formatterRespondeRespostas"></th>
        <th data-field="descricao" data-sortable="true">Respostas</th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaRespostas][data-questao-id=<?php print $_GET["questaoid"]; ?>]").bootstrapTable(
        {
            onPostBody: function(data) {
                $('[type=radio][name=radioRespostasQuestao<?php print $_GET["questaoid"]; ?>]').click(function() {
                    $.ajax({
                        url: "./rules/RespondeRespostaQuestionarioResponder.php",
                        method: "POST",
                        data: {
                            respostaid: $(this).data("resposta-id"),
                            questaoid: <?php print $_GET["questaoid"]; ?>
                        },
                    })
                        .done(function () {
                            new Noty({
                                text: 'Resposta registrada!',
                                type: 'success',
                                timeout: 4000,
                                closeWith: ['click', 'button'],
                            }).show();
                        })
                        .fail(function () {
                            new Noty({
                                text: 'Ocorreu um erro ao tentar registrar sua resposta.',
                                type: 'error',
                                timeout: 4000,
                                closeWith: ['click', 'button'],
                            }).show();
                        });
                });
            }
        }
    );
    respondidas = null;
    $.ajax({
        url:"./rules/ListaRespostasRespondidas.php",
        method:"POST",
        async: false
    })
        .done(function (data) {
            respondidas = $.parseJSON(data);
        });
    function formatterRespondeRespostas(value, row, index) {
        if (respondidas != null) {
            console.log(respondidas);
            console.log('Já respondido: ' + respondidas[row.idquestao]);
            console.log('Atual: ' + row.id);
        }
        ret = '<input data-resposta-id=';
        ret = ret +  row.id;
        ret = ret + ' name="radioRespostasQuestao';
        ret = ret +  row.idquestao;
        ret = ret + '" type="radio"';
        if (respondidas != null && respondidas[row.idquestao] == row.id)
            ret = ret + ' checked="checked"';
        ret = ret + '>';
        return ret;
    }
</script>
