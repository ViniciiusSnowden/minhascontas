<div class="container-fluid">
    <div class="card shadow mb-4 row animate__animated animate__fadeInDown">
        <div class="card-header py-3">
            <div style="text-align: right;">
                <i style="border-radius:50px;font-size:37px;color:#4e73df;cursor:pointer;" id="icon_abrir_cadastro" class="fa fa-plus-circle" aria-hidden="true"></i>
                <i style="border-radius:50px;font-size:37px;color:red;cursor:pointer; display:none;" id="icon_fechar_cadastro" class="fa fa-times-circle" aria-hidden="true"></i>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="tabela-lista-contas">
                <table class="table table-bordered" id="dataTable-tabela-lista-contas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Vencimento</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div id="form-nova-conta" style="display:none;">
                <input type="hidden" class="form-control" id="id_conta">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Descrição da despesa</label>
                    <input type="text" class="form-control" id="desc_cadastro">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tipo de conta</label>
                    <select class="form-control" id="cad_status">
                        <option value="0">Despesa</option>
                        <option value="1">Receita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Valor</label>
                    <input type="text" class="form-control" id="valor_cadastro" placeholder="0,00">
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
                <div style="text-align: center;">
                    <button type="button" style="margin-top:20px;" id="salvar-nova-conta" class="btn btn-success">Salvar</button>
                    <button type="button" style="margin-top:20px; display:none;" id="excluir-conta" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</div>