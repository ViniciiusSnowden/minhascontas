<?php $this->load->view('tema/head');?>

<?php $this->load->view('tema/nav');?>

<?php if(isset($meio)){ 
    $this->load->view($meio);
}?>

<?php  $this->load->view('tema/footer');?>

<?php if(isset($js)){
    $this->load->view($js);
} ?>
