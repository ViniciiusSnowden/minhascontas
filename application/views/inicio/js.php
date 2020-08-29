<script>
    $('.navDash').css('color','#fff');
    listar();
    function listar()
    {
        $.ajax({
            url: base_url + 'inicio/listar',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(server) {
            $('#span_total').text('R$'+server.total)
            $('#span_total_pago').text('R$'+server.totalPago)
            $('#span_total_pago_porcent').text(server.PorctPag+'%')
            $('#span_total_pendent').text(server.totalPendente)
            $('.porcent-div').empty();
            let d = '<div class="progress-bar bg-info" role="progressbar" style="width: '+server.PorctPag+'%" aria-valuenow="'+server.PorctPag+'" aria-valuemin="0" aria-valuemax="100"></div>'
            $('.porcent-div').append(d);
        })

    }
</script>