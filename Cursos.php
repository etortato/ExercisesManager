<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 18/04/2017
 * Time: 20:04
 */

include_once "rules/ValidaLogin.php";
?>
<div id="dialogCadastraCurso" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Cursos</h4>
            </div>
            <form id="formCadastraCurso">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroCurso">
                        Curso:
                    </label>
                    <input type="text" class="form-control" title="Nome do curso."
                           placeholder="Nome do curso" name="txtCadastroCurso" id="txtCadastroCurso"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormCadastraCurso">
                    <div id="alertCadastraCurso" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraCursoErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraCurso()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaCurso" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Cursos</h4>
            </div>
            <form id="formEditaCurso">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtEditaCurso">
                        Curso:
                    </label>
                    <input type="hidden" name="hdnEditaCurso" id="hdnEditaCurso">
                    <input type="text" class="form-control" title="Nome do curso."
                           placeholder="Nome do curso" name="txtEditaCurso" id="txtEditaCurso"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaCurso">
                    <div id="alertEditaCurso" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaCursoErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaCurso()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogCadastraDisciplina" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Disciplinas</h4>
            </div>
            <form id="formCadastraDisciplina">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroDisciplina">
                        Disciplina:
                    </label>
                    <input type="text" class="form-control" title="Nome da Disciplina."
                           placeholder="Nome da Disciplina" name="txtCadastroDisciplina" id="txtCadastroDisciplina"
                           required="required">
                    <input type="hidden" id="hdnCadastraDisciplina">
                    <input type="submit" class="hidden" id="btnFormCadastraDisciplina">
                    <div id="alertCadastraDisciplina" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraDisciplinaErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraDisciplina()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaDisciplina" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Disciplinas</h4>
            </div>
            <form id="formEditaDisciplina">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtEditaDisciplina">
                        Disciplina:
                    </label>
                    <input type="hidden" name="hdnEditaDisciplina" id="hdnEditaDisciplina">
                    <input type="hidden" name="hdnEditaDisciplinaCurso" id="hdnEditaDisciplinaCurso">
                    <input type="text" class="form-control" title="Nome da disciplina."
                           placeholder="Nome da disciplina" name="txtEditaDisciplina" id="txtEditaDisciplina"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaDisciplina">
                    <div id="alertEditaDisciplina" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaDisciplinaErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaDisciplina()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogCadastraAssunto" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Assuntos</h4>
            </div>
            <form id="formCadastraAssunto">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroAssunto">
                        Assunto:
                    </label>
                    <input type="text" class="form-control" title="Nome do Assunto."
                           placeholder="Nome do Assunto" name="txtCadastroAssunto" id="txtCadastroAssunto"
                           required="required">
                    <input type="hidden" id="hdnCadastraAssunto">
                    <input type="submit" class="hidden" id="btnFormCadastraAssunto">
                    <div id="alertCadastraAssunto" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraAssuntoErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraAssunto()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaAssunto" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Assuntos</h4>
            </div>
            <form id="formEditaAssunto">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtEditaAssunto">
                        Assunto:
                    </label>
                    <input type="hidden" name="hdnEditaAssunto" id="hdnEditaAssunto">
                    <input type="hidden" name="hdnEditaAssuntoDisciplina" id="hdnEditaAssuntoDisciplina">
                    <input type="text" class="form-control" title="Nome do assunto."
                           placeholder="Nome do assunto" name="txtEditaAssunto" id="txtEditaAssunto"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaAssunto">
                    <div id="alertEditaAssunto" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaAssuntoErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaAssunto()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogCadastraQuestao" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Questões</h4>
            </div>
            <form id="formCadastraQuestao">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroQuestao">
                        Questão:
                    </label>
                    <input type="text" class="form-control" title="Descrição da Questão."
                           placeholder="Descrição da Questão" name="txtCadastroQuestao" id="txtCadastroQuestao"
                           required="required">
                    <input type="hidden" id="hdnCadastraQuestao">
                    <input type="submit" class="hidden" id="btnFormCadastraQuestao">
                    <div id="alertCadastraQuestao" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraQuestaoErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraQuestao()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaQuestao" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Questões</h4>
            </div>
            <form id="formEditaQuestao">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtEditaQuestao">
                        Questão:
                    </label>
                    <input type="hidden" name="hdnEditaQuestao" id="hdnEditaQuestao">
                    <input type="hidden" name="hdnEditaQuestaoAssunto" id="hdnEditaQuestaoAssunto">
                    <input type="text" class="form-control" title="Descrição da questão."
                           placeholder="Descrição da questão" name="txtEditaQuestao" id="txtEditaQuestao"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaQuestao">
                    <div id="alertEditaQuestao" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaQuestaoErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaQuestao()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogCadastraResposta" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Respostas</h4>
            </div>
            <form id="formCadastraResposta">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroResposta">
                        Resposta:
                    </label>
                    <input type="text" class="form-control" title="Descrição da Resposta."
                           placeholder="Descrição da Resposta" name="txtCadastroResposta" id="txtCadastroResposta"
                           required="required">
                    <input type="hidden" id="hdnCadastraResposta">
                    <input type="submit" class="hidden" id="btnFormCadastraResposta">
                    <div id="alertCadastraResposta" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraRespostaErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraResposta()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaResposta" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Respostas</h4>
            </div>
            <form id="formEditaResposta">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtEditaResposta">
                        Resposta:
                    </label>
                    <input type="hidden" name="hdnEditaResposta" id="hdnEditaResposta">
                    <input type="hidden" name="hdnEditaRespostaQuestao" id="hdnEditaRespostaQuestao">
                    <input type="text" class="form-control" title="Descrição da resposta."
                           placeholder="Descrição da resposta" name="txtEditaResposta" id="txtEditaResposta"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaResposta">
                    <div id="alertEditaResposta" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaRespostaErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaResposta()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogCadastraQuestionario" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Questionários</h4>
            </div>
            <form id="formCadastraQuestionario">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroQuestionario">
                        Questionário:
                    </label>
                    <input type="text" class="form-control" title="Descrição do Questionário."
                           placeholder="Descrição do Questionário" name="txtCadastroQuestionario"
                           id="txtCadastroQuestionario"
                           required="required">
                    <input type="hidden" id="hdnCadastraQuestionario">
                    <input type="submit" class="hidden" id="btnFormCadastraQuestionario">
                    <div id="alertCadastraQuestionario" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraQuestionarioErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraQuestionario()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaQuestionario" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Questionários</h4>
            </div>
            <form id="formEditaQuestionario">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtEditaQuestionario">
                        Questionário:
                    </label>
                    <input type="hidden" name="hdnEditaQuestionario" id="hdnEditaQuestionario">
                    <input type="hidden" name="hdnEditaQuestionarioDisciplina" id="hdnEditaQuestionarioDisciplina">
                    <input type="text" class="form-control" title="Nome do questionário."
                           placeholder="Nome do questionário" name="txtEditaQuestionario" id="txtEditaQuestionario"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaQuestionario">
                    <div id="alertEditaQuestionario" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaQuestionarioErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaQuestionario()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogIncluirQuestao" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Questão</h4>
            </div>
            <input type="hidden" name="hdnIncluirQuestaoDisciplina" id="hdnIncluirQuestaoDisciplina">
            <input type="hidden" name="hdnIncluirQuestaoQuestionario" id="hdnIncluirQuestaoQuestionario">
            <div class="modal-body">
                <div class="row jumbotron"
                     style="margin-top: -15px; margin-bottom: 15px; padding-top: 15px; padding-bottom: 15px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-right" for="txtIncluirQuestaoAssunto">
                                Assunto:
                            </label>
                            <input type="text" class="form-control" title="Filtre pelo assunto da questão."
                                   placeholder="Filtro pelo assunto da questão" name="txtIncluirQuestaoAssunto"
                                   id="txtIncluirQuestaoAssunto">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-right" for="txtIncluirQuestaoQuestao">
                                Questão:
                            </label>
                            <input type="text" class="form-control" title="Filtre pela questão."
                                   placeholder="Filtro pela questão" name="txtIncluirQuestaoQuestao"
                                   id="txtIncluirQuestaoQuestao">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="btn btn-lg btn-default pull-left" onclick="filtrarIncluirQuestaoQuestoes()">
                            FILTRAR
                        </div>
                    </div>
                </div>
                <div id="alertIncluirQuestao" class="alert alert-warning alert-dismissible"
                     style="margin: 10px; display: none">
                    <div class="close" data-dismiss="alert">x</div>
                    <span id="dialogIncluirQuestaoErro"></span>
                </div>
                <table id="tableListaQuestoesIncluirQuestionario"
                       data-toggle="table"
                       data-url="./rules/ListaIncluirQuestao.php"
                       data-query-params="queryParamsQuestoesIncluirQuestionario">
                    <thead>
                    <tr>
                        <th data-radio="true"></th>
                        <th data-field="assuntoNome" data-sortable="true">Assunto</th>
                        <th data-field="questaoDescricao" data-sortable="true">Questão</th>
                        <th data-field="curtidas" data-width="100px" data-align="center" data-sortable="true">Curtidas
                        </th>
                        <th data-field="respondida" data-width="100px" data-align="center"
                            data-formatter="formatterIncluirQuestoesRespondidas" data-sortable="true">Respondida
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary disabled" name="btnIncluirQuestaoQuestionario"
                        id="btnIncluirQuestaoQuestionario" onclick="incluirQuestaoQuestionario()">Incluir
                </button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table id="tableListaCursos"
           data-toggle="table"
           data-url="./rules/ListaCursos.php"
           data-detail-view="true"
           data-query-params="queryParamsCursos"
           data-detail-formatter="detailListaDisciplina">
        <thead>
        <tr>
            <th data-field="nome" data-sortable="true">Curso</th>
            <th data-width="80px" data-align="center" data-cell-style="formatterCelulaAcoes"
                data-formatter="formatterCursos" data-events="eventsCurso">Ações
            </th>
        </tr>
        </thead>
    </table>
