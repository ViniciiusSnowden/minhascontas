<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Minhas contas</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url();?>arquivos_tema/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://image.flaticon.com/icons/svg/3154/3154363.svg" rel="shortcut icon" type="image/x-icon" />

  <!-- Custom styles for this template-->
  <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="<?= base_url();?>arquivos_tema/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script>
    	base_url = "<?php echo base_url(); ?>";
  </script>

</head>
<?php if(!$this->session->userdata('nome')){
header('Location: welcome'); 
}?>
