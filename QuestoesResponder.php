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
       data-url="./rules/ListaQuestoesQuestionarioResponder.php?assuntoid=<?php print $_GET["assuntoid"]; ?>&questionarioid=<?php print $_GET["questionarioid"] ?>"
       data-detail-view="true"
       data-detail-formatter="detailListaResposta">
    <thead>
    <tr>
        <th data-field="descricao" data-sortable="true">Questões</th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    $("[data-tipo=ListaQuestoes][data-assunto-id=<?php print $_GET["assuntoid"]; ?>]").bootstrapTable();
    function detailListaResposta(index, row, detail) {
        detail.load('./RespostasResponder.php?questaoid=' + row.id);
    }
</script>
