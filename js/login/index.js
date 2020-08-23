$('.btn_abrir_cadastro').click(function (e) {
    e.preventDefault();
    $('.alert_sucesso').hide();
    $('.alert_erro').hide();
    $('.form_login').hide();
    $('.form_cadastro').show();
});

$('.btn_voltar_login').click(function (e) {
    e.preventDefault();
    $('.alert_sucesso').hide();
    $('.alert_erro').hide();
    $('.form_login').show();
    $('.form_cadastro').hide();
});

$('.btn_realizar_cadastro').click(function (e) {
    e.preventDefault();
    $('.alert_sucesso').hide();
    $('.alert_erro').hide();
    let nome = $('#cad_nome').val();
    let usuario = $('#cad_usuario').val();
    let senha = $('#cad_senha').val();

    if (nome != '' && usuario != '' && senha != '') {
        $('.btn_realizar_cadastro').hide();
        $('#ajax-img-cadastro').show();
        let dados = {
            nome: nome,
            usuario: usuario,
            senha: senha
        }
        let url = base_url + "register";
        requisicao(dados, url, 2);
    } else {
        $('.btn_realizar_cadastro').show();
        $('.loading-ajax-img').hide();
        $('.alert_sucesso').hide();
        $('#alert_erro_p').text('Por favor, preencha todos os campos.');
        $('.alert_erro').show();
    }

});

$('.btn_logar').click(function (e) {
    e.preventDefault();
    $('.alert_sucesso').hide();
    $('.alert_erro').hide();
    let usuario = $('#log_usuario').val();
    let senha = $('#log_senha').val();

    if (usuario != '' && senha != '') {
        $('.btn_logar').hide();
        $('#ajax-img-login').show();
        let dados = {
            usuario: usuario,
            senha: senha
        }
        let url = base_url + "auth";
        requisicao(dados, url, 1);
    } else {
        $('.btn_logar').show();
        $('.loading-ajax-img').hide();
        $('.alert_sucesso').hide();
        $('#alert_erro_p').text('Por favor, preencha todos os campos.');
        $('.alert_erro').show();
    }

});

function requisicao(dados, url, tipo) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: dados
    })
        .done(function (server) {
            $('.loading-ajax-img').hide();
            if (tipo == 2) {
                if (server.status == 200) {
                    $('.btn_realizar_cadastro').hide();
                    $('.btn_voltar_login').hide();
                    $('.alert_sucesso').show();
                    $('.alert_erro').hide();
                    $('#alert_sucesso_p').text('Cadastro efetuado com sucesso!');
                    setTimeout(() => {
                        $('#alert_sucesso_p').text('Você será redirecionado...');
                        $('.loading-ajax-img').show();
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }, 1500);
                } else {
                    $('.alert_sucesso').hide();
                    $('.alert_erro').show();
                    $('#alert_erro_p').text('Usuário já cadastrado, tente outro.');
                    $('.btn_realizar_cadastro').show();
                }
            } else {
                if (server.status == 200 && tipo == 1) {
                    $('.alert_sucesso').show();
                    $('.alert_erro').hide();
                    $('#alert_sucesso_p').text('Login efetuado com sucesso!');
                    $('.btn_logar').hide();
                    $('.btn_abrir_cadastro').hide();
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    $('.alert_sucesso').hide();
                    $('.alert_erro').show();
                    $('#alert_erro_p').text('Usuário ou senha incorretos.');
                    $('.btn_logar').show();
                }
            }

        })

}

