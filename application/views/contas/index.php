<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="text-align: right;">
                <i style="border-radius:50px;font-size:37px;color:#4e73df;cursor:pointer;" id="icon_abrir_cadastro"class="fa fa-plus-circle" aria-hidden="true"></i>
                <i style="border-radius:50px;font-size:37px;color:red;cursor:pointer; display:none;" id="icon_fechar_cadastro"class="fa fa-times-circle" aria-hidden="true"></i>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="tabela-lista-contas">
                <table class="table table-bordered" id="dataTable-tabela-lista-contas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div id="form-nova-conta"  style="display:none;">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Descrição da despesa</label>
                    <input type="text" class="form-control" id="desc_cadastro">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Valor</label>
                    <input type="text" class="form-control" id="valor_cadastro">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="valor_fixo_cad">
                    <label class="form-check-label" for="valor_fixo_cad">
                        Valor fixo
                    </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de vencimento</label>
                    <input type="date" class="form-control" id="data_cadastro">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Status da despesa</label>
                    <select class="form-control" id="cad_status">
                        <option value="0">Pendente</option>
                        <option value="1">Pago</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="repetir_cad">
                    <label class="form-check-label" for="repetir_cad">
                        Repetir conta todo mês
                    </label>
                </div>
                <div style="text-align: center;">
                    <button type="button" style="margin-top:20px;" id="salvar-nova-conta" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>