<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 18/04/2017
 * Time: 20:04
 */

include_once "rules/ValidaLogin.php";
?>
<div id="dialogCadastraProfessor" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Cadastro de Professores</h4>
            </div>
            <form id="formCadastraProfessor">
                <div class="modal-body form-group">
                    <label class="text-right" for="txtCadastroProfessorNome">
                        Nome:
                    </label>
                    <input type="text" class="form-control" title="Nome do professor."
                           placeholder="Nome do professor" name="txtCadastroProfessorNome" id="txtCadastroProfessorNome"
                           required="required">
                    <label class="text-right" for="txtCadastroProfessorLogin">
                        Login:
                    </label>
                    <input type="text" class="form-control" title="Login do professor, no máximo 10 caracteres."
                           placeholder="Login do professor" name="txtCadastroProfessorLogin" id="txtCadastroProfessorLogin"
                           required="required">
                    <label class="text-right" for="txtCadastroProfessorSenha">
                        Senha:
                    </label>
                    <input type="password" class="form-control" title="Senha do professor, no máximo 10 caracteres."
                           placeholder="Senha do professor" name="txtCadastroProfessorSenha" id="txtCadastroProfessorSenha"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormCadastraProfessor">
                    <div id="alertCadastraProfessor" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogCadastraProfessorErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="cadastraProfessor()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>
<div id="dialogEditaProfessor" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edição de Professores</h4>
            </div>
            <form id="formEditaProfessor">
                <div class="modal-body form-group">
                    <input type="hidden" name="hdnEditaProfessor" id="hdnEditaProfessor">
                    <label class="text-right" for="txtEditaProfessorNome">
                        Nome:
                    </label>
                    <input type="text" class="form-control" title="Nome do professor."
                           placeholder="Nome do professor" name="txtEditaProfessorNome" id="txtEditaProfessorNome"
                           required="required">
                    <label class="text-right" for="txtEditaProfessorLogin">
                        Login:
                    </label>
                    <input type="text" class="form-control" title="Login do professor, no máximo 10 caracteres."
                           placeholder="Login do professor" name="txtEditaProfessorLogin" id="txtEditaProfessorLogin"
                           required="required">
                    <label class="text-right" for="txtEditaProfessorSenha">
                        Senha:
                    </label>
                    <input type="password" class="form-control" title="Senha do professor, no máximo 10 caracteres."
                           placeholder="Senha do professor" name="txtEditaProfessorSenha" id="txtEditaProfessorSenha"
                           required="required">
                    <input type="submit" class="hidden" id="btnFormEditaProfessor">
                    <div id="alertEditaProfessor" class="alert alert-warning alert-dismissible"
                         style="margin-top: 10px; display: none">
                        <div class="close" data-dismiss="alert">x</div>
                        <span id="dialogEditaProfessorErro"></span>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editaProfessor()">Editar</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table id="tableListaProfessores"
           data-toggle="table"
           data-url="./rules/ListaProfessores.php">
        <thead>
        <tr>
            <th data-field="nome" data-sortable="true">Nome</th>
            <th data-field="login" data-sortable="true">Login</th>
            <th data-width="60px" data-align="center" data-cell-style="formatterCelulaAcoes"
                data-formatter="formatterProfessores" data-events="eventsProfessor">Ações
            </th>
        </tr>
        </thead>
    </table>
