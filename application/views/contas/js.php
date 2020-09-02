<script>
    $('.navCont').css('color', '#fff');
    listar();
    $("#valor_cadastro").maskMoney({
        prefix: "R$",
        decimal: ",",
        thousands: "."
    });

    $('#icon_abrir_cadastro').click(function() {
        $('#icon_fechar_cadastro').show();
        $('#icon_abrir_cadastro').hide();
        $('#tabela-lista-contas').hide();
        $('#form-nova-conta').show();
        limparCampos();
    });

    $('#icon_fechar_cadastro').click(function() {
        $('#icon_abrir_cadastro').show();
        $('#icon_fechar_cadastro').hide();
        $('#tabela-lista-contas').show();
        $('#form-nova-conta').hide();
    });

    $('#salvar-nova-conta').click(function() {

        let id_conta = $('#id_conta').val();

        let descricao = $('#desc_cadastro').val();
        let valor = $('#valor_cadastro').val();
        let data = $('#data_cadastro').val();
        let status = $('#cad_status').val();

        let dados = {
            descricao: descricao,
            valor: valor,
            data_vencimento: data,
            status: status,
        }
        if (id_conta > 0) {
            url_contas = base_url + 'contas/salvar/' + id_conta
        } else {
            url_contas = base_url + 'contas/salvar'
        }

        $.ajax({
                url: url_contas,
                type: 'POST',
                dataType: 'json',
                data: dados
            })
            .done(function(server) {
                listar();
                $('#spanToastPrincipal').text(server.response);
                $('.toast').toast('show');
                setTimeout(() => {
                    $('.toast').toast('hide');
                }, 3000);
                $('#icon_abrir_cadastro').show();
                $('#icon_fechar_cadastro').hide();
                $('#tabela-lista-contas').show();
                $('#form-nova-conta').hide();
            })
    });

    function limparCampos() {
        $('#excluir-conta').hide();
        $('#id_conta').val(0);
        $('#desc_cadastro').val('');
        $('#valor_cadastro').val('');
        $('#data_cadastro').val('');
        $('#cad_status').val(0);
    }

    function listar() {
        $.ajax({
                url: base_url + 'contas/listar',
                type: 'GET',
                dataType: 'json'
            })
            .done(function(server) {
                $('#dataTable-tabela-lista-contas').DataTable().destroy();
                let dadosTable = [];

                $.each(server, function(index, val) {
                    dadosTable[index] = [val.descricao, val.data_vencimento]
                })

                var table = $('#dataTable-tabela-lista-contas').DataTable({
                    data: dadosTable,
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    "ordering": false,
                    "bLengthChange": false,
                    oLanguage: {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        },
                        "select": {
                            "rows": {
                                "_": "Selecionado %d linhas",
                                "0": "Nenhuma linha selecionada",
                                "1": "Selecionado 1 linha"
                            }
                        },
                        "buttons": {
                            "copy": "Copiar para a área de transferência",
                            "copyTitle": "Cópia bem sucedida",
                            "copySuccess": {
                                "1": "Uma linha copiada com sucesso",
                                "_": "%d linhas copiadas com sucesso"

                            }
                        }
                    }
                });
            });
    }

    $(document).on('click', '.linhaEditar', function() {
        let id = $(this).attr('data-id');

        $.ajax({
                url: base_url + 'contas/listar/' + id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(server) {
                $('#excluir-conta').show();
                $('#id_conta').val(id);
                $('#desc_cadastro').val(server.descricao);
                $('#valor_cadastro').val('R$' + server.valor_br);
                $('#data_cadastro').val(server.data_vencimento);
                $('#cad_status').val(server.status);

                $('#icon_fechar_cadastro').show();
                $('#icon_abrir_cadastro').hide();
                $('#tabela-lista-contas').hide();
                $('#form-nova-conta').show();

            })
    });

    $('#excluir-conta').click(function() {
        $('#modal_excluir').modal('show');
    });

    $('#confirmar-exclusao').click(function() {
        $('#modal_excluir').modal('hide');
        $.ajax({
                url: base_url + 'contas/excluir/' + $('#id_conta').val(),
                type: 'GET',
                dataType: 'json',
            })
            .done(function(server) {

                listar();
                $('#spanToastPrincipal').text(server.response);
                $('.toast').toast('show');
                setTimeout(() => {
                    $('.toast').toast('hide');
                }, 3000);
                $('#icon_abrir_cadastro').show();
                $('#icon_fechar_cadastro').hide();
                $('#tabela-lista-contas').show();
                $('#form-nova-conta').hide();
            });
    });
</script>