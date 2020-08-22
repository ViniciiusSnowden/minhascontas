$('.btn_abrir_cadastro').click(function (e) {
    e.preventDefault();
    $('.form_login').hide();
    $('.form_cadastro').show();
});

$('.btn_voltar_login').click(function (e) {
    e.preventDefault();
    $('.form_login').show();
    $('.form_cadastro').hide();
});

$('.btn_realizar_cadastro').click(function (e) {
    e.preventDefault();
    let nome = $('#cad_nome').val();
    let usuario = $('#cad_usuario').val();
    let senha = $('#cad_senha').val();

    if(nome != '' && usuario != '' && senha != ''){
        let dados = {
            nome: nome,
            usuario: usuario,
            senha: senha
        }
        cadastrar(dados);
    }else{
        $('.alert_sucesso').hide();
        $('.alert_erro').show();
    }
    
});

function cadastrar(dados){
    $.ajax({
        url: "/index.php/welcome/cadastrar",
        type: 'POST',
        dataType: 'json',
        data: dados,
    })
    .done(function (server) {
        $('.alert_sucesso').show();
        $('.alert_erro').hide();
    })
    .fail(function () {

    });
}