</div>
<script type="text/javascript">
    function filtrarQuestoes() {
        $("#tableListaCursos").bootstrapTable('refresh');
    }
    function filtrarIncluirQuestaoQuestoes() {
        $("#tableListaQuestoesIncluirQuestionario").bootstrapTable('refresh');
        $("#tableListaQuestoesIncluirQuestionario").on('check.bs.table', function (row, e) {
            $("#btnIncluirQuestaoQuestionario").removeClass("disabled")
        });
    }
    function incluirQuestaoQuestionario() {
        var selecao = $("#tableListaQuestoesIncluirQuestionario").bootstrapTable('getSelections');
        if (selecao.length != 0) {
            $.ajax({
                url: "./rules/IncluirQuestaoQuestionario.php",
                method: "POST",
                data: {
                    questaoid: selecao[0].questaoid,
                    questionarioid: selecao[0].questionarioid
                },
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogIncluirQuestaoErro").html(data.erro);
                        $("#alertIncluirQuestao").show();
                    } else {
                        $("#dialogIncluirQuestao").modal('hide');
                        $("[data-tipo=ListaQuestoesQuestionario][data-questionario-id=" + data.questionarioid + "]").bootstrapTable('refresh');
                        new Noty({
                            text: 'Questão inserida no questionário!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar incluir a questão.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        }
    }
    function queryParamsCursos(params) {
        object = {};
        object.txtCurso = $("#txtCurso").val();
        object.txtAssunto = $("#txtAssunto").val();
        object.txtDisciplina = $("#txtDisciplina").val();
        object.txtQuestao = $("#txtQuestao").val();
        if ($("#txtQuestionario").length != 0)
            object.txtQuestionario = $("#txtQuestionario").val();
        else
            object.txtQuestionario = "";
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function queryParamsQuestoesIncluirQuestionario(params) {
        object = {};
        object.txtIncluirQuestaoAssunto = $("#txtIncluirQuestaoAssunto").val();
        object.txtIncluirQuestaoQuestao = $("#txtIncluirQuestaoQuestao").val();
        object.hdnIncluirQuestaoDisciplina = $("#hdnIncluirQuestaoDisciplina").val();
        object.hdnIncluirQuestaoQuestionario = $("#hdnIncluirQuestaoQuestionario").val();
        if (params != undefined) {
            object.order = params.order;
            object.limit = params.limit;
            object.offset = params.offset;
            object.sort = params.sort;
        }
        return object;
    }
    function cadastraCurso() {
        if ($('#txtCadastroCurso')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraCurso.php",
                method: "POST",
                data: {txtCadastroCurso: $("#txtCadastroCurso").val()}
            })
                .done(function (data) {
                    if (data != "") {
                        data = $.parseJSON(data);
                        $("#dialogCadastraCursoErro").html(data.erro);
                        $("#alertCadastraCurso").show();
                    } else {
                        $("#tableListaCursos").bootstrapTable('refresh');
                        $("#txtCadastroCurso").val("");
                        $("#dialogCadastraCurso").modal('hide');
                        new Noty({
                            text: 'Curso cadastrado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar o curso.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraCurso").click();
    }
    function editaCurso() {
        if ($('#txtEditaCurso')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaCurso.php",
                method: "POST",
                data: {
                    txtEditaCurso: $("#txtEditaCurso").val(),
                    hdnEditaCurso: $("#hdnEditaCurso").val()
                }
            })
                .done(function (data) {
                    if (data != "") {
                        data = $.parseJSON(data);
                        $("#dialogEditaCursoErro").html(data.erro);
                        $("#alertEditaCurso").show();
                    } else {
                        $("#tableListaCursos").bootstrapTable('refresh');
                        $("#txtEditaCurso").val("");
                        $("#hdnEditaCurso").val("");
                        $("#dialogEditaCurso").modal('hide');
                        new Noty({
                            text: 'Curso editado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar o curso.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaCurso").click();
    }
    function cadastraDisciplina() {
        if ($('#txtCadastroDisciplina')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraDisciplina.php",
                method: "POST",
                data: {
                    txtCadastroDisciplina: $("#txtCadastroDisciplina").val(),
                    hdnCadastraDisciplina: $("#hdnCadastraDisciplina").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogCadastraDisciplinaErro").html(data.erro);
                        $("#alertCadastraDisciplina").show();
                    } else {
                        $("[data-tipo=ListaDisciplinas][data-curso-id=" + data.cursoid + "]").bootstrapTable('refresh');
                        $("#txtCadastroDisciplina").val("");
                        $("#hdnCadastraDisciplina").val("");
                        $("#dialogCadastraDisciplina").modal('hide');
                        new Noty({
                            text: 'Disciplina cadastrada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar a disciplina.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraDisciplina").click();
    }
    function editaDisciplina() {
        if ($('#txtEditaDisciplina')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaDisciplina.php",
                method: "POST",
                data: {
                    txtEditaDisciplina: $("#txtEditaDisciplina").val(),
                    hdnEditaDisciplina: $("#hdnEditaDisciplina").val(),
                    hdnEditaDisciplinaCurso: $("#hdnEditaDisciplinaCurso").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogEditaDisciplinaErro").html(data.erro);
                        $("#alertEditaDisciplina").show();
                    } else {
                        $("[data-tipo=ListaDisciplinas][data-curso-id=" + data.cursoid + "]").bootstrapTable('refresh');
                        $("#txtEditaDisciplina").val("");
                        $("#hdnEditaDisciplina").val("");
                        $("#hdnEditaDisciplinaCurso").val("");
                        $("#dialogEditaDisciplina").modal('hide');
                        new Noty({
                            text: 'Disciplina editada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar a disciplina.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaDisciplina").click();
    }
    function cadastraAssunto() {
        if ($('#txtCadastroAssunto')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraAssunto.php",
                method: "POST",
                data: {
                    txtCadastroAssunto: $("#txtCadastroAssunto").val(),
                    hdnCadastraAssunto: $("#hdnCadastraAssunto").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogCadastraAssuntoErro").html(data.erro);
                        $("#alertCadastraAssunto").show();
                    } else {
                        $("[data-tipo=ListaAssuntos][data-disciplina-id=" + data.disciplinaid + "]").bootstrapTable('refresh');
                        $("#txtCadastroAssunto").val("");
                        $("#hdnCadastraAssunto").val("");
                        $("#dialogCadastraAssunto").modal('hide');
                        new Noty({
                            text: 'Assunto cadastrado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar o assunto.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraAssunto").click();
    }
    function editaAssunto() {
        if ($('#txtEditaAssunto')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaAssunto.php",
                method: "POST",
                data: {
                    txtEditaAssunto: $("#txtEditaAssunto").val(),
                    hdnEditaAssunto: $("#hdnEditaAssunto").val(),
                    hdnEditaAssuntoDisciplina: $("#hdnEditaAssuntoDisciplina").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogEditaAssuntoErro").html(data.erro);
                        $("#alertEditaAssunto").show();
                    } else {
                        $("[data-tipo=ListaAssuntos][data-disciplina-id=" + data.disciplinaid + "]").bootstrapTable('refresh');
                        $("#txtEditaAssunto").val("");
                        $("#hdnEditaAssunto").val("");
                        $("#hdnEditaAssuntoDisciplina").val("");
                        $("#dialogEditaAssunto").modal('hide');
                        new Noty({
                            text: 'Assunto editado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar a assunto.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaAssunto").click();
    }
    function cadastraQuestao() {
        if ($('#txtCadastroQuestao')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraQuestao.php",
                method: "POST",
                data: {
                    txtCadastroQuestao: $("#txtCadastroQuestao").val(),
                    hdnCadastraQuestao: $("#hdnCadastraQuestao").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogCadastraQuestaoErro").html(data.erro);
                        $("#alertCadastraQuestao").show();
                    } else {
                        $("[data-tipo=ListaQuestoes][data-assunto-id=" + data.assuntoid + "]").bootstrapTable('refresh');
                        $("#txtCadastroQuestao").val("");
                        $("#hdnCadastraQuestao").val("");
                        $("#dialogCadastraQuestao").modal('hide');
                        new Noty({
                            text: 'Questão cadastrada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar a questão.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraQuestao").click();
    }
    function editaQuestao() {
        if ($('#txtEditaQuestao')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaQuestao.php",
                method: "POST",
                data: {
                    txtEditaQuestao: $("#txtEditaQuestao").val(),
                    hdnEditaQuestao: $("#hdnEditaQuestao").val(),
                    hdnEditaQuestaoAssunto: $("#hdnEditaQuestaoAssunto").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogEditaQuestaoErro").html(data.erro);
                        $("#alertEditaQuestao").show();
                    } else {
                        $("[data-tipo=ListaQuestoes][data-assunto-id=" + data.assuntoid + "]").bootstrapTable('refresh');
                        $("#txtEditaQuestao").val("");
                        $("#hdnEditaQuestao").val("");
                        $("#hdnEditaQuestaoAssunto").val("");
                        $("#dialogEditaQuestao").modal('hide');
                        new Noty({
                            text: 'Questão editada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar a questão.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaQuestao").click();
    }
    function cadastraResposta() {
        if ($('#txtCadastroResposta')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraResposta.php",
                method: "POST",
                data: {
                    txtCadastroResposta: $("#txtCadastroResposta").val(),
                    hdnCadastraResposta: $("#hdnCadastraResposta").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogCadastraRespostaErro").html(data.erro);
                        $("#alertCadastraResposta").show();
                    } else {
                        $("[data-tipo=ListaRespostas][data-questao-id=" + data.questaoid + "]").bootstrapTable('refresh');
                        $("#txtCadastroResposta").val("");
                        $("#hdnCadastraResposta").val("");
                        $("#dialogCadastraResposta").modal('hide');
                        new Noty({
                            text: 'Resposta cadastrada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar a resposta.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraResposta").click();
    }
    function editaResposta() {
        if ($('#txtEditaResposta')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaResposta.php",
                method: "POST",
                data: {
                    txtEditaResposta: $("#txtEditaResposta").val(),
                    hdnEditaResposta: $("#hdnEditaResposta").val(),
                    hdnEditaRespostaQuestao: $("#hdnEditaRespostaQuestao").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogEditaRespostaErro").html(data.erro);
                        $("#alertEditaResposta").show();
                    } else {
                        $("[data-tipo=ListaRespostas][data-questao-id=" + data.questaoid + "]").bootstrapTable('refresh');
                        $("#txtEditaResposta").val("");
                        $("#hdnEditaResposta").val("");
                        $("#hdnEditaRespostaQuestao").val("");
                        $("#dialogEditaResposta").modal('hide');
                        new Noty({
                            text: 'Resposta editada!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar a resposta.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaResposta").click();
    }
    function cadastraQuestionario() {
        if ($('#txtCadastroQuestionario')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraQuestionario.php",
                method: "POST",
                data: {
                    txtCadastroQuestionario: $("#txtCadastroQuestionario").val(),
                    hdnCadastraQuestionario: $("#hdnCadastraQuestionario").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogCadastraQuestionarioErro").html(data.erro);
                        $("#alertCadastraQuestionario").show();
                    } else {
                        $("[data-tipo=ListaQuestionarios][data-disciplina-id=" + data.disciplinaid + "]").bootstrapTable('refresh');
                        $("#txtCadastroQuestionario").val("");
                        $("#hdnCadastraQuestionario").val("");
                        $("#dialogCadastraQuestionario").modal('hide');
                        new Noty({
                            text: 'Questionário cadastrado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar o questionário.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraQuestionario").click();
    }
    function editaQuestionario() {
        if ($('#txtEditaQuestionario')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaQuestionario.php",
                method: "POST",
                data: {
                    txtEditaQuestionario: $("#txtEditaQuestionario").val(),
                    hdnEditaQuestionario: $("#hdnEditaQuestionario").val(),
                    hdnEditaQuestionarioDisciplina: $("#hdnEditaQuestionarioDisciplina").val()
                }
            })
                .done(function (data) {
                    data = $.parseJSON(data);
                    if (data.erro != null && data.erro != "") {
                        $("#dialogEditaQuestionarioErro").html(data.erro);
                        $("#alertEditaQuestionario").show();
                    } else {
                        $("[data-tipo=ListaQuestionarios][data-disciplina-id=" + data.disciplinaid + "]").bootstrapTable('refresh');
                        $("#txtEditaQuestionario").val("");
                        $("#hdnEditaQuestionario").val("");
                        $("#hdnEditaQuestionarioDisciplina").val("");
                        $("#dialogEditaQuestionario").modal('hide');
                        new Noty({
                            text: 'Questionário editado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar o questionário.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaQuestionario").click();
    }
    function detailListaDisciplina(index, row, detail) {
        detail.load('./Disciplinas.php?cursoid=' + row.id);
    }
    function formatterCursos(value, row, index) {
        return '<i title="Deletar Curso" class="deletaCurso link-pointer glyphicon glyphicon-trash"></i>' +
            '<i data-toggle="modal" title="Editar Curso" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaCurso" data-curso-id="' + row.id + '" data-curso-nome="' + row.nome + '"></i>' +
            '<i data-toggle="modal" title="Adicionar Disciplina" class="link-pointer ml5 glyphicon glyphicon-plus" data-target="#dialogCadastraDisciplina" data-curso-id="' + row.id + '"></i>';
    }
    function formatterIncluirQuestoesRespondidas(value, row, index) {
        if (row.respondida == 0)
            return '<i title="Questão respondida!" class="glyphicon glyphicon-ok"></i>';
        else
            return '<i title="Essa questão ainda não foi respondida!" class="glyphicon glyphicon-asterisk"></i>';
    }
    window.eventsCurso = {
        'click .deletaCurso': function (e, value, row, index) {
            if (confirm("Ao deletar um curso você apagará também todos os registros relacionados a ele. Você tem certeza que gostaria de fazer isso?"))
                $.ajax({
                    url: "./rules/DeletaCurso.php",
                    method: "POST",
                    data: {cursoid: row.id},
                })
                    .done(function () {
                        $("#tableListaCursos").bootstrapTable('refresh');
                        new Noty({
                            text: 'Curso deletado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar o curso.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
    $('#dialogEditaCurso').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaCurso").val($(event.relatedTarget).data("curso-id"));
        $(this).find("#txtEditaCurso").val($(event.relatedTarget).data("curso-nome"));
    });
    $('#dialogCadastraDisciplina').on('show.bs.modal', function (event) {
        $(this).find("#hdnCadastraDisciplina").val($(event.relatedTarget).data("curso-id"));
    });
    $('#dialogEditaDisciplina').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaDisciplina").val($(event.relatedTarget).data("disciplina-id"));
        $(this).find("#txtEditaDisciplina").val($(event.relatedTarget).data("disciplina-nome"));
        $(this).find("#hdnEditaDisciplinaCurso").val($(event.relatedTarget).data("disciplina-curso"));
    });
    $('#dialogCadastraAssunto').on('show.bs.modal', function (event) {
        $(this).find("#hdnCadastraAssunto").val($(event.relatedTarget).data("disciplina-id"));
    });
    $('#dialogEditaAssunto').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaAssunto").val($(event.relatedTarget).data("assunto-id"));
        $(this).find("#txtEditaAssunto").val($(event.relatedTarget).data("assunto-nome"));
        $(this).find("#hdnEditaAssuntoDisciplina").val($(event.relatedTarget).data("assunto-disciplina"));
    });
    $('#dialogCadastraQuestao').on('show.bs.modal', function (event) {
        $(this).find("#hdnCadastraQuestao").val($(event.relatedTarget).data("assunto-id"));
    });
    $('#dialogEditaQuestao').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaQuestao").val($(event.relatedTarget).data("disciplina-id"));
        $(this).find("#txtEditaQuestao").val($(event.relatedTarget).data("disciplina-descricao"));
        $(this).find("#hdnEditaQuestaoAssunto").val($(event.relatedTarget).data("disciplina-assunto"));
    });
    $('#dialogCadastraResposta').on('show.bs.modal', function (event) {
        $(this).find("#hdnCadastraResposta").val($(event.relatedTarget).data("questao-id"));
    });
    $('#dialogEditaResposta').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaResposta").val($(event.relatedTarget).data("resposta-id"));
        $(this).find("#txtEditaResposta").val($(event.relatedTarget).data("resposta-descricao"));
        $(this).find("#hdnEditaRespostaQuestao").val($(event.relatedTarget).data("resposta-questao"));
    });
    $('#dialogCadastraQuestionario').on('show.bs.modal', function (event) {
        $(this).find("#hdnCadastraQuestionario").val($(event.relatedTarget).data("disciplina-id"));
    });
    $('#dialogEditaQuestionario').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaQuestionario").val($(event.relatedTarget).data("questionario-id"));
        $(this).find("#txtEditaQuestionario").val($(event.relatedTarget).data("questionario-nome"));
        $(this).find("#hdnEditaQuestionarioDisciplina").val($(event.relatedTarget).data("questionario-disciplina"));
    });
    $('#dialogIncluirQuestao').on('show.bs.modal', function (event) {
        $(this).find("#hdnIncluirQuestaoDisciplina").val($(event.relatedTarget).data("questionario-disciplina"));
        $(this).find("#hdnIncluirQuestaoQuestionario").val($(event.relatedTarget).data("questionario-id"));
        filtrarIncluirQuestaoQuestoes();
    });
</script>
