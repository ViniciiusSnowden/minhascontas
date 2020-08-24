<script>
    $("#valor_cadastro").maskMoney({
        prefix: "R$",
        decimal: ",",
        thousands: "."
    });

    listar();

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
        if ($('#valor_fixo_cad').is(":checked")) {
            $('#valor_fixo_cad').val('1')
        } else {
            $('#valor_fixo_cad').val('0')
        }

        if ($('#repetir_cad').is(":checked")) {
            $('#repetir_cad').val('1')
        } else {
            $('#repetir_cad').val('0')
        }

        let descricao = $('#desc_cadastro').val();
        let valor = $('#valor_cadastro').val();
        let data = $('#data_cadastro').val();
        let status = $('#cad_status').val();
        let repetir = $('#repetir_cad').val();
        let valorFixo = $('#valor_fixo_cad').val();

        let dados = {
            descricao: descricao,
            valor: valor,
            data_vencimento: data,
            status: status,
            recorrente: repetir,
            valor_fixo: valorFixo
        }

        $.ajax({
                url: base_url + 'contas/salvar',
                type: 'POST',
                dataType: 'json',
                data: dados
            })
            .done(function(server) {
                listar();
                $('#icon_abrir_cadastro').show();
                $('#icon_fechar_cadastro').hide();
                $('#tabela-lista-contas').show();
                $('#form-nova-conta').hide();
            })
    });

    function limparCampos() {
        $('#desc_cadastro').val('');
        $('#valor_cadastro').val('');
        $('#data_cadastro').val('');
        $('#cad_status').val(0);
        $('#repetir_cad').val(0);
        $('#valor_fixo_cad').val(0);
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
                    dadosTable[index] = [val.id,val.descricao]
                })

                console.log(dadosTable)

                var table = $('#dataTable-tabela-lista-contas').DataTable({
                    data: dadosTable,
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    oLanguage: {
                        "sUrl": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
                    }
                });
            })
    }
</script>