</div>
<script type="text/javascript">
    function filtrarQuestoes() {
        $("#tableListaProfessores").bootstrapTable('refresh');
    }
    function cadastraProfessor() {
        if ($('#txtCadastroProfessorNome')[0].checkValidity() && $('#txtCadastroProfessorLogin')[0].checkValidity() && $('#txtCadastroProfessorSenha')[0].checkValidity())
            $.ajax({
                url: "./rules/CadastraProfessor.php",
                method: "POST",
                data: {
                    txtCadastroProfessorNome: $("#txtCadastroProfessorNome").val(),
                    txtCadastroProfessorLogin: $("#txtCadastroProfessorLogin").val(),
                    txtCadastroProfessorSenha: $("#txtCadastroProfessorSenha").val()
                }
            })
                .done(function (data) {
                    if (data != "") {
                        data = $.parseJSON(data);
                        $("#dialogCadastraProfessorErro").html(data.erro);
                        $("#alertCadastraProfessor").show();
                    } else {
                        $("#tableListaProfessores").bootstrapTable('refresh');
                        $("#txtCadastroProfessorNome").val("");
                        $("#txtCadastroProfessorLogin").val("");
                        $("#txtCadastroProfessorSenha").val("");
                        $("#dialogCadastraProfessor").modal('hide');
                        new Noty({
                            text: 'Professor cadastrado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar cadastrar o professor.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormCadastraProfessor").click();
    }
    function editaProfessor() {
        if ($('#txtEditaProfessorNome')[0].checkValidity() && $('#txtEditaProfessorLogin')[0].checkValidity() && $('#txtEditaProfessorSenha')[0].checkValidity())
            $.ajax({
                url: "./rules/EditaProfessor.php",
                method: "POST",
                data: {
                    txtEditaProfessorNome: $("#txtEditaProfessorNome").val(),
                    txtEditaProfessorLogin: $("#txtEditaProfessorLogin").val(),
                    txtEditaProfessorSenha: $("#txtEditaProfessorSenha").val(),
                    hdnEditaProfessor: $("#hdnEditaProfessor").val()
                }
            })
                .done(function (data) {
                    if (data != "") {
                        data = $.parseJSON(data);
                        $("#dialogEditaProfessorErro").html(data.erro);
                        $("#alertEditaProfessor").show();
                    } else {
                        $("#tableListaProfessores").bootstrapTable('refresh');
                        $("#txtEditaProfessorNome").val("");
                        $("#txtEditaProfessorLogin").val("");
                        $("#txtEditaProfessorSenha").val("");
                        $("#hdnEditaProfessor").val("");
                        $("#dialogEditaProfessor").modal('hide');
                        new Noty({
                            text: 'Professor editado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    }
                })
                .fail(function () {
                    new Noty({
                        text: 'Ocorreu um erro ao tentar editar o professor.',
                        type: 'error',
                        timeout: 4000,
                        closeWith: ['click', 'button'],
                    }).show();
                });
        else
            $("#btnFormEditaProfessor").click();
    }
    function formatterProfessores(value, row, index) {
        return '<i title="Deletar Professor" class="deletaProfessor link-pointer glyphicon glyphicon-trash"></i>' +
            '<i data-toggle="modal" title="Editar Professor" class="link-pointer ml5 glyphicon glyphicon-edit" data-target="#dialogEditaProfessor" data-professor-id="' + row.id + '" data-professor-nome="' + row.nome + '" data-professor-senha="' + row.senha + '" data-professor-login="' + row.login + '"></i>';
    }
    window.eventsProfessor = {
        'click .deletaProfessor': function (e, value, row, index) {
            if (confirm("Ao deletar um professor você apagará também todos os registros relacionados a ele. Você tem certeza que gostaria de fazer isso?"))
                $.ajax({
                    url: "./rules/DeletaProfessor.php",
                    method: "POST",
                    data: {professorid: row.id},
                })
                    .done(function () {
                        $("#tableListaProfessores").bootstrapTable('refresh');
                        new Noty({
                            text: 'Professor deletado!',
                            type: 'success',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    })
                    .fail(function () {
                        new Noty({
                            text: 'Ocorreu um erro ao tentar deletar o professor.',
                            type: 'error',
                            timeout: 4000,
                            closeWith: ['click', 'button'],
                        }).show();
                    });
        }
    }
    $('#dialogEditaProfessor').on('show.bs.modal', function (event) {
        $(this).find("#hdnEditaProfessor").val($(event.relatedTarget).data("professor-id"));
        $(this).find("#txtEditaProfessorNome").val($(event.relatedTarget).data("professor-nome"));
        $(this).find("#txtEditaProfessorSenha").val($(event.relatedTarget).data("professor-senha"));
        $(this).find("#txtEditaProfessorLogin").val($(event.relatedTarget).data("professor-login"));
    });
</script>
