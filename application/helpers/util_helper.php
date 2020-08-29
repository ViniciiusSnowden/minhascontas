<?php

function dataToBr($data)
{
        return substr($data, 8, 2) . "/" . substr($data, 5, 2) . "/" . substr($data, 0, 4);
}

function tratarValorToSql($valor)
{
        $v1 = explode('R$', $valor);
        if($v1[0] == ''){
                $valor = str_replace(".", "", $v1[1]);
                $valor = str_replace(",", ".", $valor);
        }else{
                $valor = str_replace(".", "", $v1[0]);
                $valor = str_replace(",", ".", $valor);
        }

        return $valor;
}

function parametroNaoNumerico()
{
        $dadosErro['codigo'] = 300;
        $dadosErro['erro']   = 'Você precisa passar um parâmtro númerico.';
        echo json_encode($dadosErro);
}
