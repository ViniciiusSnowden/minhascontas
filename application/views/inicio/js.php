<script>
    $('.navDash').css('color', '#fff');
    listar();

    function listar() {
        $.ajax({
                url: base_url + 'inicio/listar',
                type: 'GET',
                dataType: 'json'
            })
            .done(function(server) {
                $('#saldo').text(server.saldo);
                $('#despesa_total').text(server.despesa_total);
                $('#despesa').text(server.despesa);
                $('#span_total_pago_porcent').text(server.porcentagem_pago + '%')
                $('#span_total_pendent').text(server.qtd_pendente);
                let d = '<div class="progress-bar bg-info" role="progressbar" style="width: ' + server.porcentagem_pago + '%" aria-valuenow="' + server.porcentagem_pago + '" aria-valuemin="0" aria-valuemax="100"></div>'
                $('.porcent-div').append(d);
            })

    }
</script>