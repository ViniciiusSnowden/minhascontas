<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth']     = 'welcome/realizarLogin';
$route['register'] = 'welcome/cadastrar';

$route['inicio'] = 'inicio/index';
$route['logout'] = 'welcome/sair';

//Contas
$route['contas'] = 'contas/index';
$route['contas/salvar'] = 'contas/salvarNovaConta';
$route['contas/salvar/:num'] = 'contas/salvarEdicao';
$route['contas/listar'] = 'contas/listarContas';
$route['contas/listar/:num'] = 'contas/listarContaPorId';
$route['contas/excluir/:num'] = 'contas/deletar';

//Dash
$route['inicio/listar'] = 'inicio/listarDadosDash';






